<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Venta;
use App\Models\Venta_Detalle;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function listaVentas()
    {
        $venta_detalle = \DB::select('SELECT * FROM venta_detalle
                                    INNER JOIN venta ON venta_detalle.id_venta = venta.id_venta
                                    INNER JOIN productos ON venta_detalle.id_producto = productos.id_producto
                                    INNER JOIN usuarios AS empleados ON venta.id_empleado = empleados.id_usuario');

        
        return view('ventas.lista', compact('venta_detalle'));
    }

    public function mostrarVenta($id)
    {
        $venta_detalle = \DB::select('SELECT * FROM venta_detalle
                                    INNER JOIN venta ON venta_detalle.id_venta = venta.id_venta
                                    INNER JOIN productos ON venta_detalle.id_producto = productos.id_producto
                                    INNER JOIN usuarios AS empleados ON venta.id_empleado = empleados.id_usuario
                                    INNER JOIN usuarios AS clientes ON venta.id_cliente = clientes.id_usuario
                                    WHERE venta_detalle.id_venta_detalle = ?', [$id]);


        return view('ventas.detalle', compact('venta_detalle'));
    }

    public function formularioVenta()
    {
        $productos = Productos::all();
        $empleados = \DB::select('SELECT * FROM usuarios WHERE id_tipo_usuario = ?', [3]);
        $clientes = \DB::select('SELECT * FROM usuarios WHERE id_tipo_usuario = ?', [4]);


        return view('ventas.agregar', compact('productos', 'empleados', 'clientes'));
    }

    public function guardarVenta(Request $request)
    {
        $this->validate($request, [
            'id_empleado' => 'required',
            'id_cliente' => 'required',
            'id_producto' => 'required',
            'cantidad_venta_detalle' => 'required',
        ]);

        $fecha = date('Y/m/d');
        $hora = date('H:i:s');

        $id_producto = $request->input('id_producto');

        $query = Productos::find($id_producto);
        $query->stock_producto -= $request->cantidad_venta_detalle;
        $cant = $query->stock_producto -= $request->cantidad_venta_detalle;

        if ($cant >= 0) {
            $query->stock_producto += $request->cantidad_venta_detalle;
            $query->save();


            Venta::create(array(
                'id_empleado' => $request->input('id_empleado'),
                'id_cliente' => $request->input('id_cliente'),
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

            return redirect()->route('listaVentas');

        } else {
            return redirect(route('formularioVenta'))->with('status', 'No hay suficientes productos');
        }
    }

    public function eliminarVenta(Venta_Detalle $id, Venta $idV)
    {
        $id->delete();
        $idV->delete();
        return redirect()->route('listaVentas');
    }

    public function form_Precio_Producto(Request $request)
    {
        $id_producto = $request->get('id_producto');
        $productos = Productos::find($id_producto);

        return view('ventas.form_precio_producto', compact('productos'));
    }
}
