<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listaProductos()
    {
        $productos = \DB::select('SELECT * FROM productos 
                                INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor');
        
        return view('productos.lista', compact('productos'));
    }

    public function mostrarProducto($id)
    {
        $productos = \DB::select('SELECT * FROM productos 
                            INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor
                            WHERE productos.id_producto = ?', [$id]);

        return view('productos.detalle', compact('productos'));
    }

    public function formularioProducto()
    {
        $proveedores = Proveedores::all();
        return view('productos.agregar', compact('proveedores'));
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

        return redirect()->route('listaProductos');
    }

    public function editarProducto($id)
    {
        $productos = \DB::select('SELECT * FROM productos 
                            INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor
                            WHERE productos.id_producto = ?', [$id]);

        $proveedores = Proveedores::all();
        return view('productos.editar', compact('productos', 'proveedores'));
    }

    public function actualizarProducto(Productos $id, Request $request)
    {
        $query = Productos::find($id->id_producto);
            $query -> id_proveedor = $request -> id_proveedor;
            $query -> nombre_producto = $request -> nombre_producto;
            $query -> stock_producto = $request -> stock_producto;
            $query -> descripcion_producto = $request -> descripcion_producto;
            $query -> precio_producto = $request -> precio_producto;
        $query -> save();

        return redirect()->route("mostrarProducto", ['id' => $id->id_producto]);
    }

    public function eliminarProducto(Productos $id)
    {
        $id->delete();
        return redirect()->route('listaProductos');
    }
}
