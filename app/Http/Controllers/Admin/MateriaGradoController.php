<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\MateriaGrado;
use Illuminate\Http\Request;

class MateriaGradoController extends Controller
{


    public function index()
    {
        $data = MateriaGrado::all();
        return view('escuela.materia.index', compact('data'));
    }
    public function create()
    {
        $grado = Grado::all();
        return view('escuela.materia.create', compact('grado'));
    }
    public function store(Request $request)
    {
        MateriaGrado::create($request->all());
        return back()->with(['info' => 'materia guardado']);
    }
    public function update(Request $request, $id)
    {
        MateriaGrado::find($id)->update($request->all());
        return back()->with(['info' => 'materia guardado']);
    }
    public function show($id)
    {
        $data = MateriaGrado::find($id);
        $grado = Grado::all();
        return view('escuela.materia.show', compact('data', 'grado'));
    }
    public function delete($id)
    {
        $g = MateriaGrado::find($id)->delete();
        return back()->with(['info' => 'materia eliminado']);
    }
}
