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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('id_paciente');
            $table->string('nombre_paciente');
            $table->string('apellido_paciente');
            $table->date('fecha_nacimiento');
            $table->string('telefono_paciente');
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->string('especialidad');
            $table->string('nombre_odontologo');
            $table->string('apellido_odontologo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
