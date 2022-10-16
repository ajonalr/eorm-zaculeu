<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotaFinalMateria;
use Illuminate\Http\Request;

class NotaFinalMateriaController extends Controller
{
    

    public function store(Request $request)
    {
        $tarea = NotaFinalMateria::create($request->all());
        return back()->with(['info' => 'datos guardados']);
    }

}
