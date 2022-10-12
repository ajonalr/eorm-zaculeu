<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Grado;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{


    public function index()
    {
        $data = Estudiante::all();
        return view('escuela.estudiante.index', compact('data'));
    }

    public function inscribir()
    {
        return view('escuela.estudiante.inscribir', ['grados' => Grado::all()]);
    }

    public function store(Request $request)
    {
        Estudiante::create($request->all());
        return back()->with(['info' => 'estudiante guardado']);
    }
    public function update(Request $request, $id)
    {
        Estudiante::find($id)->update($request->all());
        return back()->with(['info' => 'estudiante guardado']);
    }
    public function show($id)
    {
        $g = Estudiante::find($id);
        return view('admin.estudiante.show', compact('g'));
    }
    public function delete($id)
    {
        $g = Estudiante::find($id)->delete();
        return back()->with(['info' => 'estudiante eliminado']);
    }
}
