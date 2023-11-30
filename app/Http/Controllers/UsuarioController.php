<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Usuario;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function listaUsuarios()
    {
        $usuarios = \DB::select('SELECT * FROM usuarios 
                                 INNER JOIN tipo_usuario ON usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario');
        
        return view('usuarios.lista', compact('usuarios'));
    }

    public function mostrarUsuario($id)
    {
        $usuarios = \DB::select('SELECT * FROM usuarios 
                            INNER JOIN tipo_usuario ON usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                            WHERE usuarios.id_usuario = ?', [$id]);

        return view('usuarios.detalle', compact('usuarios'));
    }

    public function formularioUsuario()
    {
        $tipo_usuarios = Tipo_Usuario::all();
        return view('usuarios.agregar', compact('tipo_usuarios'));
    }

    public function guardarUsuario(Request $request)
    {
        $this->validate($request, [
            'id_tipo_usuario' => 'required',
            'nombre_usuario' => 'required',
            'email' => 'required | email | unique:usuarios',
            'pass' => 'required',
        ]);

        $request->validate([
            'email' => 'required | email | unique:users',
        ]);

        Usuarios::create(array(
            'id_tipo_usuario' => $request->input('id_tipo_usuario'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'email' => $request->input('email'),
            'pass' => $request->input('pass'),
        ));

        $user = new User();
        $user->name = $request->nombre_usuario;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->save();


        return redirect()->route('listaUsuarios');
    }

    public function editarUsuario($id)
    {
        $usuarios = \DB::select('SELECT * FROM usuarios 
                                INNER JOIN tipo_usuario ON usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                                WHERE usuarios.id_usuario = ?', [$id]);
        $tipo_usuarios = Tipo_Usuario::all();
        return view('usuarios.editar', compact('usuarios', 'tipo_usuarios'));
    }

    public function actualizarUsuario(Usuarios $id, Request $request)
    {
        $query = Usuarios::find($id->id_usuario);
            $query -> id_tipo_usuario = $request -> id_tipo_usuario;
            $query -> nombre_usuario = $request -> nombre_usuario;
            $query -> email = $request -> email;
            $query -> pass = $request -> pass;
        $query -> save();

        return redirect()->route("mostrarUsuario", ['id' => $id->id_usuario]);
    }

    public function eliminarUsuario(Usuarios $id)
    {
        $id->delete();
        return redirect()->route('listaUsuarios');
    }
}
