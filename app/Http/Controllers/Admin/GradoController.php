<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\MateriaGrado;
use App\Models\ProfesoGrado;
use Illuminate\Http\Request;

class GradoController extends Controller
{

    public function index()
    {
        $grado = Grado::all();
        return view('escuela.grado.index', compact('grado'));
    }

    public function create()
    {
        return view('escuela.grado.create');
    }

    public function store(Request $request)
    {
        Grado::create($request->all());
        return back()->with(['info' => 'grado guardado']);
    }

    public function edit($id)
    {
        $g = Grado::find($id);
        return view('escuela.grado.update', compact('g'));
    }

    public function update(Request $request, $id)
    {
        Grado::find($id)->update($request->all());
        return back()->with(['info' => 'grado guardado']);
    }

    public function show($id)
    {
        $g = Grado::find($id);
        $gp = ProfesoGrado::where('grado_id', $id)->get();
        $materias = MateriaGrado::where('grado_id', $id)->get();

        return view('escuela.grado.show', compact('g', 'gp', 'materias'));
    }

    public function delete($id)
    {
        $g = Grado::find($id)->delete();
        return back()->with(['info' => 'grado eliminado']);
    }

    public function reporte()
    {
        $data = Grado::all();
        return view('escuela.grado.reporte', compact('data'));
    }
}
