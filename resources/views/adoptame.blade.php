<?php include('../app/Helpers/Helpers.php'); 
?>

@extends('layouts.app')

@section('titulo')
Adóptame
@endsection

@section('contenido')
<section class="w-full dark:bg-gray-900">
    <div class="md:flex md:justify-center text-sm font-medium text-gray-900 bg-black-100 py-10 px-10 pt-10 mt-10">
        <div class="w-3/6"></div>
        <div class="w-full">
            <img class="object-fill h-64 w-full rounded-lg" src="{{ asset('images/friends.jpg') }}"
                alt="Imagen encabezado animales">
        </div>
        <div class="w-3/6"></div>
    </div>
    <div class="md:flex text-sm font-medium text-gray-900 bg-black-100 mb-10">
        <div class="w-3/6"></div>
        <div class="bg-gray-50 w-full rounded-lg shadow-lg items-center mb-10 py-5 px-10 ">
            <form method="POST" action="{{ route('adoptame')}}">
                @csrf
                <div class="md:flex pl-10 mb-3">
                    <label for="tipoAnimal" class="font-semibold text-base pr-4 py-5"><span class="text-lg">Tipo de
                            animal</span>
                        <select type="text" id="tipoAnimal" name="tipoAnimal"
                            class=" @error('tipoAnimal')border-red-500 @enderror hover:cursor-pointer md:flex mt-2.5 p-2.5 pr-10 bg-gray-50 border border-gray-400 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                            <option disabled selected>Perros, gatos, conejos, aves...</option>
                            @foreach ($especies as $tipoAnimal)
                            <option value='{{$tipoAnimal}}' {{ old('tipoAnimal')==$tipoAnimal ? 'selected' : '' }}>
                                {{$tipoAnimal}}</option>
                            @endforeach
                            >
                        </select>
                        @error('tipoAnimal')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </label>
                    <label for="localizacion" class="font-semibold text-base pl-10 py-5"><span
                            class="text-lg">Localización</span>
                        <select type="text" id="localizacion" name="localizacion"
                            class=" @error('localizacion')border-red-500 @enderror hover:cursor-pointer md:flex mt-2.5 p-2.5 pr-10 bg-gray-50 border border-gray-400 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 ">
                            <option disabled selected>Provincia...</option>
                            @foreach ($provincias as $provincia)
                            <option value='{{$provincia}}' {{ old('provincia')==$provincia ? 'selected' : '' }}>
                                {{$provincia}}</option>
                            @endforeach
                            >
                        </select>
                        @error('localizacion')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </label>
                    <div class="md:items-center flex pt-8 ml-3 px-10">
                        <input
                            class="hover:cursor-pointer text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300
                                font-medium rounded-lg text-center px-10 py-2.5 pt-3 mt-1.5 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="submit" name="bAceptar" id="bAceptar" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
        <div class="w-3/6"></div>
    </div>
</section>
@endsection