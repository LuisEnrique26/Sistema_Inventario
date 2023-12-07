<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class EmpleadoProductoController extends Controller
{
    public function listaProductos()
    {
        $productos = Productos::select('*')
            ->join('proveedores', 'productos.id_proveedor', '=', 'proveedores.id_proveedor')
            ->get();


        return view('empleados.productos.lista', compact('productos'));
    }

    public function mostrarProducto($id)
    {
        $producto = Productos::select('*')
            ->join('proveedores', 'productos.id_proveedor', '=', 'proveedores.id_proveedor')
            ->where('productos.id_producto', '=', $id)
            ->first();


        return view('empleados.productos.detalle', compact('productos'));
    }

    public function formularioProducto()
    {
        $proveedores = Proveedores::all();
        return view('empleados.productos.agregar', compact('proveedores'));
    }

    public function guardarProducto(Request $request)
    {
        $this->validate($request, [
            'id_proveedor' => 'required',
            'nombre_producto' => 'required',
            'stock_producto' => 'required',
            'descripcion_producto' => 'required',
            'precio_producto' => 'required'
        ]);

        Productos::create(array(
            'id_proveedor' => $request->input('id_proveedor'),
            'nombre_producto' => $request->input('nombre_producto'),
            'stock_producto' => $request->input('stock_producto'),
            'descripcion_producto' => $request->input('descripcion_producto'),
            'precio_producto' => $request->input('precio_producto'),
        ));

        return redirect()->route('empleadolistaProductos');
    }

    public function editarProducto($id)
    {
        $producto = Productos::select('*')
            ->join('proveedores', 'productos.id_proveedor', '=', 'proveedores.id_proveedor')
            ->where('productos.id_producto', '=', $id)
            ->get();

        $proveedores = Proveedores::all();
        return view('empleados.productos.editar', compact('productos', 'proveedores'));
    }

    public function actualizarProducto(Productos $id, Request $request)
    {
        $query = Productos::find($id->id_producto);
        $query->id_proveedor = $request->id_proveedor;
        $query->nombre_producto = $request->nombre_producto;
        $query->stock_producto = $request->stock_producto;
        $query->descripcion_producto = $request->descripcion_producto;
        $query->precio_producto = $request->precio_producto;
        $query->save();

        return redirect()->route("empleadomostrarProducto", ['id' => $id->id_producto]);
    }

    public function eliminarProducto(Productos $id)
    {
        $id->delete();
        return redirect()->route('empleadolistaProductos');
    }
}
