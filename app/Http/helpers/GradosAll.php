<?php

use App\Models\Grado;
use App\Models\ProfesoGrado;

function getGradosAll()
{
   return Grado::all();
}

function getGradosToProfesor($profe_id)
{
   return ProfesoGrado::where('profesor_id', $profe_id)->get();
}
