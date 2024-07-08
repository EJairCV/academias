<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index(){
        $equipos = Equipo::orderBy('id', 'desc')->paginate();
        return view('equipos.EquiposView', compact('equipos'));
    }

    //buscar equipo

    public function buscarequipo(Request $request){
        $nombre = $request->name;
        $equipos = Equipo::where('name', 'like', '%' . $nombre . '%')->get();
        return view('equipos.EquiposView', compact('equipos'));
    }


    //crear equipo

    public function create(){
        return view('equipos.CrearEquipoView');
    }

    public function store(Request $request){
        $request->validate([           
            
        ]);

        $evento= Equipo::create($request->all());
        return redirect()->route('evento.index');
    }
    //modifiequipo
    public function edit(Equipo $equipo){
        // $alumnos = Usuario::orderBy('id', 'desc')->paginate();
        $alumnos = Usuario::whereDoesntHave('equipos', function($query) use ($equipo) {
            $query->where('equipo_id', $equipo->id);
        })->get();


        $usuariosEquipo = $equipo->alumnos()->get();
         
         
         return view('equipos.ModificarEquipoView', compact('equipo', 'alumnos', 'usuariosEquipo'));
    }

    public function update(Equipo $equipo, Request $request){
        $request->validate([           
            
        ]);

        $equipo->update($request->all());
        return redirect()->route('equipo.edit', compact('equipo'));
    }
    //borrar equipo
    public function destroy(Equipo $equipo){
        $equipo->delete();
        return redirect()->route('equipo.index');
    }
 
    public function asignarequipo( Equipo $equipo,Usuario $usuario){
        $usuario->equipos()->attach($equipo->id);
        return redirect()->route('equipo.edit',compact('equipo'));
    }
    public function eliminardelequipo( Equipo $equipo,Usuario $usuario){
        $equipo->alumnos()->detach($usuario->id);
        
        return redirect()->route('equipo.edit',compact('equipo'));
    }

    
}
