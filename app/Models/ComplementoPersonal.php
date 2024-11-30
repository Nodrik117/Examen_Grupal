<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplementoPersonal extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = '_complementos_personales';

    // Campos rellenables
    protected $fillable = [
        'labios',
        'mejillas',
        'maxilar_superior',
        'maxilar_inferior',
        'lengua',
        'paladar_duro',
        'paladar_blando',
        'piso_boca',
        'amigdalas',
        'frenillo_labial',
        'frenillo_lingual',
        'lesiones_orales',
        'descripcion_lesiones_orales',
        'higiene_oral',
        'observaciones_generales',
        'estado_general',
    ];
}
