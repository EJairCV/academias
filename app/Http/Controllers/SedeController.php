<?php

namespace App\Http\Controllers;

use App\Models\sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    //vista general
    public function __invoke(){
        $sedes = sede::orderBy('id', 'desc')->paginate();
        return view('sede.SedesView',compact('sedes'));
    }
    //buscar
    public function buscarSede(Request $request){
        $nombre = $request->name;
        $sedes = sede::where('name', 'like', '%' . $nombre . '%')->get();
        return view('sede.SedesView',compact('sedes'));
    }
    //crear sedes
    public function crearSede(){
        return view('sede.CrearSedeView');
    }

    

    public function postCrearSede(Request $request){
        $request->validate([           
            'name' => 'required',
            'telefono' => ['required', 'numeric'],
            'direccion' => 'required'
        ]);

        $sede = sede::create($request->all());
        return redirect()->route('sedes');
    }

    //Modificar sedes
    public function modificarSede(sede $sede){
        return view('sede.ModificarSedeView', compact('sede'));
    }
    public function putModificarSede(sede $sede, Request $request){
        $request->validate([           
            'name' => 'required',
            'telefono' => ['required', 'numeric'],
            'direccion' => 'required'
        ]);

        $sede->update($request->all());
        return redirect()->route('sedes');
    }

    //eliminarSedes
    public function deleteSede(sede $sede){
        $sede->delete();
        return redirect()->route('sedes');
    }

}
