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
        Schema::create('historial_citas', function (Blueprint $table) {
            $table->id(); 
            $table->string('motivo');
            $table->string('observaciones');
            $table->time('duracion');
            $table->string('tratamiento_realizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_citas');
    }
};
