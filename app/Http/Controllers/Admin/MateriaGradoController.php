<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\MateriaGrado;
use App\Models\NotaFinalMateria;
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
        $materia = MateriaGrado::create($request->all());


        $nota = new NotaFinalMateria();
        $nota->grado_id = $materia->grado_id;
        $nota->materia_id = $materia->id;
        $nota->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota->valor = 100;
        $nota->bloque = 1;
        $nota->estado = 'activo';
        $nota->save();


        $nota = new NotaFinalMateria();
        $nota->grado_id = $materia->grado_id;
        $nota->materia_id = $materia->id;
        $nota->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota->valor = 100;
        $nota->bloque = 2;
        $nota->estado = 'activo';
        $nota->save();


        $nota = new NotaFinalMateria();
        $nota->grado_id = $materia->grado_id;
        $nota->materia_id = $materia->id;
        $nota->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota->valor = 100;
        $nota->bloque = 3;
        $nota->estado = 'activo';
        $nota->save();


        $nota = new NotaFinalMateria();
        $nota->grado_id = $materia->grado_id;
        $nota->materia_id = $materia->id;
        $nota->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota->valor = 100;
        $nota->bloque = 4;
        $nota->estado = 'activo';
        $nota->save();


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
        $notas = NotaFinalMateria::where('materia_id', $id)->get();
        return view('escuela.materia.show', compact('data', 'grado', 'notas'));
    }
    public function delete($id)
    {
        $g = MateriaGrado::find($id)->delete();
        return back()->with(['info' => 'materia eliminado']);
    }
}
