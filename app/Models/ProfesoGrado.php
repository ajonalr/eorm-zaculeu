<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesoGrado extends Model
{
    use HasFactory;
    public $guarded = [];

    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }

    public function profesor()
    {
        return $this->hasOne('App\Models\Profeso', 'id', 'profesor_id');
    }

}
