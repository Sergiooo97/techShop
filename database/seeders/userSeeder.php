<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id ='1';
        $user->nombre = 'Rafael Eb Gallegos';
        $user->telefono = '9911074558';
        $user->email = 'sergio@admin.com';
        $user->password = Hash::make('12345678');;
        $user->rol_id = '1';
        $user->save();
    }
}
