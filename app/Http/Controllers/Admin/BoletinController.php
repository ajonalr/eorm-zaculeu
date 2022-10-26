<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\MateriaGrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoletinController extends Controller
{

    public function boletines()
    {
        $data = Estudiante::all();
        return view('escuela.estudiante.boletines', compact('data'));
    }


    // retorna el boletin del estudiante
    public function boletin($id)
    {

        $estudiante =  Estudiante::find($id);
        $grado = Grado::find($estudiante->grado_id);
        $cursos = MateriaGrado::where('grado_id', $estudiante->grado_id)->get();
        // recorer curso para buscar tarea


        $bimestre1 = array();
        $bimestre2 = array();
        $bimestre3 = array();
        $bimestre4 = array();


        $cusos_array = array();

        foreach ($cursos as $c) {


            $tarea1 =
                DB::table('nota_estudientes as tareas')
                ->join('nota_final_tarea as tg', 'tareas.nota_final_id', '=', 'tg.id')
                ->join('materia_grados as cur', 'tg.materia_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bloque'
                )
                ->groupBy('cur.id')
                ->where('tg.bloque', 1)
                ->where('tareas.estudiante_id', $estudiante->id)
                ->get();
            // dd($tarea1);

            $tarea2 =
                DB::table('nota_estudientes as tareas')
                ->join('nota_final_tarea as tg', 'tareas.nota_final_id', '=', 'tg.id')
                ->join('materia_grados as cur', 'tg.materia_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bloque'
                )
                ->groupBy('cur.id')
                ->where('tg.bloque', 2)
                ->where('tareas.estudiante_id', $estudiante->id)
                ->get();

            $tarea3 =
                DB::table('nota_estudientes as tareas')
                ->join('nota_final_tarea as tg', 'tareas.nota_final_id', '=', 'tg.id')
                ->join('materia_grados as cur', 'tg.materia_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bloque'
                )
                ->groupBy('cur.id')
                ->where('tg.bloque', 3)
                ->where('tareas.estudiante_id', $estudiante->id)
                ->get();

            $tarea4 =
                DB::table('nota_estudientes as tareas')
                ->join('nota_final_tarea as tg', 'tareas.nota_final_id', '=', 'tg.id')
                ->join('materia_grados as cur', 'tg.materia_id', '=', 'cur.id')
                ->select(
                    DB::raw('sum(tareas.calificacion) as suma'),
                    'cur.nombre',
                    'tg.nombre as tarea_nombre',
                    'tg.bloque'
                )
                ->groupBy('cur.id')
                ->where('tg.bloque', 4)
                ->where('tareas.estudiante_id', $estudiante->id)
                ->get();

            array_push($bimestre1, $tarea1);
            array_push($bimestre2, $tarea2);
            array_push($bimestre3, $tarea3);
            array_push($bimestre4, $tarea4);
        }

        $new_Array = array();

        for ($i = 0; $i < count($bimestre1); $i++) {
            array_push($new_Array, array($bimestre1[$i][$i]->nombre, $bimestre1[$i][$i]->suma, $bimestre2[$i][$i]->suma, $bimestre3[$i][$i]->suma, $bimestre4[$i][$i]->suma));
        }



        // dd($new_Array);
        $no = 1;
        return view('escuela.estudiante.boletin', compact('bimestre1', 'bimestre2', 'bimestre3', 'bimestre4', 'no', 'new_Array', 'estudiante', 'grado'));
    }
}
