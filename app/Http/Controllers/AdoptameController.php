<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdoptameController extends Controller
{

    private $animales;

    public function __construct()
    {
        // Creo el constructor para autenticar al usuario antes de devolver la vista perfil
        // En caso de no estar autenticado, devuelve la ruta login
        $this->middleware('auth');
        $this->animales = new Animal;
    }

    public function index()
    {
        return view('adoptame');
    }

    public function store(Request $request)
    {

        $usuario = User::find(auth()->user()->id); // Buscamos el usuario actual

        // Valido los datos introducidos
        $this->validate($request, [
            'tipoAnimal' => 'required',
            'localizacion' => 'required'
        ]);

        //Guardo en las sesiones las variables introducidas por el usuario para poder trabajar con ellas desde otra vista
        session([
            'tipoAnimal' => $request->tipoAnimal,
            'localizacion' => $request->localizacion
        ]);

        $animales = $this->animales->getAnimals();
        return view('animalesenadopcion', ['animales' => $animales]);
    }
}
