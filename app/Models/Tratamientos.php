<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamientos extends Model
{
    // Especifica el nombre de la tabla (si no sigue la convención de pluralización)
    protected $table = 'tratamientos';

    // Especifica la clave primaria (si no es la convencional 'id')
    protected $primaryKey = 'id_tratamiento';

    // Evitar que Laravel intente gestionar las columnas 'created_at' y 'updated_at'
    // Si no usas timestamps (si ya no están definidos en la migración)
    public $timestamps = true;

    // Definir los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'sesion', 
        'complicaciones', 
        'prescripciones',
    ];

    // Si quieres agregar validaciones o mutadores, puedes hacerlo aquí
}
