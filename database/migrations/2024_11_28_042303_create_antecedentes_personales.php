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
        Schema::create('antecedentes_personales', function (Blueprint $table) {
            $table->id();
            $table->boolean('alergia_antibiotico');
            $table->boolean('alergia_anestesia');
            $table->boolean('asma');
            $table->boolean('diabetes');
            $table->boolean('hipertension');
            $table->boolean('enfermedad_cardiaca');
            $table->string('otros_antecedentes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes_personales');
    }
};
