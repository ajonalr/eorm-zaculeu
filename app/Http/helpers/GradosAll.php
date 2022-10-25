<?php

use App\Models\Grado;
use App\Models\MateriaGrado;
use App\Models\NotaFinalMateria;
use App\Models\ProfesoGrado;

function getGradosAll()
{
   return Grado::all();
}

function getGradosToProfesor($profe_id)
{
   return ProfesoGrado::where('profesor_id', $profe_id)->get();
}


function getAllMateriasProfesor($profe_id, $grado_id)
{
   return MateriaGrado::where('profesor_id', $profe_id)
      ->where('grado_id', $grado_id)
      ->get();
}
