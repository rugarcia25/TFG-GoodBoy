<?php 
    include('../app/Helpers/Helpers.php');
    $tipoAnimal = session('tipoAnimal');
    $localizacion = session('localizacion');
?>

@extends('layouts.app')

@section('titulo')
{{ session('tipoAnimal')}}s en adopción
@endsection

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900 pt-4">
    <div class="md:flex w-full mt-10 pb-3.5 pl-10 pt-3.5 bg-primary-500">
        <h1 class="text-xl font-semibold pt-1">Filtrar</h1>
        <form method="POST" class="md:flex px-5">
            @csrf
            <select id="especie" name="especie"
                class=" @error('especie')border-red-500 @enderror ml-1 p-2 px-4 mx-3 font-semibold bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                @foreach ($especies as $especie)
                <option value='{{$especie}}' {{ old('especie')==$especie ? 'selected' : '' }}>{{$especie}}</option>
                @endforeach
            </select>
            <select id="provincia" name="provincia"
                class=" @error('provincia')border-red-500 @enderror ml-1 p-2 mx-3 font-semibold bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                @foreach ($provincias as $provincia)
                <option value='{{$provincia}}' {{ old('provincia')==$provincia ? 'selected' : '' }}>{{$provincia}}
                </option>
                @endforeach
            </select>
            <select id="sexo" name="sexo"
                class=" @error('sexo')border-red-500 @enderror ml-1 p-2 px-4 mx-3 font-semibold bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                @foreach ($sexos as $sexo)
                <option value='{{$sexo}}' {{ old('sexo')==$sexo ? 'selected' : '' }}>{{$sexo}}</option>
                @endforeach
            </select>
            <select id="edad" name="edad"
                class=" @error('edad')border-red-500 @enderror ml-1 p-2 px-4 mx-3 font-semibold bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                @foreach ($edades as $edad)
                <option value='{{$edad}}' {{ old('edad')==$edad ? 'selected' : '' }}>{{$edad}}</option>
                @endforeach
            </select>
            <select id="tamaño" name="tamaño"
                class=" @error('tamaño')border-red-500 @enderror ml-1 p-2 px-4 mx-3 font-semibold bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                @foreach ($tamaños as $tamaño)
                <option value='{{$tamaño}}' {{ old('tamaño')==$tamaño ? 'selected' : '' }}>{{$tamaño}}</option>
                @endforeach
            </select>
            <input
                class="hover:cursor-pointer text-white bg-primary-800 hover:bg-primary-900 focus:ring-4 focus:outline-none focus:ring-primary-600
                    font-medium rounded-lg px-5 py-2.5 text-center text-sm dark:bg-primary-800 dark:hover:bg-primary-900 dark:focus:ring-primary-800"
                type="submit" name="bBuscar" id="bBuscar" value="Buscar">
        </form>
    </div>

    @if (session('tipoAnimal'))
    <div class="mx-5 p-7">
        <h1 class="font-bold text-lg block"><span class="text-primary-600 text-xl">{{session('tipoAnimal')}}s</span> en
            adopción</h1>
        <div class="md:flex mt-2 flex flex-wrap">
            @foreach ($animales as $animal)
            <div class="w-80 flex flex-wrap max-w-sm rounded-lg overflow-hidden shadow-lg m-2.5 mx-3">
                <img class="h-64 w-full" src="{{ asset("animales/{$animal->imagenPerfil}") }}"
                alt="Imagen {{ $animal->nombre }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2"><a class="hover:cursor-pointer"
                            href="{{ route('fichaTecnica', $animal->id)}}">{{ $animal->nombre }}</a></div>
                    <p class="text-gray-700 text-base">
                        {{ $animal->descripcion }}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{
                        $animal->tamaño }}</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{
                        $animal->edad }}</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{
                        $animal->provincia }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>
@endsection