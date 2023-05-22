<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'animals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'especie',
        'nacimiento',
        'actividad',
        'sexo',
        'tamaño',
        'edad',
        'peso',
        'descripcion',
        'motivo',
        'comunidad',
        'provincia',
        'vacunado',
        'desparasitado',
        'sano',
        'esterilizado',
        'identificado',
        'microchip',
        'tlfContacto',
        'imagenPerfil'
    ];

    public function getAnimals()
    {

        $tipoAnimal = session('tipoAnimal');
        $localizacion = session('localizacion');

        $sql = "SELECT * FROM animals WHERE especie = '$tipoAnimal' AND provincia = '$localizacion'";
        $animals = DB::select($sql);

        return $animals;
    }

    public function getAnimal($id)
    {

        $sql = "SELECT * FROM animals WHERE id = $id";
        $sqlAnimal = DB::table('animals')->where('id', $id)->get();

        return $sqlAnimal[0];
    }
}
