<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    //vistas
    //vista del login
    public function login()
    {
        return view('login.LoginView');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'min:7'],
            'password' => 'required'
        ]);
        $usuario = Usuario::where('email', $request->email)
            ->where('password', $request->password)
            ->get();

        if (count($usuario) == 1) {
            return redirect()->route('usuarios');
        } else {
            return redirect()->route('login');
        }
    }


    //todos los alumnos
    public function __invoke()
    {
        $usuarios = Usuario::orderBy('id', 'desc')->paginate();
        return view('usuarios.UsuariosView', compact('usuarios'));
    }
 

    //crear alumno
    public function crearAlumno()
    {
        return view("alumnos.CrearAlumnoView");
    }
    public function postCrearAlumno(Request $request)
    {
        
        $request->validate([
            'email' => ['required'],
            'password' => 'required',
            'name' => 'required',
            'edad' => ['required', 'numeric'],
            'dni' => ['required', 'numeric', 'digits:8'],
            'telefono' => ['required', 'numeric', 'digits:9'],
            'direccion' => 'required'

        ]);

        // $alumno = new Usuario();
        // $alumno->name = $request->name;
        // $alumno->dni = $request->dni;
        // $alumno->email = $request->email;
        // $alumno->telefono = $request->telefono;
        // $alumno->password = $request->password;
        // $alumno->edad = $request->edad;
        // $alumno->direccion = $request->direccion;

        // $alumno->save();

        $alumno = Usuario::create($request->all());

        return redirect()->route('usuarios');
    }



    //modificar alumno
    public function modificarAlumno(Usuario $alumno)
    {
        
        return view("alumnos.ModificarAlumnoView", compact("alumno"));
    }

    public function putModificarAlumno(Usuario $alumno, Request $request)
    {   
        $request->validate([
            'email' => ['required'],
            'password' => 'required',
            'name' => 'required',
            'edad' => ['required', 'numeric'],
            'dni' => ['required', 'numeric', 'digits:8'],
            'telefono' => ['required', 'numeric', 'digits:9'],
            'direccion' => 'required'

        ]);

        // $alumno->name = $request->name;
        // $alumno->dni = $request->dni;
        // $alumno->email = $request->email;
        // $alumno->telefono = $request->telefono;
        // $alumno->password = $request->password;
        // $alumno->edad = $request->edad;
        // $alumno->direccion = $request->direccion;

        // $alumno->save();

        $alumno->update($request->all());

        return redirect()->route('usuarios');
    }

    //eliminar alumno

    public function deleteAlumno(Usuario $alumno){
        $alumno->delete();
        return redirect()->route('usuarios');
    }

    public function updateNotas(Request $request, $id)
{
    $request->validate([
        'velocidad' => 'required|numeric',
        'fuerza' => 'required|numeric',
        'resistencia' => 'required|numeric',
    ]);

    $alumno = Usuario::findOrFail($id);
    $alumno->velocidad = $request->velocidad;
    $alumno->fuerza = $request->fuerza;
    $alumno->resistencia = $request->resistencia;
    $alumno->save();

    return redirect()->route('usuarios')->with('success', 'Notas actualizadas correctamente');
}



    

}
