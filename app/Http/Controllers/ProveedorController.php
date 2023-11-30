<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function listaProveedores()
    {
        $proveedores = Proveedores::all();
        
        return view('proveedores.lista', compact('proveedores'));
    }

    public function formularioProveedor()
    {
        return view('proveedores.agregar');
    }

    public function guardarProveedor(Request $request)
    {
        $this->validate($request, [
            'nombre_proveedor' => 'required',
            'direccion_proveedor' => 'required',
            'telefono_proveedor' => 'required',
        ]);

        Proveedores::create(array(
            'nombre_proveedor' => $request->input('nombre_proveedor'),
            'direccion_proveedor' => $request->input('direccion_proveedor'),
            'telefono_proveedor' => $request->input('telefono_proveedor')
        ));

        return redirect()->route('listaProveedores');
    }

    public function editarProveedor($id)
    {
        $proveedor = Proveedores::find($id);
        return view('proveedores.editar', compact('proveedor'));
    }

    public function actualizarProveedor(Proveedores $id, Request $request)
    {
        $query = Proveedores::find($id->id_proveedor);
            $query -> nombre_proveedor = $request -> nombre_proveedor;
            $query -> direccion_proveedor = $request -> direccion_proveedor;
            $query -> telefono_proveedor = $request -> telefono_proveedor;
        $query -> save();

        return redirect()->route("listaProveedores");
    }

    public function eliminarProveedor(Proveedores $id)
    {
        $id->delete();
        return redirect()->route('listaProveedores');
    }
}