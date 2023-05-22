<?php

use App\Models\Animal;
use App\Http\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichaTecnica;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AdoptameController;
use App\Http\Controllers\AnimalesEnAdopcion;
use App\Http\Controllers\ContactoController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DarEnAdopcionController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\DarEnAdopcionFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routing de navegación

Route::get('/', function () {
    return view('inicio');
});

// Adóptame 

Route::get('adoptame', function () {
    return view('adoptame');
});

// Contacto

Route::get('contacto', [ContactoController::class, 'index'])->name('contacto');

// Registro

Route::get('registro', [RegisterController::class, 'index'])->name('registro');
Route::post('registro', [RegisterController::class, 'store']);

// Login

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);

// Logout
Route::post('logout', [LogoutController::class, 'store'])->name('logout');

// Perfil (Dashboard)

Route::get('perfil', [PerfilController::class, 'index'])->name('perfil');
Route::post('perfil-update', [PerfilController::class, 'storeDatos'])->name('perfil.storeDatos');
Route::post('perfil-image', [PerfilController::class, 'storeImagen'])->name('perfil.storeImagen');
Route::post('perfil-password', [PerfilController::class, 'storePassword'])->name('perfil.storePassword');

// Notificaciones

Route::get('notificaciones', [NotificacionesController::class, 'index'])->name('notificaciones');
Route::post('notificaciones', [NotificacionesController::class, 'store'])->name('notificaciones.store');

// Dar en adopción
Route::get('dar-en-adopcion', [DarEnAdopcionController::class, 'index'])->name('darenadopcion');
Route::post('dar-en-adopcion', [DarEnAdopcionController::class, 'store'])->name('darenadopcion.store');
Route::get('dar-en-adopcion-formulario', [DarEnAdopcionFormController::class, 'index'])->name('darenadopcionForm');
Route::post('dar-en-adopcion-formulario', [DarEnAdopcionFormController::class, 'store'])->name('darenadopcionForm.store');

// Adóptame

Route::get('adoptame', [AdoptameController::class, 'index'])->name('adoptame');
Route::post('adoptame', [AdoptameController::class, 'store'])->name('adoptame.store');

// Animales en adopcion
Route::get('en-adopcion', [AnimalesEnAdopcion::class, 'index'])->name('en-adopcion');

// Ficha técnica
Route::get('fichaTecnica/{id}', [FichaTecnica::class, 'index'])->name('fichaTecnica');
