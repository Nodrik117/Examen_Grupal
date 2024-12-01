<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignosVitales extends Model
{
    // Especifica el nombre de la tabla (si no sigue la convención de pluralización)
    protected $table = 'signos_vitales';

    // Especifica la clave primaria (si no es la convencional 'id')
    protected $primaryKey = 'id_signosVitales';

    // Evitar que Laravel intente gestionar las columnas 'created_at' y 'updated_at'
    // Cambia a false si no tienes columnas de timestamps en la tabla
    public $timestamps = true;

    // Definir los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'presion_arterial', 
        'frecuencia_cardiaca', 
        'temperatura', 
        'frecuencia_respiratoria',
    ];

}
