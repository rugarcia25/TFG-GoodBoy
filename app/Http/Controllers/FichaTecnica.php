<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class FichaTecnica extends Controller
{
    private $animal;

    public function __construct()
    {
        // Creo el constructor para autenticar al usuario antes de devolver la vista perfil
        // En caso de no estar autenticado, devuelve la ruta login
        $this->animal = new Animal;
        $this->middleware('auth');
    }

    public function index($id)
    {
        $animal = $this->animal->getAnimal($id);
        return view('fichaTecnica')->with(['animal' => $animal]);
    }
}
