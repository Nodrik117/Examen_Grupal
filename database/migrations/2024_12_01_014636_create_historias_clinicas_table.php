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
            $table->id();
            $table->date('fecha_creacion_historia');
            $table->string('establecimiento');
            $table->string('genero');
            $table->string('motivo_consulta')->nullable();
            $table->string('problema_actual')->nullable();
            $table->timestamps();
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
