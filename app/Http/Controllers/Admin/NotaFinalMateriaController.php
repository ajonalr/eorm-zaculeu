<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\NotaEstudiente;
use App\Models\NotaFinalMateria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaFinalMateriaController extends Controller
{


    public function store(Request $request)
    {
        $tarea = NotaFinalMateria::create($request->all());

        // TODO: ASIGNAR TAREAS A ESTUDIENTES
        $estudiante = Estudiante::where('grado_id', $request->grado_id)->get();

        foreach ($estudiante as $es) {
            NotaEstudiente::create([
                'estudiante_id' => $es->id,
                'nota_final_id' => $tarea->id,
                'calificacion' => 0
            ]);
        }


        return back()->with(['info' => 'datos guardados']);
    }


    // GUARDA LA NUEVA NOTA FINAL / TAREA Y SE LA ASIGNA A UN ESTUDIANTE
    public function sttoreAndAssignEstudiente(Request $request)
    {
        $tarea = NotaFinalMateria::create([
            'grado_id' => $request->grado_id,
            'materia_id' => $request->materia_id,
            'nombre' => $request->nombre,
            'valor' => $request->valor,
            'bloque' => $request->bloque
        ]);
        $estudiante = Estudiante::where('grado_id', $request->grado_id)->get();
        foreach ($estudiante as $es) {
            NotaEstudiente::create([
                'estudiante_id' => $es->id,
                'nota_final_id' => $tarea->id,
                'calificacion' => 0
            ]);
        }
        return back()->with(['info' => 'datos guardados']);
    }

    // busca la tarea por grado y materia
    public function findNotaFintalToGradoAndMateria($grado_id, $materia_id, Request $request)
    {

        $vis = false;
        $vis2 = false;
        $calificar = null;
        $tareas = null;
        if ($request->bimestre) {
            $vis2 = true;
            $tareas = DB::table('nota_final_tarea')
                ->where(
                    [
                        'grado_id' => $grado_id,
                        'materia_id' => $materia_id,
                        'bloque' => $request->bimestre,
                        ['valor', '>', 0]
                    ]
                )->get();
            // dd($tareas);
        }

        if ($request->nota_final_id) {
            $vis = true;
            $vis2 = false;
            $calificar = NotaEstudiente::where('nota_final_id', $request->nota_final_id)->get();
        }
        // dd($tareas);
        return view('profesor.calificar', compact('tareas', 'vis', 'calificar', 'vis2'));
    }
}
