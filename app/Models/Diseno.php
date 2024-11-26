<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    use HasFactory;

    // Define which fields are mass assignable
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'fecha_creacion', 
        'autor', 
        'estado', 
        'talla', 
        'genero'
    ];

    // You can also specify hidden fields if needed
    protected $hidden = [
        'created_at', 
        'updated_at'
    ];
    
    // Optionally, you can define accessors and mutators for any custom behavior
    // Example: Accessor for 'fecha_creacion' to format the date
    public function getFechaCreacionAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    // Example: Mutator to ensure the 'estado' is always in uppercase
    public function setEstadoAttribute($value)
    {
        $this->attributes['estado'] = strtoupper($value);
    }
}
