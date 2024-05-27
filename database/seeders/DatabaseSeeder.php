<?php

namespace Database\Seeders;

use App\Models\Campo;
use App\Models\Clases;
use App\Models\Docente;
use App\Models\Material;
use App\Models\sede;
use App\Models\User;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        
        Usuario::factory(20)->create();
        Docente::factory(20)->create();
        Campo::factory(20)->create();
        Material::factory(20)->create();
        sede::factory(20)->create();
        Clases::factory(20)->create();
        Usuario::factory()->create(
            [
                'name'=>"jair",
                'dni'=>"12345678",
                'email'=>'jairchavez0404@gmail.com',
                'edad'=>'26',
                'telefono'=>'123456789',
                'password'=>'12345',
                'direccion'=>'calle de prueba',
            ]
            );
    }
}
