<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::orderBy('id', 'desc')->paginate();
        return view('eventos.EventoView', compact('eventos'));
    }

    //buscar materiales

    public function buscarEvento(Request $request){
        $nombre = $request->name;
        $eventos = Evento::where('name', 'like', '%' . $nombre . '%')->get();
        return view('eventos.EventoView', compact('eventos'));
    }


    //crear materiales

    public function create(){
        $tipos= TipoEvento::all();
        return view('eventos.CrearEventoView', compact('tipos'));
    }

    public function store(Request $request){
        $request->validate([           
            
        ]);

        $evento= Evento::create($request->all());
        return redirect()->route('evento.index');
    }
    //modificar material
    public function edit(Evento $evento){
        $tipos= TipoEvento::all();
        $equipos = Equipo::whereDoesntHave('evento', function($query) use ($evento) {
            $query->where('evento_id', $evento->id);
        })->get(); ;

        $equiposAsignados = $evento->equipos()->get();

        return view('eventos.ModificarEventoView', compact('evento','equipos','equiposAsignados','tipos'));


    }
    public function update(Evento $evento, Request $request){
        $request->validate([           
            
        ]);

        $evento->update($request->all());
        return redirect()->route('evento.edit', compact('evento'));
    }
    //borrar material
    public function destroy(Evento $evento){
        $evento->delete();
        return redirect()->route('evento.index');
    }

    public function asignarevento(Evento $evento, Equipo $equipo){
        $equipo->evento()->attach($evento->id);
        return redirect()->route('evento.edit', compact('evento'));
    }

    public function eliminardelevento(Evento $evento, Equipo $equipo){
        $evento->equipos()->detach($equipo->id);
        return redirect()->route('evento.edit', compact('evento'));
    }

}
