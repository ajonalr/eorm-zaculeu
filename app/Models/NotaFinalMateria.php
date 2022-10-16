<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFinalMateria extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'nota_final_tarea';
}
