<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function crearDocentePrueba()
    {
        return view('docente.CrearDocentePruebaView');
    }

    //buscar docente 

    public function buscarDocente(Request $request){
        $nombre = $request->name;
        $docente = Docente::where('name', 'like', '%' . $nombre . '%')->get();
        return view('docente.DocenteView', compact('docente'));
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
            'cargo' => 'required',
            'image' => 'nullable|image|mimes:jpg|max:2048'
        ]);

        $docente = Docente::create($request->except(['image']));
        $cuentaDocente=  $docente->cuenta()->create([
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'rol'=> $request->cargo,
        ]);

        //crear y guardar imagen
        if ($request->hasFile('image')) {
            $foto = $request->file('image');
            $name = time() . '.' . $foto->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $foto->move($destinationPath, $name);
            
            //  guardar la URL de la foto en el modelo
            $nombreImg = "/images/" . $name;
            //crea su imagen
            $docente->fotos()->create([
                'url'=> $nombreImg
            ]);
        }
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
            'cargo' => 'required',
            'image' => 'nullable|image|mimes:jpg|max:2048'

        ]);

        if ($request->hasFile('image')) {
            // Eliminar la foto anterior si existe
            if ($docente->fotos) {
                $oldImagePath = public_path($docente->fotos->url);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $docente->fotos()->delete();
            }
    
            // Guardar la nueva foto
            $foto = $request->file('image');
            $name = time() . '.' . $foto->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $foto->move($destinationPath, $name);
            
            $nombreImg = "/images/" . $name;
    
            // Crear la nueva entrada de foto
            $docente->fotos()->create([
                'url' => $nombreImg,
            ]);
        }

        $docente->update($request->except(['image']));

        return redirect()->route('docentes');
    }

    //eliminar docente
    public function deleteDocente(Docente $docente){
        $docente->delete();
        return redirect()->route('docentes');
    }
}
