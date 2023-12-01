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
        $usuarios = User::join('tipo_usuario', 'users.id_tipo_usuario', '=', 'tipo_usuario.id_tipo_usuario')
            ->orderBy('users.id')
            ->get();

        return view('usuarios.lista', compact('usuarios'));
    }

    public function mostrarUsuario($id)
    {

        $usuario = User::join('tipo_usuario', 'users.id_tipo_usuario', '=', 'tipo_usuario.id_tipo_usuario')
            ->where('users.id', $id)
            ->first();


        return view('usuarios.detalle', compact('usuario'));
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
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'pass' => 'required',
        ]);        

        $user = new User();
        $user->name = $request->name;
        $user->id_tipo_usuario = $request->id_tipo_usuario;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->save();


        return redirect()->route('listaUsuarios');
    }

    public function editarUsuario($id)
    {
        $usuario = User::join('tipo_usuario', 'users.id_tipo_usuario', '=', 'tipo_usuario.id_tipo_usuario')
            ->where('users.id', $id)
            ->first();

        $tipo_usuarios = Tipo_Usuario::all();

        return view('usuarios.editar', compact('usuario', 'tipo_usuarios'));
    }

    public function actualizarUsuario(User $id, Request $request)
    {
        $query = User::find($id->id);
        $query->id_tipo_usuario = $request->id_tipo_usuario;
        $query->name = $request->name;
        $query->email = $request->email;
        $query->pass = $request->pass;
        $query->save();

        return redirect()->route("mostrarUsuario", ['id' => $id->id]);
    }

    public function eliminarUsuario(User $id)
    {
        $id->delete();
        return redirect()->route('listaUsuarios');
    }
}
