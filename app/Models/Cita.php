<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_paciente', 
        'nombre_paciente', 
        'apellido_paciente',
        'fecha_nacimiento',
        'telefono_paciente',
        'fecha_cita',
        'hora_cita',
        'especialidad',
        'nombre_odontologo',
        'apellido_odontologo'
    ];
}