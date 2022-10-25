<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\MateriaGrado;
use App\Models\NotaEstudiente;
use App\Models\NotaFinalMateria;
use App\Models\Profeso;
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
        $profesores = Profeso::all();
        return view('escuela.materia.create', compact('grado', 'profesores'));
    }
    public function store(Request $request)
    {
        $materia = MateriaGrado::create($request->all());


        $nota1 = new NotaFinalMateria();
        $nota1->grado_id = $materia->grado_id;
        $nota1->materia_id = $materia->id;
        $nota1->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota1->valor = 0;
        $nota1->bloque = 1;
        $nota1->estado = 'activo';
        $nota1->save();


        $nota2 = new NotaFinalMateria();
        $nota2->grado_id = $materia->grado_id;
        $nota2->materia_id = $materia->id;
        $nota2->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota2->valor = 0;
        $nota2->bloque = 2;
        $nota2->estado = 'activo';
        $nota2->save();


        $nota3 = new NotaFinalMateria();
        $nota3->grado_id = $materia->grado_id;
        $nota3->materia_id = $materia->id;
        $nota3->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota3->valor = 0;
        $nota3->bloque = 3;
        $nota3->estado = 'activo';
        $nota3->save();


        $nota4 = new NotaFinalMateria();
        $nota4->grado_id = $materia->grado_id;
        $nota4->materia_id = $materia->id;
        $nota4->nombre = 'NOTA FINAL DE BIMESTRE';
        $nota4->valor = 0;
        $nota4->bloque = 4;
        $nota4->estado = 'activo';
        $nota4->save();
        $estudiante = Estudiante::where('grado_id', $request->grado_id)->get();

        foreach ($estudiante as $es) {
            NotaEstudiente::create([
                'estudiante_id' => $es->id,
                'nota_final_id' => $nota1->id,
                'calificacion' => 0
            ]);
        }

        foreach ($estudiante as $es) {
            NotaEstudiente::create([
                'estudiante_id' => $es->id,
                'nota_final_id' => $nota2->id,
                'calificacion' => 0
            ]);
        }

        foreach ($estudiante as $es) {
            NotaEstudiente::create([
                'estudiante_id' => $es->id,
                'nota_final_id' => $nota3->id,
                'calificacion' => 0
            ]);
        }

        foreach ($estudiante as $es) {
            NotaEstudiente::create([
                'estudiante_id' => $es->id,
                'nota_final_id' => $nota4->id,
                'calificacion' => 0
            ]);
        }



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
