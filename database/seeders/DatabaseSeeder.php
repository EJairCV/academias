<?php

namespace Database\Seeders;

use App\Models\Campo;
use App\Models\Clases;
use App\Models\Cuenta;
use App\Models\Docente;
use App\Models\Equipo;
use App\Models\Evento;
use App\Models\Material;
use App\Models\sede;
use App\Models\TipoEvento;
use App\Models\User;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        TipoEvento::factory()->create([
            'name'=>'Partido amistoso'
        ]);
        TipoEvento::factory()->create([
            'name'=>'Campeonato'
        ]);

        Usuario::factory(20)->create();
        Docente::factory(20)->create();
        Campo::factory(20)->create();
        Material::factory(20)->create();
        sede::factory(20)->create();
        Clases::factory(20)->create();
        Evento::factory(20)->create();
        Equipo::factory(20)->create();
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
        Cuenta::factory()->create(
            [
                'email'=>'correoadmin@gmail.com',
                'password'=>Hash::make('12345'),
                'rol'=>'Administrador',
                'cuentable_id'=>'20',
                'cuentable_type'=>'App\Models\Docente'
            ]
        );
        Cuenta::factory()->create(
            [
                'email'=>'correodocente@gmail.com',
                'password'=>Hash::make('12345'),
                'rol'=>'Docente',
                'cuentable_id'=>'19',
                'cuentable_type'=>'App\Models\Docente'
            ]
        );
        Cuenta::factory()->create(
            [
                'email'=>'correoalumno@gmail.com',
                'password'=>Hash::make('12345'),
                'rol'=>'Alumno',
                'cuentable_id'=>'21',
                'cuentable_type'=>'App\Models\Usuario'
            ]
        );
    }
}

