<?php

namespace Database\Seeders;
use App\Models\productos;

use Illuminate\Database\Seeder;

class productosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = new productos();
        $productos->id ='1';
        $productos->nombre_producto = 'Laptop Lenovo Legion Y Y540';
        $productos->precio_actual = '39400';
        $productos->precio_antes = '41000';
        $productos->descripcion_producto = 'Negra cuervo 15.6", Intel Core i5 9300H 8GB de RAM 1TB HDD 128GB SSD, Nvidia GeForce GTX';
        $productos->categoria_producto = 'com';
        $productos->img_url = 'public/len1.jpg';
        $productos->off_producto = '5';
        $productos->marca_id = '6';
        $productos->save();
        $productos = new productos();
        $productos->id ='2';
        $productos->nombre_producto = 'Laptop Huawei MateBook X Pro ';
        $productos->precio_actual = '49000';
        $productos->precio_antes = '34999';
        $productos->descripcion_producto = 'Core i7 10510U 16GB de RAM 1 TB SSD, NVIDIA GeForce MX250 60 Hz 3000x2000px Windows 10 Home';
        $productos->categoria_producto = 'com';
        $productos->img_url = 'public/hua1.png';
        $productos->off_producto = '30';
        $productos->marca_id = '3';
        $productos->save();
        $productos = new productos();
        $productos->id ='3';
        $productos->nombre_producto = 'Apple Macbook Air';
        $productos->precio_actual = '49000';
        $productos->precio_antes = '34999';
        $productos->descripcion_producto = 'Intel Iris Plus Core I5 8 Gb Ram 512 Ssd';
        $productos->categoria_producto = 'com';
        $productos->img_url = 'public/mac1.jpeg';
        $productos->off_producto = '30';
        $productos->marca_id = '3';
        $productos->save();

        //celulares

        $productos = new productos();
        $productos->id ='4';
        $productos->nombre_producto = 'Huawei P40 ';
        $productos->precio_actual = '12999';
        $productos->precio_antes = '17989';
        $productos->descripcion_producto = 'Dual SIM 128 GB silver frost 8 GB RAM';
        $productos->categoria_producto = 'cel';
        $productos->img_url = 'public/hua2.png';
        $productos->off_producto = '27';
        $productos->marca_id = '5';
        $productos->save();
        $productos = new productos();
        $productos->id ='5';
        $productos->nombre_producto = 'Moto G9 Plus';
        $productos->precio_actual = '49000';
        $productos->precio_antes = '34999';
        $productos->descripcion_producto = '128 GB rosa champagne 4 GB RAM';
        $productos->categoria_producto = 'cel';
        $productos->img_url = 'public/moto1.jpeg';
        $productos->off_producto = '30';
        $productos->marca_id = '6';
        $productos->save();
        $productos = new productos();
        $productos->id ='6';
        $productos->nombre_producto = 'iPhone XR';
        $productos->precio_actual = '7999';
        $productos->precio_antes = '8178';
        $productos->descripcion_producto = 'GB (product)red';
        $productos->categoria_producto = 'cel';
        $productos->img_url = 'public/i1.jpeg';
        $productos->off_producto = '12';
        $productos->marca_id = '2';
        $productos->save();


    }
}
