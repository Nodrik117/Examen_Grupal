<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCitas extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'historial_citas';

    // Definir los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'motivo',
        'observaciones',
        'duracion',
        'tratamiento_realizado',
    ];

    // Definir los campos de fecha si no quieres que Laravel los gestione automáticamente
    // protected $dates = ['created_at', 'updated_at']; // Si no usas timestamps puedes descomentarlo
}

