<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'historias_clinicas';

    // Campos rellenables
    protected $fillable = [
        'fecha_creacion_historia',
        'establecimiento',
        'genero',
        'motivo_consulta',
        'problema_actual',
    ];
}
