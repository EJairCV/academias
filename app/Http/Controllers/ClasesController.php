<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Models\Clases;
use App\Models\Docente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    public function index(){
        $clases = Clases::orderBy('id', 'desc')->paginate();
         return view('clases.ClasesView', compact('clases'));    
    }

    public function buscarCLase(Request $request){
        $nombre = $request->name;
        $clases = Clases::where('name', 'like', '%' . $nombre . '%')->get();
        return view('clases.ClasesView', compact('clases'));
         
    }
    public function create(){
        $docentes = Docente::all();
        $campos = Campo::all();
        return view('clases.CrearClaseView', compact('docentes','campos'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            
            
        ]);


        $clase = Clases::create($request->all());
        return redirect()->route('clase.index');
    }
    public function edit(Clases $clase){

        $alumnos = Usuario::whereDoesntHave('clases', function($query) use ($clase) {
            $query->where('clases_id', $clase->id);
        })->get();

        $docentes = Docente::all();
        $campos = Campo::all();



        $usuariosClase = $clase->alumnos()->get();
        
        return view('clases.ModificarClaseView', compact('clase','docentes','campos','alumnos','usuariosClase'));
    }
    public function update(Clases $clase, Request $request){
        $request->validate([
            'name' => 'required',
            
            
        ]);
        $clase->update($request->all());
        return redirect()->route('clase.index');
    }

    public function destroy(Clases $clase){
        $clase->delete();
        return redirect()->route('clase.index');
    }
    public function asignarclase( Clases $clase,Usuario $usuario){
        $usuario->clases()->attach($clase->id);
        return redirect()->route('clase.edit',compact('clase'));
    }
    public function eliminardeclase( Clases $clase,Usuario $usuario){
        $clase->alumnos()->detach($usuario->id);
        
        return redirect()->route('clase.edit',compact('clase'));
    }

}
