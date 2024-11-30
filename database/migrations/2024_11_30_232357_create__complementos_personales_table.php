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
        Schema::create('_complementos_personales', function (Blueprint $table) {
                $table->id(); // ID único
    
                // Campos sobre características anatómicas
                $table->string('labios')->nullable(); // Información sobre los labios
                $table->string('mejillas')->nullable(); // Información sobre las mejillas
                $table->string('maxilar_superior')->nullable(); // Información sobre el maxilar superior
                $table->string('maxilar_inferior')->nullable(); // Información sobre el maxilar inferior
    
                // Campos adicionales
                $table->string('lengua')->nullable(); // Estado de la lengua
                $table->string('paladar_duro')->nullable(); // Información sobre el paladar duro
                $table->string('paladar_blando')->nullable(); // Información sobre el paladar blando
                $table->string('piso_boca')->nullable(); // Condiciones del piso de la boca
                $table->string('amigdalas')->nullable(); // Estado de las amígdalas
                $table->string('frenillo_labial')->nullable(); // Información sobre el frenillo labial
                $table->string('frenillo_lingual')->nullable(); // Información sobre el frenillo lingual
    
                // Campos sobre hallazgos clínicos
                $table->boolean('lesiones_orales')->default(false); // Indica si hay lesiones orales
                $table->text('descripcion_lesiones_orales')->nullable(); // Descripción de las lesiones orales
                $table->string('higiene_oral')->nullable(); // Nivel de higiene oral (buena, regular, mala)
    
                // Campos relacionados con el diagnóstico
                $table->text('observaciones_generales')->nullable(); // Observaciones generales del odontólogo
                $table->string('estado_general')->nullable(); // Estado general del paciente (normal, anormal, etc.)
    
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_complementos_personales');
    }
};
