<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Evento;
use App\Models\sede;
use Illuminate\Http\Request;

class General extends Controller
{
    public function inicio(){
        return view ('general.index');
    }
    public function partidos(){
        $ultimoEvento = Evento::orderBy('fecha', 'desc')->first();
        $ultimosEventos = Evento::orderBy('fecha', 'desc')
                        ->take(4)
                        ->get();
        $sedes = sede::orderBy('id','desc')->take(4)->get();
        return view ('general.matches', compact('ultimoEvento','ultimosEventos','sedes'));
    }
    public function jugadores(){
        $equipo = Equipo::orderBy('id','desc')->first();
        $jugadores = $equipo->alumnos()->get(); 
        return view ('general.players', compact('equipo', 'jugadores'));
    }
}
