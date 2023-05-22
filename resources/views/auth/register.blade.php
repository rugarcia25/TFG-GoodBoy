@extends('layouts.app')

@section('titulo')
Registro
@endsection

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="md:flex md:justify-center md:items-center">
        <div class="md:w-5/12 bg-white p-8 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1
                    class="mt-2 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Crear cuenta
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('registro') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="name" id="name"
                            class=" @error('name')border-red-300 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tu nombre" value="{{old('name')}}">
                        @error('name')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="apellidos"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos"
                            class=" @error('apellidos')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tus apellidos" value="{{old('apellidos')}}">
                        @error('apellidos')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="user"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                        <input type="text" name="user" id="user"
                            class=" @error('user')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tu usuario" value="{{old('user')}}">
                        @error('user')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                        <input type="email" name="email" id="email"
                            class=" @error('email')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nombre@email.es" value="{{old('email')}}">
                        @error('email')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class=" @error('password')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('password')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="confirm-password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                            contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class=" @error('password_confirmation')border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('password_confirmation')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm text-center p-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Acepto los <a
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                                    href="#">Términos y Condiciones</a></label>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Crear
                        cuenta</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Ya estás registrado? <a href="{{ route('login') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Inicia sesión</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="md:w-8/12 dark:bg-gray-800 dark:border-gray-700">
            <img src="{{ asset('images/animales.jpg') }}" alt="Registro de Usuarios">
        </div>
    </div>
</section>
@endsection