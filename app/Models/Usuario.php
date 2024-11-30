<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'cedula';
    public $incrementing = false; // clave primaria no incremental

    protected $fillable = [
        'cedula',
        'genero',
        'apellido',
        'email',
        'password',
        'telefono',
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
