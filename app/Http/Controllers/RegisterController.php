<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // Modifico el request del user para evitar duplicados
        $request->request->add(['user' => Str::slug($request->user)]);

        // Validacion de los datos introducidos en el formulario
        $this->validate($request, [
            'name' => 'required|alpha|min:3|max:30',
            'apellidos' => 'regex:/^[\pL\s\-]+$/u',
            'user' => 'required|unique:users|min:4|max:20',
            'email' => 'required|unique:users|email|max:40',
            'password' => 'required|min:6|confirmed'
        ]);

        // Creamos el objeto con los datos del request(formulario)
        User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'user' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cb1' => 0,
            'cb2' => 0
        ]);

        // Autenticamos al usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Redirecciono al usuario a su perfil
        return redirect()->route('perfil');
    }
}
