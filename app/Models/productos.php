<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_producto',
        'precio_antes',
        'precio_despues',
        'marca_id',
        'descripcion_producto',
        'off_producto',
        'categoria_producto',
        'producto_id',
        'img_url',


    ];

    public static function setCaratula($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/caratulas/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("img_product/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}
