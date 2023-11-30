<?php

namespace App\Http\Controllers;

use App\Models\Producto_Proveedor;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function listaEntradas()
    {
        $entradas = \DB::select('SELECT * FROM producto_proveedor
                                INNER JOIN productos ON producto_proveedor.id_producto = productos.id_producto
                                INNER JOIN proveedores ON producto_proveedor.id_proveedor = proveedores.id_proveedor
                                INNER JOIN usuarios ON producto_proveedor.id_usuario = usuarios.id_usuario
                                ORDER BY id_producto_proveedor');
        
        return view('entradas.lista', compact('entradas'));
    }

    public function mostrarEntrada($id)
    {
        $entradas = \DB::select('SELECT * FROM producto_proveedor
                                INNER JOIN productos ON producto_proveedor.id_producto = productos.id_producto
                                INNER JOIN proveedores ON producto_proveedor.id_proveedor = proveedores.id_proveedor
                                INNER JOIN usuarios ON producto_proveedor.id_usuario = usuarios.id_usuario
                                WHERE producto_proveedor.id_producto_proveedor = ?', [$id]);
        
        return view('entradas.detalle', compact('entradas'));
    }

    public function formularioEntrada()
    {
        $proveedores = Proveedores::all();
        $usuarios = Usuarios::whereNotIn('id_tipo_usuario', [4])->get();
        

        return view('entradas.agregar', compact('proveedores', 'usuarios'));
    }

    public function guardarEntrada(Request $request)
    {
        $this->validate($request, [
            'id_usuario' => 'required',
            'id_proveedor' => 'required',
            'id_producto' => 'required',
            'costo' => 'required',
            'cantidad' => 'required'
        ]);

        $id_producto = $request->input('id_producto');
        $query = Productos::find($id_producto);
        $query->stock_producto += $request->cantidad;
        $query->save();

        $fecha = date('Y/m/d H:i:s');

        Producto_Proveedor::create(array(
            'id_producto' => $request->input('id_producto'),
            'id_proveedor' => $request->input('id_proveedor'),
            'id_usuario' => $request->input('id_usuario'),
            'fecha' => $fecha,
            'costo' => $request->input('costo'),
            'cantidad' => $request->input('cantidad')
        ));



        return redirect()->route('listaEntradas');
    }

    public function editarEntrada($id)
    {
        $entradas = \DB::select('SELECT * FROM producto_proveedor
                                INNER JOIN productos ON producto_proveedor.id_producto = productos.id_producto
                                INNER JOIN proveedores ON producto_proveedor.id_proveedor = proveedores.id_proveedor
                                INNER JOIN usuarios ON producto_proveedor.id_usuario = usuarios.id_usuario
                                WHERE producto_proveedor.id_producto_proveedor = ?', [$id]);

        $proveedores = Proveedores::all();
        $usuarios = Usuarios::whereNotIn('id_tipo_usuario', [4])->get();

        return view('entradas.editar', compact('proveedores', 'usuarios', 'entradas'));
    }

    public function actualizarEntrada(Producto_Proveedor $id, Request $request)
    {
        // $id_producto = $request -> id_producto;
        // $query = Productos::find($id_producto);
        // $query->stock_producto += $request->cantidad;
        // $query->save();

        $fecha = date('Y/m/d H:i:s');


        $query = Producto_Proveedor::find($id->id_producto_proveedor);
            $query -> id_producto = $request -> id_producto;
            $query -> id_proveedor = $request -> id_proveedor;
            $query -> id_usuario = $request -> id_usuario;
            $query -> fecha = $fecha;
            $query -> costo = $request -> costo;
            $query -> cantidad = $request -> cantidad;
        $query -> save();

        return redirect()->route("mostrarEntrada", ['id' => $id->id_producto_proveedor]);
    }

    public function eliminarEntrada(Producto_Proveedor $id)
    {
        $id->delete();
        return redirect()->route('listaEntradas');
    }

    public function formProductos(Request $request)
    {
        $id_proveedor = $request->get('id_proveedor');
        $productos = \DB::select('SELECT * FROM productos WHERE id_proveedor = ?', [$id_proveedor]);

        return view('entradas.productos', compact('productos'));
    }
}
