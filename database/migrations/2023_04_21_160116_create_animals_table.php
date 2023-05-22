<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            // 1. Datos
            $table->string('nombre');
            $table->string('especie');
            $table->date('nacimiento');
            $table->string('actividad')->nullable();
            $table->string('sexo');
            $table->string('tamaño');
            $table->string('edad');
            $table->integer('peso');
            $table->text('descripcion')->nullable();
            $table->string('motivo');

            // 2. Localizacion
            $table->string('comunidad');
            $table->string('provincia');
            
            // 3. Entrega
             
            $table->string('vacunado')->nullable();
            $table->string('desparasitado')->nullable();
            $table->string('sano')->nullable();
            $table->string('esterilizado')->nullable();
            $table->string('identificado')->nullable();
            $table->integer('microchip')->nullable();
            
            // 4. Contacto
            $table->integer('tlfContacto');

            // 5. Imagen
            $table->string('imagenPerfil')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
