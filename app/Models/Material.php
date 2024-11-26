<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'tipo_tela',
        'descripcion',
        'cantidad',
        'cantidad_disponible',
        'color',
        'costo_unitario',
        'id_materia_prima',
        'nombre_materia_prima',
        'proveedor',
        'medida',
    ];
}
