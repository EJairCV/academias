<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use Illuminate\Http\Request;

class CampoController extends Controller
{
    public function index(){
        $campos = Campo::orderBy('id', 'desc')->paginate();
        return view('campo.CamposView', compact('campos'));
    }
    public function create(){
        return view('campo.CrearCampoView');

    }
 
    public function store(Request $request){
        $request->validate([]);


        $clase = Campo::create($request->all());
        return redirect()->route('campo.index');
    }

    
    
    public function edit(Campo $campo){
        return view('campo.ModificarCampoView', compact('campo'));
    }
    public function update(Campo $campo, Request $request){
        $request->validate([]);
        $campo->update($request->all());
        return redirect()->route('campo.index');
    }

    public function destroy(Campo $campo){
        $campo->delete();
        return redirect()->route('campo.index');

    }
}
