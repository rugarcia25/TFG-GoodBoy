@extends('layouts.app')

@section('titulo')
Iniciar sesión
@endsection

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="md:flex md:justify-center mt-10 p-10 md:items-center">
        <div class="md:w-4/12 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Iniciar sesión
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Imprimimos el error de credenciales almacenadas en session() -->
                    @if (session('mensaje'))
                    <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">
                        {{ session('mensaje') }}
                    </p>
                    @endif

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tu
                            correo</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="correo@correo.com" required="">
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input name="remember" id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Mantener la sesión
                                    abierta</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar
                        sesión</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Todavía no tienes cuenta? <a href="{{ route('registro') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Regístrarme</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="md:w-5/12 ml-10 dark:bg-gray-800 dark:border-gray-700">
            <img src="{{ asset('images/perros.jpg') }}" alt="Login de Usuarios">
        </div>
    </div>
</section>
@endsection