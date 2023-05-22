<?php 
    include('../app/Helpers/Helpers.php');
    $tipoAnimal = session('tipoAnimal');
    $localizacion = session('localizacion');
?>

@extends('layouts.app')

@section('titulo')
Inicio
@endsection

@section('contenido')

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="bg-gray-100 mt-10 pb-10 shadow-lg">
    <div class="container mx-auto my-5 p-5 pt-10">
        <div class="md:flex no-wrap md:-mx-2">
            <!-- Parte izquierda -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Animal Card -->
                <div class="bg-white p-3 border-t-4 border-primary-400 rounded-lg">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto rounded-xl" src="{{ asset("animales/{$animal->imagenPerfil}")}}" alt="Imagen Animal {{$animal->nombre}}">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$animal->nombre}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$animal->tamaño}}</h3>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$animal->edad}}</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$animal->descripcion}}</p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Estado</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Disponible</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Dado en adopción</span>
                            <span class="ml-auto">Nov 07, 2016</span>
                        </li>
                    </ul>
                </div>
                <!-- End of animal card -->
                <div class="my-4"></div>
            </div>
            <!-- Parte central -->
            <div class="w-full md:w-5/12 mx-2 h-64 border-t-4 border-primary-400 rounded-lg">
                <!-- Datos -->
                <!-- Sección -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <!-- Icono huella -->
                            <i class="fa fa-paw"></i>
                        </span>
                        <span class="tracking-wide text-lg">Datos</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Nombre</div>
                                <div class="px-4 py-2">{{$animal->nombre}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Especie</div>
                                <div class="px-4 py-2">{{$animal->especie}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Tamaño</div>
                                <div class="px-4 py-2">{{$animal->tamaño}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Sexo</div>
                                <div class="px-4 py-2">{{$animal->sexo}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Edad</div>
                                <div class="px-4 py-2">{{$animal->edad}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Peso</div>
                                <div class="px-4 py-2">{{$animal->peso}} Kgs</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Actividad</div>
                                <div class="px-4 py-2">{{$animal->actividad}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Provincia</div>
                                <div class="px-4 py-2">{{$animal->provincia}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Fecha de nacimiento</div>
                                <div class="px-4 py-2">{{$animal->nacimiento}}</div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">Teléfono Contacto</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800">{{$animal->tlfContacto}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Acaba la sección -->

                <div class="my-4"></div>

                <!-- Mas información -->
                <div class="bg-white p-3 shadow-sm rounded-lg">
                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <i class='fa fa-pencil-square-o'></i>
                                </span>
                                <span class="tracking-wide text-lg">Me entregan</span>
                            </div>
                            <ul class="list-inside space-y-2 text-sm text-gray-700">
                                <li>
                                    <div class="px-4 pb-2">
                                        <p class="block">
                                            @if (!empty($animal->vacunado))
                                            <span class='mr-2 font-bold text-green-600'>✓</span>
                                            @else
                                            <span class='mr-2 font-bold text-red-500'>X</span>
                                            @endif
                                            Vacunado
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="px-4 pb-2">
                                        <p class="block">
                                            @if (!empty($animal->desparasitado))
                                            <span class='mr-2 font-bold text-green-600'>✓</span>
                                            @else
                                            <span class='mr-2 font-bold text-red-500'>X</span>
                                            @endif
                                            Desparasitado
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="px-4 pb-2">
                                        <p class="block">
                                            @if (!empty($animal->sano))
                                            <span class='mr-2 font-bold text-green-600'>✓</span>
                                            @else
                                            <span class='mr-2 font-bold text-red-500'>X</span>
                                            @endif
                                            Sano
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="px-4 pb-2">
                                        <p class="block">
                                            @if (!empty($animal->esterilizado))
                                            <span class='mr-2 font-bold text-green-600'>✓</span>
                                            @else
                                            <span class='mr-2 font-bold text-red-500'>X</span>
                                            @endif
                                            Esterilizado
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="px-4 pb-2 text-sm">
                                        <p class="block">
                                            @if (!empty($animal->identificado))
                                            <span class='mr-2 font-bold text-green-600'>✓</span>
                                            @else
                                            <span class='mr-2 font-bold text-red-500'>X</span>
                                            @endif
                                            Identificado
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <i class='fa fa-info-circle'></i>
                                </span>
                                <span class="text-lg">Más información</span>
                            </div>
                            <ul class="list-inside space-y-2 text-sm">
                                <li>
                                    <div>
                                        <p class="block">
                                            @if (!empty($animal->identificado))
                                            <span class='mr-2 font-bold text-green-600'>✓</span>
                                            <span class="mr-2">Microchip</span>
                                            <span class="mr-2 font-semibold">{{$animal->microchip}}</span>
                                            @else
                                            <span class='mr-2 font-bold text-red-500'>X</span>
                                            <span class="mr-2">Microchip</span>
                                            @endif
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Fin de más información -->
                </div>
                <!-- Fin de la parte de datos -->
            </div>
            <!-- Parte derecha -->
            <div class="w-full md:w-5/12 mx-2 h-64 border-t-4 border-primary-400 rounded-lg">
                <!-- Requisitos -->
                <div class="bg-white p-3 shadow-sm rounded-lg">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <i class='fa fa-bars'></i>
                        </span>
                        <span class="tracking-wide text-lg">Requisitos</span>
                    </div>
                    <div class="text-gray-700 my-2">
                        <p class="text-sm my-2">Si quieres adoptar a este bomboncito, ponte en contacto a través de este
                            email: <span class="font-semibold">goodboy@email.com</span>, estaremos encantado/as de
                            ofrecerte toda la información referente
                            a la adopción. </p>
                        <p class="text-sm my-2">Nuestros animales disponen de microchip, vacunas, desparasitaciones,
                            pasaporte veterinario y son castrados (si tienen edad) o compromiso de esterilización a
                            cargo del adoptante.</p>
                        <p class="text-sm my-2">Se envía a cualquier provincia siempre y cuando el transporte llegue a
                            esa zona.</p>
                    </div>
                </div>
                <!-- Fin de requisitos -->

                <div class="my-4"></div>
                <!-- Historia -->
                <div class="bg-white p-3 shadow-sm rounded-lg">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <!-- Icono huella -->
                            <i class='fa fa-book'></i>
                        </span>
                        <span class="tracking-wide text-lg">Historia</span>
                    </div>
                    <div class="text-gray-700 my-2">
                        <p class="text-sm"><span class="font-semibold">{{$animal->nombre}}</span>, este angelito se
                            encuentra en el refugio, allí espera a una
                            familia que lo cuide y ame con locura, merece ser feliz y conocer lo que es el amor.</p>
                    </div>
                </div>
                <!-- Fin de historia -->

                <div class="my-4"></div>
                <!-- Tasa de adopción -->
                <div class="bg-white p-3 shadow-sm rounded-lg">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <!-- Icono huella -->
                            <i class='fa fa-euro'></i>
                        </span>
                        <span class="tracking-wide text-lg">Tasa de adopción</span>
                    </div>
                    <div class="text-gray-700">
                        <h1 class="text-2xl my-5">Consultar con la protectora</h1>
                        <p class="text-xs">La tasa de adopción, establecida por la protectora, normalmente incluye:
                            Vacunaciones y desparasitaciónes al día, microchip, esterilización o castración, cartilla
                            sanitaria y/u otros gastos.</p>
                        <p class="text-xs">Good Boy en ningún momento recibirá nada de esta cantidad, será íntegro para
                            la protectora.</p>
                        <p class="text-xs">Para más información consultar con la protectora.</p>
                    </div>
                </div>
                <!-- Fin de Tasa de adopción -->
            </div>
        </div>
    </div>
</div>

@endsection