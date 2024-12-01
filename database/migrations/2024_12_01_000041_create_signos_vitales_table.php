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
        Schema::create('signos_vitales', function (Blueprint $table) {
            $table->id('id_signosVitales'); // Se define como SERIAL PRIMARY KEY
            $table->decimal('presion_arterial', 8, 2)->notNullable();
            $table->decimal('frecuencia_cardiaca', 8, 2)->notNullable();
            $table->decimal('temperatura', 8, 2)->notNullable();
            $table->decimal('frecuencia_respiratoria', 8, 2)->notNullable();
            $table->timestamps(); // Agrega columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signos_vitales');
    }
};
