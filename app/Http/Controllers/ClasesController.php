<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Models\Clases;
use App\Models\Docente;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    public function index(){
        $clases = Clases::orderBy('id', 'desc')->paginate();
         return view('clases.ClasesView', compact('clases'));    
    }
    public function create(){
        $docentes = Docente::all();
        $campos = Campo::all();
        return view('clases.CrearClaseView', compact('docentes','campos'));
    }
    public function store(Request $request){
        $request->validate([]);


        $clase = Clases::create($request->all());
        return redirect()->route('clase.index');
    }
    public function edit(Clases $clase){

        $docentes = Docente::all();
        $campos = Campo::all();
        return view('clases.ModificarClaseView', compact('clase','docentes','campos'));
    }
    public function update(Clases $clase, Request $request){
        $request->validate([]);
        $clase->update($request->all());
        return redirect()->route('clase.index');
    }

    public function destroy(Clases $clase){
        $clase->delete();
        return redirect()->route('clase.index');
    }  
}
