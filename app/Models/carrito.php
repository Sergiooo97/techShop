<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_producto',
        'precio_producto',
        'off_producto',
        'img_url',
        'user_id',
        'producto_id',

    ];
}
