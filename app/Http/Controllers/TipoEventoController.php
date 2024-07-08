<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    //lista de materiales
    public function index(){
        $teventos = TipoEvento::orderBy('id', 'desc')->paginate();
        return view('equipos.TiposView', compact('teventos'));
    }
 

    //crear materiales

    public function create(){
        
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            
            
        ]);

        $material= TipoEvento::create($request->all());
        return redirect()->route('tevento.index');
    }


    //modificar material
    public function edit(TipoEvento $tevento){
        
    }
    public function update(TipoEvento $tevento, Request $request){
        $request->validate([
            'name' => 'required',
            
            
        ]);

        $tevento->update($request->all());
        return redirect()->route('tevento.index');
    }
    
    //borrar material
    public function destroy(TipoEvento $tevento){
        $tevento->delete();
        return redirect()->route('tevento.index');
    }
}
