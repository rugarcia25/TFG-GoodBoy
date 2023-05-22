<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{

    public function __construct()
    {
        // Creo el constructor para autenticar al usuario antes de devolver la vista perfil
        // En caso de no estar autenticado, devuelve la ruta login
        $this->middleware('auth');
    }

    public function index()
    {

        $usuario = User::find(auth()->user()->id); // Buscamos el usuario actual

        return view('notificaciones', ['check1' => $usuario->cb1, 'check2' => $usuario->cb2]);
    }

    public function store(Request $request)
    {

        $usuario = User::find(auth()->user()->id); // Buscamos el usuario actual

        if (isset($_POST["cb1"])) {
            $check_cb1 = 1;
        } else {
            $check_cb1 = 0;
        }

        if (isset($_POST["cb2"])) {
            $check_cb2 = 1;
        } else {
            $check_cb2 = 0;
        }

        $usuario->cb1 = $check_cb1;
        $usuario->cb2 = $check_cb2;

        $usuario->save();

        return redirect()->route('notificaciones')->with([
            'message' => 'Preferencias modificadas correctamente',
            'check1' => $usuario->cb1,
            'check2' => $usuario->cb2
        ]);
    }
}
