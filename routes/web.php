<?php

use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\AntecedentesPersonalesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HistorialCitasController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ComplementoPersonalController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('menu');
});

// Ruta para los tratamientos (usando recurso)
Route::resource('tratamientos', TratamientoController::class);

// Ruta para los antecedentes personales (usando recurso)
Route::resource('antecedentes', AntecedentesPersonalesController::class);

// Ruta para los usuarios (usando recurso)
Route::resource('usuarios', UsuarioController::class);

// Ruta para los usuarios (usando recurso)
Route::resource('historial_citas', HistorialCitasController::class);

// Ruta para los usuarios (usando recurso)
Route::resource('citas', CitaController::class);

Route::resource('complementos_personales', ComplementoPersonalController::class);
