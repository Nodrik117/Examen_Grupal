<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPersonales extends Model
{
    // Definir el nombre de la tabla si no sigue la convención
    protected $table = 'antecedentes_personales';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'alergia_antibiotico',
        'alergia_anestesia',
        'asma',
        'diabetes',
        'hipertension',
        'enfermedad_cardiaca',
        'otros_antecedentes'
    ];

    // Si no deseas usar asignación masiva, puedes utilizar `guarded` en su lugar
    // protected $guarded = ['id']; // Esto evitará que se asigne el valor 'id' masivamente

    // Si tus fechas son personalizadas, puedes definirlas aquí
    // protected $dates = ['created_at', 'updated_at'];

    // Si necesitas cast de ciertos atributos
    protected $casts = [
        'alergia_antibiotico' => 'boolean',
        'alergia_anestesia' => 'boolean',
        'asma' => 'boolean',
        'diabetes' => 'boolean',
        'hipertension' => 'boolean',
        'enfermedad_cardiaca' => 'boolean',
        'otros_antecedentes' => 'string', // O 'text' si usas un tipo más largo
    ];
}
