<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'Nomenclatura', 'Carrera','Turno','Cuatrimestre','Grupo'
    ];
}
