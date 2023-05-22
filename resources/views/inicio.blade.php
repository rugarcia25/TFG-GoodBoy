@extends('layouts.app')

@section('titulo')
Inicio
@endsection

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="w-full">
        <div class="flex bg-white" style="height:525px;">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-5xl">Good <span
                            class="text-primary-600">Boy</span></h2>
                    <p class="mt-10 text-sm text-gray-500 md:text-base">Good Boy es una organización sin fines de lucro
                        que se dedica a promover la adopción de animales en situación desfavorecida.</p>
                    <p class="mt-5 text-sm text-gray-500 md:text-base">Trabajamos en conjunto con protectoras y refugios
                        para rescatar a animales abandonados y encontrarles un hogar seguro y amoroso. Además, Good Boy
                        ofrece programas de educación para fomentar la tenencia responsable de mascotas y campañas de
                        esterilización para evitar la sobrepoblación de animales callejeros.</p>
                    <p class="mt-5 text-sm text-gray-500 md:text-base">Esta organización cree que cada animal merece un
                        hogar feliz y está comprometida en hacerlo posible.</p>
                    <div class="flex justify-center lg:justify-start mt-10">
                        <a class="px-4 py-3 bg-primary-900 text-gray-200 text-sm font-semibold rounded hover:bg-primary-800"
                            href="{{ route('adoptame')}}">Adopta</a>
                        <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-sm font-semibold rounded hover:bg-gray-400"
                            href="{{ route('contacto')}}">Contacto</a>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                <div class="h-full object-cover" style="background-image: url('images/familia2.jpg')">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
            </div>
        </div>
        <div class="flex bg-white" style="height:535px;">
            <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(0% 0, 100% 0%, 90% 100%, 0 100%)">
                <div class="h-full object-cover" style="background-image: url('images/equipo.jpeg')">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
            </div>
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-5xl">Equipo</h2>
                    <p class="mt-10 text-sm text-gray-500 md:text-base">Good Boy es un equipo de voluntarios que
                        colabora con varias protectoras de animales y conoce de cerca las necesidades de estas
                        asociaciones.</p>
                    <p class="mt-5 text-sm text-gray-500 md:text-base">Gracias a su experiencia, Good Boy trabaja en
                        proyectos que tienen un impacto real en la vida de los animales, ayudando a encontrar hogares,
                        rescatando animales en situación de abandono y fomentando la adopción responsable.</p>
                    <p class="mt-5 text-sm text-gray-500 md:text-base">Este equipo demuestra que la colaboración y el
                        compromiso pueden marcar una gran diferencia en la lucha por proteger y salvar vidas animales.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex bg-white" style="height:535px;">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-5xl">Conciencia al <span
                            class="text-primary-600">adoptar</span></h2>
                    <p class="mt-10 text-sm text-gray-500 md:text-base">Adoptar un animal es una forma de salvar vidas y
                        reducir el número de animales abandonados.</p>
                    <p class="mt-5 text-sm text-gray-500 md:text-base">Para prevenir el sufrimiento y controlar la
                        población animal, es esencial esterilizar a las mascotas.</p>
                    <p class="mt-5 text-sm text-gray-500 md:text-base">Una sola mascota sin esterilizar puede dar lugar
                        a una gran cantidad de cachorros en pocos años.</p>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                <div class="h-full object-cover" style="background-image: url('images/conciencia.jpg')">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection