<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_producto',
        'precio_producto',
        'categoria_producto',
        'usuario_id',
        
        
    ];
}
