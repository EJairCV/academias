<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
        
class MaterialController extends Controller
{   
    //lista de materiales
    public function index(){
        $material = Material::orderBy('id', 'desc')->paginate();
        return view('materiales.MaterialesView', compact('material'));
    }

    //buscar materiales

    public function buscarMaterial(Request $request){
        $nombre = $request->name;
        $material = Material::where('name', 'like', '%' . $nombre . '%')->get();
        return view('materiales.MaterialesView', compact('material'));
    }


    //crear materiales

    public function create(){
        return view('materiales.CrearMaterialesView');
    }

    public function store(Request $request){
        $request->validate([           
            'name' => 'required',
            'cantidad' => ['required', 'numeric'],
        ]);

        $material= Material::create($request->all());
        return redirect()->route('material.index');
    }
    //modificar material
    public function edit(Material $material){
        return view('materiales.ModificarMaterialesView', compact('material'));
    }
    public function update(Material $material, Request $request){
        $request->validate([           
            'name' => 'required',
            'cantidad' => ['required', 'numeric'],
        ]);

        $material->update($request->all());
        return redirect()->route('material.index');
    }
    //borrar material
    public function destroy(Material $material){
        $material->delete();
        return redirect()->route('material.index');
    }
}
