<?php

use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\AntecedentesPersonalesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HistorialCitasController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ComplementoPersonalController;
use App\Http\Controllers\SignosVitalesController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('menu');
});

// Rutas para los tratamientos (usando recurso)
Route::resource('tratamientos', TratamientoController::class);

// Rutas para los antecedentes personales (usando recurso)
Route::resource('antecedentes', AntecedentesPersonalesController::class);

// Rutas para los usuarios (usando recurso)
Route::resource('usuarios', UsuarioController::class);

// Ruta para los usuarios (usando recurso)
Route::resource('historial_citas', HistorialCitasController::class);

// Ruta para los usuarios (usando recurso)
Route::resource('citas', CitaController::class);

Route::resource('complementos_personales', ComplementoPersonalController::class);

// Rutas para las citas (usando recurso)
Route::resource('citas', CitaController::class);

// Rutas para los signos vitales (usando recurso)
Route::resource('signos-vitales', SignosVitalesController::class);

