<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalesEnAdopcion extends Controller
{

    private $animalSelected;

    public function __construct()
    {
        // Creo el constructor para autenticar al usuario antes de devolver la vista perfil
        // En caso de no estar autenticado, devuelve la ruta login
        $this->middleware('auth');
    }

    public function index(){
        $animalSelected = $this->animalSelected->getAnimal();
        return view('animalesenadopcion');
    }
}
