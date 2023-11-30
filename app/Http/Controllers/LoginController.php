<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required',
            'email' => 'required | email | unique:users',
            'pass' => 'required'
        ]);

        $request->validate([
            'email' => 'required | email | unique:usuarios',
        ]);


        $usuario = new Usuarios();
        $usuario->id_tipo_usuario = 3;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->email = $request->email;
        $usuario->pass = $request->pass;
        $usuario->save();

        $user = new User();
        $user->name = $request->nombre_usuario;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->save();

        Auth::login($user);

        return redirect(route('inicio'));
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();

            return redirect(route('inicio'));
        }
        else
        {
            return redirect(route('login'))->with('status', 'Error al iniciar sesión');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect((route('login')));
    }
}