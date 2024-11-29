<?php

use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\AntecedentesPersonalesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menu');
});



Route::get('tratamientos', [TratamientoController::class, 'index'])->name('tratamientos.index');
Route::get('tratamientos/create', [TratamientoController::class, 'create'])->name('tratamientos.create');
Route::post('tratamientos', [TratamientoController::class, 'store'])->name('tratamientos.store');
Route::get('tratamientos/{id}', [TratamientoController::class, 'show'])->name('tratamientos.show');
Route::get('tratamientos/{id}/edit', [TratamientoController::class, 'edit'])->name('tratamientos.edit');
Route::put('tratamientos/{id}', [TratamientoController::class, 'update'])->name('tratamientos.update');
Route::delete('tratamientos/{id}', [TratamientoController::class, 'destroy'])->name('tratamientos.destroy');

Route::resource('antecedentes', AntecedentesPersonalesController::class);





