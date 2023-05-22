<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        // Validamos los datos introducidos del login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Comprobamos las credenciales

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // Si son incorrectas, almacenamos en la sesión, el mensaje de error
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('perfil');
    }
}
