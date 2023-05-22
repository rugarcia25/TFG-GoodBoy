@extends('layouts.app')

@section('titulo')
Notificaciones
@endsection

@section('contenido')
<section class="dark:bg-gray-900 pt-10">
    <div
        class="md:flex md:justify-center text-sm font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:text-white pt-8">
        <div class="md:w-1/7 mr-10 bg-white p-6">
            <a class="block w-full text-xl px-4 py-2">
                Mi Cuenta
            </a>
            <a href="/perfil"
                class="block w-full mx-5 px-4 py-2 cursor-pointer hover:text-primary-600 dark:hover:bg -gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                • Perfil
            </a>
            <a href="/notificaciones"
                class="block w-full mx-5 px-4 py-2 cursor-pointer hover:text-primary-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                • Notificaciones
            </a>
        </div>
        <div class="md:w-1/7 mr-10 bg-white p-6">
            @if (session('message'))
            <div
                class="md:flex md:justify-center bg-green-100 border my-3 font-semibold border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-2.5">
                {{ session('message')}}
            </div>
            @endif
            <h1 class="pt-2 text-xl">Notificaciones</h1>
            <form class="m-5" method="POST" action="{{route('notificaciones')}}">
                @csrf
                <label>
                    <input type="checkbox" name="cb1" id="cb1" value="cb1" class="hover:cursor-pointer my-2" @if (
                        $check1 ) checked @endif>
                    Acepto recibir promociones, ofertas y descuentos personalizados de empresas y/o protectoras
                    colaboradoras de Good Boy detalladas en la política de privacidad
                </label>
                <br><br>
                <label>
                    <input type="checkbox" name="cb2" id="cb2" value="cb2" class="hover:cursor-pointer my-2" @if (
                        $check2 ) checked @endif>
                    Acepto recibir notificaciones sobre el estado y seguimiento de una candidatura, adopción y/o animal
                    dado en adopción.
                </label>
                <input
                    class="hover:cursor-pointer flex mt-7 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300
                        font-medium rounded-lg px-5 py-2.5 text-center text-sm dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    type="submit" name="bNotificaciones" id="bNotificaciones" value="Guardar">
            </form>
        </div>
    </div>
    <div class="my-10">&nbsp;</div>
    <div class="my-10">&nbsp;</div>
    <div class="my-10">&nbsp;</div>
    <div class="my-10">&nbsp;</div>
    <div>&nbsp;</div>
</section>
@endsection