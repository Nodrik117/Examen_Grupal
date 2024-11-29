<?php

use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\AntecedentesPersonalesController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('menu');
});

// Ruta para los tratamientos (usando recurso)
Route::resource('tratamientos', TratamientoController::class);

// Ruta para los antecedentes personales (usando recurso)
Route::resource('antecedentes', AntecedentesPersonalesController::class);


