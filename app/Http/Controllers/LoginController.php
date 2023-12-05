<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $id_tipo_usuario = 3;

        $user = new User();
        $user->id_tipo_usuario = $id_tipo_usuario;
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

        return redirect((route('index')));
    }
}