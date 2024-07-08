<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'direccion' => 'required',
            'image' => 'nullable|image|mimes:jpg|max:2048'

        ]);

        

        $alumno = Usuario::create($request->except(['image']));
        //crea la cuenta
        $cuentaAlumno=  $alumno->cuenta()->create([
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'rol'=> 'Alumno'
        ]);
        
        
        
        if ($request->hasFile('image')) {
            $foto = $request->file('image');
            $name = time() . '.' . $foto->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $foto->move($destinationPath, $name);
            
            //  guardar la URL de la foto en el modelo
            $nombreImg = "/images/" . $name;
            //crea su imagen
            $alumno->fotos()->create([
                'url'=> $nombreImg
            ]);
        }
        return redirect()->route('usuarios');
    }

    public function buscarAlumno(Request $request){
        $nombre = $request->name;
        $usuarios = Usuario::where('name', 'like', '%' . $nombre . '%')->get();
        return view('usuarios.UsuariosView', compact('usuarios'));
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
            'direccion' => 'required',
            'image' => 'nullable|image|mimes:jpg|max:2048'
        ]);
        
        // Procesar la foto si existe en la solicitud
        
        if ($request->hasFile('image')) {
            // Eliminar la foto anterior si existe
            if ($alumno->fotos) {
                $oldImagePath = public_path($alumno->fotos->url);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $alumno->fotos()->delete();
            }
    
            // Guardar la nueva foto
            $foto = $request->file('image');
            $name = time() . '.' . $foto->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $foto->move($destinationPath, $name);
            
            $nombreImg = "/images/" . $name;
    
            // Crear la nueva entrada de foto
            $alumno->fotos()->create([
                'url' => $nombreImg,
            ]);
        }


        $alumno->update($request->except(['image']));

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

//datos personales de solo el alumno logeado
public function VistaAlumno(){

    $usuario = Auth::user();
    $datosUsuarios = Usuario::find($usuario->cuentable_id);
    $equipos = $datosUsuarios->equipos;
    $eventos = collect();
    foreach ($equipos as $equipo) {
        $eventos = $eventos->merge($equipo->evento);
    }
    $eventos = $eventos->unique('id');
      
    if($datosUsuarios->fotos==null){
        $foto='/images/img_2.jpg';
    }else{
        $foto=$datosUsuarios->fotos->url;
    };
    
    return view('usuarios.UsuarioInicio', compact('datosUsuarios','equipos','eventos', 'foto'));
}
}

