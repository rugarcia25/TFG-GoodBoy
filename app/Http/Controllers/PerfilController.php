<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        // Creo el constructor para autenticar al usuario antes de devolver la vista perfil
        // En caso de no estar autenticado, devuelve la ruta login
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil');
    }

    public function storeDatos(Request $request)
    {

        //Validamos los datos introducidos
        $this->validate($request, [
            'name' => 'min:3|max:30',
            'apellidos' => 'max:50',
            'user' => 'min:4|max:20|unique:users,name,' . $request->userHidden, //Asignamos la validación del usuario para mantenerlo en caso de que sea el mismo
            'email' => 'email|max:40|unique:users,email,' . $request->idEmail, //Asignamos la validación del email y luego añadimos una excepción
        ]);

        // Guardar cambios

        $usuario = User::find(auth()->user()->id); // Buscamos el usuario actual

        $usuario->name = $request->name;
        $usuario->user = $request->user;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;

        $usuario->save();

        // Redireccionamos al usuario

        return redirect()->route('perfil')->with(['message' => "Datos actualizados correctamente"]);
    }

    public function storePassword(Request $request)
    {

        //Validamos los datos introducidos
        $this->validate($request, [
            'password' => 'required|min:6|confirmed'
        ]);

        $usuario = User::find(auth()->user()->id); // Buscamos el usuario actual
        $usuario->password = Hash::make($request->password);

        $usuario->save();

        // Redireccionamos al usuario

        return redirect()->route('perfil')->with(['message' => "Contraseña modificada correctamente"]);
    }

    public function storeImagen(Request $request)
    {
        if ($request->imagen) {

            // Recojo la imagen que se envía al formulario
            $imagen = $request->file('imagen');

            // Asigno un ID único a la imagen
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            // Creamos una copia de la imagen en el servidor
            $imagenServidor = Image::make($imagen);

            // Damos estilo a la imagen
            $imagenServidor->fit(1000, 1000);

            // Movemos la imagen de la memoria a una ruta
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id); // Buscamos el usuario actual
        $usuario->imagen = $nombreImagen ?? $usuario->imagen; // Asignamos valor de nombre imagen o mantenemos la actual
        $usuario->save();

        return redirect()->route('perfil')->with(['message' => 'Imagen actualizada correctamente']);
    }
}
