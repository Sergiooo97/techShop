<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\marcas;

class marcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $productos = new productos();
        $marca = new marcas();
        $marca->id ='1';
        $marca->nombre_marca = 'SAMSUNG';
        $marca->save();
        $marca = new marcas();
        $marca->id ='2';
        $marca->nombre_marca = 'APPLE';
        $marca->save();
        $marca = new marcas();
        $marca->id ='3';
        $marca->nombre_marca = 'HUAWEI';
        $marca->save();
        $marca = new marcas();
        $marca->id ='4';
        $marca->nombre_marca = 'LG';
        $marca->save();
        $marca = new marcas();
        $marca->id ='5';
        $marca->nombre_marca = 'HP';
        $marca->save();
        $marca = new marcas();
        $marca->id ='6';
        $marca->nombre_marca = 'LENOVO';
        $marca->save();
    }
}
