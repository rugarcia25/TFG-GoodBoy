<?php include('../app/Helpers/Helpers.php'); ?>

@extends('layouts.app')

@section('titulo')
Dar en adopción
@endsection

@section('contenido')
<section class="mt-3 bg-gray-50 dark:bg-gray-900 pt-10 pb-10">
    <h1 class="md:w-2/5 md:flex md:justify-center md:items-center text-xl font-semibold pt-5 pl-5">Dar en adopción</h1>
    <div class="md:w-2/5 md:flex md:justify-center md:items-center text-xs pl-10 ml-10">
        Los campos obligatorios están marcados con <b>&nbsp;*</b>
    </div>
    <div class="md:flex md:justify-center md:items-center pt-5">
        <div class="md:w-2/3 bg-white p-7 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            @if (session('message'))
            <div
                class="md:flex md:justify-center bg-green-100 border font-semibold border-green-400 text-green-700 px-4 py-3 rounded-lg relative mt-2.5">
                {{ session('message')}}
            </div>
            @endif
            @if ($errors->any())
            <div
                class="md:flex md:justify-center bg-red-100 border font-semibold border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-2.5">
                <ul>
                    <li>Faltan campos obligatorios por rellenar.</li>
                </ul>
            </div>
            @endif
            <form method="Post" action="{{ route('darenadopcionForm')}}" enctype="multipart/form-data">
                @csrf
                <h1 class="text-primary-600 font-semibold text-lg mb-3">1. Datos</h1>
                <div>
                    <label for="nombre" class="text-gray-900 dark:text-white">Nombre <b>*</b> : </label>
                    <input type="text" name="nombre" id="nombre"
                        class=" @error('nombre')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 "
                        placeholder="Nombre" value="{{old('nombre')}}">
                    <label for="especie" class="text-gray-900 dark:text-white ml-3">Especie <b>*</b> : </label>
                    <select id="especie" name="especie"
                        class=" @error('especie')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                        <option disabled selected>Selecciona...</option>
                        @foreach ($especies as $especie)
                        <option value='{{$especie}}' {{ old('especie')==$especie ? 'selected' : '' }}>{{$especie}}
                        </option>
                        @endforeach
                    </select>
                    <label for="nacimiento" class="text-gray-900 dark:text-white ml-3">Fecha Nacimiento <b>*</b> :
                    </label>
                    <input type="date" name="nacimiento" id="nacimiento"
                        class=" @error('nacimiento')border-red-500 @enderror w-1/5 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600"
                        placeholder="nacimiento" value="{{old('nacimiento')}}">
                </div><br>
                <div>
                    <label for="actividad" class="text-gray-900 dark:text-white">Actividad: </label>
                    <select id="actividad" name="actividad"
                        class="w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                        <option disabled selected>Selecciona...</option>
                        @foreach ($actividades as $actividad)
                        <option value='{{$actividad}}' {{ old('actividad')==$actividad ? 'selected' : '' }}>
                            {{$actividad}}</option>
                        @endforeach
                    </select>
                    <label for="sexo" class="text-gray-900 dark:text-white ml-3">Sexo <b>*</b> : </label>
                    <input type="radio" name="sexo" id="macho" value="Macho" class="ml-2 hover:cursor-pointer" {{
                        old('sexo')=="Macho" ? 'checked' : '' }}>
                    <label for="macho" class="hover:cursor-pointer">Macho</label>
                    <input type="radio" name="sexo" id="hembra" value="Hembra" class="ml-2 hover:cursor-pointer" {{
                        old('sexo')=="Hembra" ? 'checked' : '' }}>
                    <label for="hembra" class="hover:cursor-pointer">Hembra</label>
                </div><br>
                <div>
                    <label for="tamaño" class="text-gray-900 dark:text-white">Tamaño <b>*</b> : </label>
                    <select id="tamaño" name="tamaño"
                        class=" @error('tamaño')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                        <option disabled selected>Selecciona...</option>
                        @foreach ($tamaños as $tamaño)
                        <option value='{{$tamaño}}' {{ old('tamaño')==$tamaño ? 'selected' : '' }}>{{$tamaño}}</option>
                        @endforeach
                    </select>
                    <label for="edad" class="text-gray-900 dark:text-white ml-4">Edad <b>*</b> : </label>
                    <select id="edad" name="edad"
                        class=" @error('edad')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                        <option disabled selected>Selecciona...</option>
                        @foreach ($edades as $edad)
                        <option value='{{$edad}}' {{ old('edad')==$edad ? 'selected' : '' }}>{{$edad}}</option>
                        @endforeach
                    </select>
                    <label for="peso" class="text-gray-900 dark:text-white ml-3 ">Peso <b>*</b> : </label>
                    <input type="number" name="peso" id="peso"
                        class=" @error('peso')border-red-500 @enderror w-1/12 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600"
                        placeholder="En Kg" value="{{old('peso')}}">
                </div><br>
                <div>
                    <label for="descripcion" class="text-gray-900 dark:text-white">Descripcion: </label>
                    <textarea id="descripcion" name="descripcion" rows="6"
                        class="block mt-2 p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Quieres aportar más información sobre el animal?...">{{old('descripcion')}}</textarea>
                </div><br>
                <div>
                    <div class="block p-5 bg-blue-400 text-white font-semibold text-sm rounded-lg w-1/2">
                        ¡Atención! La siguiente pregunta solo tiene fines estadísticos.
                        En ningún momento se hará pública y se relacionará con tu nombre.
                        Por favor, responda con sinceridad.
                    </div>
                    <br>
                    <div>
                        <label for="motivo" class="text-white-900 dark:text-white block">¿Por que motivo quieres darlo
                            en adopción? <b>*</b></label>
                        <select id="motivo" name="motivo"
                            class=" @error('motivo')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                            <option disabled selected>Selecciona...</option>
                            @foreach ($motivos as $motivo)
                            <option value='{{$motivo}}' {{ old('motivo')==$motivo ? 'selected' : '' }}>{{$motivo}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <h1 class="text-primary-600 font-semibold text-lg mt-5 mb-2">2. Localización</h1>
                <div>
                    <label for="comunidad" class="text-gray-900 dark:text-white">Comunidad <b>*</b> : </label>
                    <select id="comunidad" name="comunidad"
                        class=" @error('comunidad')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                        <option disabled selected>Selecciona...</option>
                        @foreach ($comunidades as $comunidad)
                        <option value='{{$comunidad}}' {{ old('comunidad')==$comunidad ? 'selected' : '' }}>
                            {{$comunidad}}</option>
                        @endforeach
                    </select>
                    <label for="provincia" class="text-gray-900 dark:text-white ml-3">Provincia <b>*</b> : </label>
                    <select id="provincia" name="provincia"
                        class=" @error('provincia')border-red-500 @enderror w-1/6 ml-1 mt-2.5 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                        <option disabled selected>Selecciona...</option>
                        @foreach ($provincias as $provincia)
                        <option value='{{$provincia}}' {{ old('provincia')==$provincia ? 'selected' : '' }}>
                            {{$provincia}}</option>
                        @endforeach
                    </select>
                </div>

                <h1 class="text-primary-600 font-semibold text-lg mt-5 mb-2">3. Entrega</h1>
                <div class="pt-3 w-full">
                    <label class="hover:cursor-pointer text-gray-900 dark:text-white">
                        <input type="checkbox" name="vacunado" id="vacunado" class="hover:cursor-pointer w-8" {{
                            old('vacunado')=='on' ? 'checked' : '' }}>Vacunado
                    </label>
                    <label class="hover:cursor-pointer">
                        <input type="checkbox" name="desparasitado" id="desparasitado" class="hover:cursor-pointer w-8"
                            {{ old('desparasitado')=='on' ? 'checked' : '' }}>Desparasitado
                    </label>
                    <label class="hover:cursor-pointer">
                        <input type="checkbox" name="sano" id="sano" class="hover:cursor-pointer w-8" {{
                            old('sano')=='on' ? 'checked' : '' }}>Sano
                    </label>
                    <label class="hover:cursor-pointer">
                        <input type="checkbox" name="esterilizado" id="esterilizado" class="hover:cursor-pointer w-8" {{
                            old('esterilizado')=='on' ? 'checked' : '' }}>Esterilizado
                    </label>
                    <label class="hover:cursor-pointer">
                        <input type="checkbox" name="identificado" id="identificado" class="hover:cursor-pointer w-8" {{
                            old('identificado')=='on' ? 'checked' : '' }}>Identificado
                    </label>
                </div>
                <div class="pt-2">
                    <label>Microchip:
                        <input type="number" name="microchip" id="microchip"
                            class=" @error('microchip')border-red-500 @enderror w-1/8 ml-1 mt-2.5 p-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600"
                            value="{{old('microchip')}}" placeholder="XXXXXXXXXXXXXXX">
                    </label>
                </div>
                <div>
                    <h1 class="text-primary-600 font-semibold text-lg mt-5 mb-2">4. Contacto</h1>
                    <label>Teléfono de contacto <b>*</b> :
                        <input type="tel" id="tlfContacto" name="tlfContacto"
                            class=" @error('tlfContacto')border-red-500 @enderror w-1/8 ml-1 mt-1.5 p-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600"
                            value="{{old('tlfContacto')}}" placeholder="Teléfono de contacto...">
                    </label>
                </div>
                <div class="block w-1/3">
                    <h1 class="text-primary-600 font-semibold text-lg mt-3 mb-2">5. Foto de perfil</h1>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagenPerfil">Subir
                        imagen *</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="imagenPerfil_help" id="imagenPerfil" name="imagenPerfil" type="file"
                        accept=".jpg, .png, .jpeg">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="imagenPerfil_help">PNG, JPEG o JPG
                        (MAX. 800x400px).</p>
                </div>
                <br>
                <input
                    class="hover:cursor-pointer text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300
                        font-medium rounded-lg px-5 py-2.5 text-center text-sm dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    type="submit" name="bAdopcion" id="bAdopcion" value="Guardar datos">
            </form>
        </div>
    </div>
</section>
@endsection