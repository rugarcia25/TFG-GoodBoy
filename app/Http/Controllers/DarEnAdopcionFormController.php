<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DarEnAdopcionFormController extends Controller
{

    private $imagenPerfil;

    public function __construct()
    {
        // Creo el constructor para autenticar al usuario antes de devolver la vista perfil
        // En caso de no estar autenticado, devuelve la ruta login
        $this->middleware('auth');
    }

    public function index()
    {
        return view('darenadopcionForm');
    }

    public function store(Request $request)
    {

        // Valido los datos introducidos
        $this->validate($request, [
            'nombre' => 'required|alpha|min:3|max:20',
            'especie' => 'required',
            'nacimiento' => 'required',
            'actividad' => 'nullable',
            'sexo' => 'required',
            'tamaño' => 'required',
            'edad' => 'required',
            'peso' => 'required|min:1|numeric',
            'descripcion' => 'nullable|max:300',
            'motivo' => 'required',
            'comunidad' => 'required',
            'provincia' => 'required',
            'vacunado' => 'nullable',
            'desparasitado' => 'nullable',
            'sano' => 'nullable',
            'esterilizado' => 'nullable',
            'identificado' => 'nullable',
            'microchip' => 'nullable|numeric|min:10|max:20',
            'tlfContacto' => 'required|numeric|min:9',
            'imagenPerfil' => 'required'
        ]);

        if ($request->imagenPerfil) {

            // Recojo la imagen que se envía al formulario
            $imagen = $request->file('imagenPerfil');

            // Asigno un ID único a la imagen
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            // Creamos una copia de la imagen en el servidor
            $imagenServidor = Image::make($imagen);

            // Damos estilo a la imagen
            $imagenServidor->fit(1000, 1000);

            // Movemos la imagen de la memoria a una ruta
            $imagenPath = public_path('animales') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
            $imagenPerfil = $nombreImagen;
        }

        // Creamos el objeto con los datos del request(formulario)

        Animal::create([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'nacimiento' => $request->nacimiento,
            'actividad' => $request->actividad,
            'sexo' => $request->sexo,
            'tamaño' => $request->tamaño,
            'edad' => $request->edad,
            'peso' => $request->peso,
            'descripcion' => $request->descripcion,
            'motivo' => $request->motivo,
            'comunidad' => $request->comunidad,
            'provincia' => $request->provincia,
            'vacunado' => $request->vacunado,
            'desparasitado' => $request->desparasitado,
            'sano' => $request->sano,
            'esterilizado' => $request->esterilizado,
            'identificado' => $request->identificado,
            'microchip' => $request->microchip,
            'tlfContacto' => $request->tlfContacto,
            'imagenPerfil' => $imagenPerfil
        ]);

        //Redirecciono al usuario a su perfil
        return redirect()->route('darenadopcionForm')->with([
            'message' => 'Datos introducidos correctamente'
        ]);
    }
}
