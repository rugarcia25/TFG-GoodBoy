@extends('layouts.app')

@section('titulo')
Mi cuenta
@endsection

@section('contenido')
<section class=" dark:bg-gray-900 pt-10">
    @if (session('message'))
    <div
        class="mt-4 md:flex md:justify-center bg-green-100 border font-semibold border-green-400 text-green-700 px-4 py-3 rounded-lg relative">
        {{ session('message')}}
    </div>
    @endif

    <div
        class="md:flex md:justify-center text-sm font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:text-white pt-5">
        <div class="md:w-1/6 bg-white p-6">
            <a class="block w-full text-xl px-4 py-2">
                Mi Cuenta
            </a>
            <a href="/perfil"
                class="block w-full mx-5 px-4 py-2 cursor-pointer hover:text-primary-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                • Perfil
            </a>
            <a href="/notificaciones"
                class="block w-full mx-5 px-4 py-2 cursor-pointer hover:text-primary-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                • Notificaciones
            </a>
        </div>
        <div class="md:w-1/4 bg-white shadow p-6">
            <h1 class="text-primary-600 uppercase font-bold">1. Datos</h1>
            <form class="mt-3 font-light" method="POST" action="{{ route('perfil.storeDatos') }}"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="hidden" name="idEmail" id="idEmail" value="{{auth()->user()->id}}">
                    <input type="hidden" name="userHidden" id="userHidden" value="{{auth()->user()->name}}">
                </div>
                <div class="m-2 pb-1">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Tu nombre"
                        class=" @error('name')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-800 dark:focus:border-primary-700"
                        value="{{ auth()->user()->name }}">
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2 pb-2">
                    <label for="apellidos"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos"
                        class=" @error('apellidos')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tus apellidos" value="{{ auth()->user()->apellidos }}">
                    @error('apellidos')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2 pb-2">
                    <label for="user"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                    <input type="text" name="user" id="user"
                        class=" @error('user')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ auth()->user()->user }}">
                    @error('apellidos')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2 pb-2">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                    <input type="email" name="email" id="email"
                        class=" @error('email')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{auth()->user()->email}}">
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="bDatos"
                    class="hover:cursor-pointer w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    value="Guardar datos">
            </form>
            <br>
            <form class="mt-3 font-light" method="POST" action="{{ route('perfil.storePassword') }}"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-primary-600 uppercase font-bold mt-3">2. Cambiar Contraseña</h1>
                <div class="mt-3 m-2 pb-2">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña"
                        class=" @error('password')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2 pb-2">
                    <label for="confirm-password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repetir contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Repetir contraseña"
                        class=" @error('password_confirmation')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-700 dark:focus:border-primary-500">
                    @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="bPassword"
                    class="hover:cursor-pointer w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    value="Guardar contraseña">
            </form>
        </div>
        <div class="md:w-1/6 h-auto bg-white shadow p-9">
            <img class="rounded-full"
                src="{{ auth()->user()->imagen ? asset('perfiles') . '/' . auth()->user()->imagen : asset('images/logo/happyDog.png') }}"
                alt="Imagen Usuario" />
            <h1 class="mt-5 text-primary-600 uppercase font-bold">3. Cambiar imagen</h1>
            <form class="mt-3 font-light" method="POST" action="{{ route('perfil.storeImagen') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="m-2 pb-2">
                    <input type="file" name="imagen" id="imagen"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-800 dark:focus:border-primary-700"
                        accept=".png, .jpg, .jpeg">
                </div>
                <input type="submit" name="bImagen"
                    class="hover:cursor-pointer w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    value="Actualizar imagen">
            </form>
        </div>
    </div>
</section>
@endsection