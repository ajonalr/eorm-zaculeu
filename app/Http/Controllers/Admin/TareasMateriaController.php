<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TareasMateria;
use Illuminate\Http\Request;

class TareasMateriaController extends Controller
{
    public function store(Request $request)
    {
        $tarea = TareasMateria::create($request->all());
        return back()->with(['info' => 'datos guardados']);
    }
}
