@extends('layouts.app')

@section('titulo')
Dar en adopción
@endsection

@section('contenido')
<section class="dark:bg-gray-900 pt-10 mb-10 pb-10">
    <div class="md:flex pt-10 pb-10 md:justify-center md:items-center">
        <div class="box-border w-1/2 border-2 border-primary-500">
            <h1 class="text-xl text-white font-bold bg-primary-500 p-5">Importante!</h1>
            <div class="m-5">
                <p class="p-1 mb-2 text-lg"><b>Antes de dar en adopción, debes tener en cuenta los siguientes
                        puntos.</b></p>
                <p class="p-1"><b>✓</b> Límite máximo de <b>3 casos por cuenta</b>. Si quieres dar más de 3 animales en
                    adopción por ser una camada, agrúpalos en el mismo anuncio o ponte en contacto con nosotros.</p>
                <p class="p-1"><b>✓</b> Los particulares no pueden publicar tasa de adopción ni recibir donaciones y
                    apadrinamientos.</p>
                <p class="p-1"><b>✓</b> Queda <b>totalmente prohibida la venta</b>, en caso de detectar indicios de
                    ello, tu cuenta podrá ser borrada y se procederá a denunciar.</p>
                <p class="p-1"><b>✓</b> El anuncio será validado antes de que sea visible a los posibles adoptantes. En
                    caso de incumplir nuestras políticas de publicación, será eliminado. El proceso de validación puede
                    durar hasta 24 horas.</p>
                <form class="text-center mt-5 mb-8" method="POST" action="{{ route('darenadopcion')}}">
                    @csrf
                    <input
                        class="hover:cursor-pointer text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300
                            font-medium rounded-lg px-5 py-2.5 text-center text-sm dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="submit" name="bAdopcion" id="bAdopcion" value="Continuar">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection