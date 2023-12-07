<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Venta;
use App\Models\Venta_Detalle;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmpleadoVentaController extends Controller
{
    public function listaVentas()
    {
        $venta_detalle = DB::table('venta_detalle')
            ->join('venta', 'venta_detalle.id_venta', '=', 'venta.id_venta')
            ->join('productos', 'venta_detalle.id_producto', '=', 'productos.id_producto')
            ->join('users', 'venta.id_empleado', '=', 'users.id')
            ->select('venta_detalle.*', 'venta.*', 'productos.*', 'users.*')
            ->orderBy('venta_detalle.id_venta_detalle', 'desc')
            ->get();



        return view('empleados.ventas.lista', compact('venta_detalle'));
    }

    public function mostrarVenta($id)
    {

        $ventaDetalle = DB::table('venta_detalle')
            ->join('venta', 'venta_detalle.id_venta', '=', 'venta.id_venta')
            ->join('productos', 'venta_detalle.id_producto', '=', 'productos.id_producto')
            ->join('users', 'venta.id_empleado', '=', 'users.id')
            ->where('venta_detalle.id_venta_detalle', $id)
            ->select('venta_detalle.*', 'venta.*', 'productos.*', 'users.*')
            ->get();


        return view('empleados.ventas.detalle', compact('ventaDetalle'));
    }

    public function formularioVenta()
    {
        $productos = Productos::all();

        $empleados = DB::table('usuarios')
            ->where('id_tipo_usuario', 3)
            ->get();

        return view('empleados.ventas.agregar', compact('productos', 'empleados'));
    }

    public function guardarVenta(Request $request)
    {
        $this->validate($request, [
            'id_empleado' => 'required',
            'id_producto' => 'required',
            'cantidad_venta_detalle' => 'required',
        ]);

        $fecha = date('Y/m/d');
        $hora = date('H:i:s');

        $id_producto = $request->input('id_producto');

        $query = Productos::find($id_producto);
        $query->stock_producto -= $request->cantidad_venta_detalle;

        if ($query->stock_producto >= 0) {
            $query->save();


            Venta::create(array(
                'id_empleado' => $request->input('id_empleado'),
                'fecha_venta' => $fecha,
                'hora_venta' => $hora
            ));

            $venta = Venta::latest()->first();
            $id_venta = $venta->id_venta;

            Venta_Detalle::create(array(
                'id_venta' => $id_venta,
                'id_producto' => $request->input('id_producto'),
                'cantidad_venta_detalle' => $request->input('cantidad_venta_detalle')
            ));

            if ($query->stock_producto <= 5) {

                $nombreP = $query->nombre_producto;
                $stockP = $query->stock_producto;
                $mensaje = "Stock bajo del producto '$nombreP' (Cantidad: $stockP), revise su inventario.";
                return redirect(route('listaVentas'))->with('status', $mensaje);
            } else {

                return redirect()->route('listaVentas');
            }
        } else {

            return redirect(route('empleadoformularioVenta'))->with('status', 'No hay suficientes productos');
        }
    }

    public function eliminarVenta(Venta_Detalle $id, Venta $idV)
    {
        $id->delete();
        $idV->delete();
        return redirect()->route('empleadolistaVentas');
    }

    public function form_Precio_Producto(Request $request)
    {
        $id_producto = $request->get('id_producto');
        $productos = Productos::find($id_producto);

        return view('empleados.ventas.form_precio_producto', compact('productos'));
    }
}
