<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear la tabla 'historias_clinicas'
        Schema::create('historias_clinicas', function (Blueprint $table) {
            $table->id('id_historiaclinica'); // ID único para la historia clínica
            $table->date('fecha_creacion_historia'); // Fecha de creación de la historia clínica
            $table->string('establecimiento', 50); // Nombre del establecimiento
            $table->string('genero', 50); // Género del paciente
            $table->string('motivo_consulta', 200)->nullable(); // Motivo de la consulta
            $table->string('problema_actual', 200)->nullable(); // Descripción del problema actual
            $table->timestamps(); // Timestamps para las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla 'historias_clinicas' si la migración se revierte
        Schema::dropIfExists('historias_clinicas');
    }
};
