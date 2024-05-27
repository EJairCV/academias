<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    //listar docentes
    public function __invoke()
    {
        $docente = Docente::orderBy('id', 'desc')->paginate();
        return view('docente.DocenteView', compact('docente'));
    }
    //crear docentes
    public function crearDocente()
    {
        return view('docente.CrearDocenteView');
    }
    public function postCrearDocente(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => 'required',
            'name' => 'required',
            'dni' => ['required', 'numeric', 'digits:8'],
            'telefono' => ['required', 'numeric', 'digits:9'],
            'direccion' => 'required',
            'sueldo' => 'required',
            'cargo' => 'required'

        ]);

        $docente = Docente::create($request->all());

        return redirect()->route('docentes');
    }

    //modificar docente
    public function modificarDocente(Docente $docente)
    {

        return view('docente.ModificarDocenteView', compact('docente'));
    }
    public function putModificarDocente(Docente $docente, Request $request)
    {

        $request->validate([
            'email' => ['required'],
            'password' => 'required',
            'name' => 'required',
            'dni' => ['required', 'numeric', 'digits:8'],
            'telefono' => ['required', 'numeric', 'digits:9'],
            'direccion' => 'required',
            'sueldo' => 'required',
            'cargo' => 'required'

        ]);

        $docente->update($request->all());

        return redirect()->route('docentes');
    }

    //eliminar docente
    public function deleteDocente(Docente $docente){
        $docente->delete();
        return redirect()->route('docentes');
    }
}
