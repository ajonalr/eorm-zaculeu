<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\Profeso;
use App\Models\ProfesoGrado;
use Illuminate\Http\Request;

class PofesorController extends Controller
{
    public function index()
    {
        $data = Profeso::all();
        return view('escuela.profesor.index', compact('data'));
    }

    public function create()
    {
        return view('escuela.profesor.create');
    }

    public function store(Request $request)
    {
        Profeso::create($request->all());
        return back()->with(['info' => 'profesor guardado']);
    }
    public function update(Request $request, $id)
    {
        Profeso::find($id)->update($request->all());
        return back()->with(['info' => 'profesor guardado']);
    }
    public function show($id)
    {
        $g = Profeso::find($id);

        $grados = ProfesoGrado::where('profesor_id', $id)->get();
        return view('escuela.profesor.show', compact('g', 'grados'));
    }
    public function delete($id)
    {
        $g = Profeso::find($id)->delete();
        return back()->with(['info' => 'profesor eliminado']);
    }


    // retorna la vista para asignar un profesro a un grado
    public function grado_profesor_view()
    {
        $grado = Grado::all();
        $profesor = Profeso::all();

        return view('escuela.profesor.asignar_grado', compact('profesor', 'grado'));
    }

    // relaciona el grado con el profesor
    public function grado_profesor(Request $request)
    {
        ProfesoGrado::create($request->all());
        return back()->with(['info' => 'profesor guardado al grado']);
    }
}
