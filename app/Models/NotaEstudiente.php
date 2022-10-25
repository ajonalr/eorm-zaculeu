<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaEstudiente extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $table = 'nota_estudientes';

    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiante_id');
    }

    public function tarea()
    {
        return $this->hasOne('App\Models\NotaFinalMateria', 'id', 'nota_final_id');
    }
}
