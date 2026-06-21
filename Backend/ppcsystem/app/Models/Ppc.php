<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppc extends Model
{
    //
    //
    protected $table = 'ppc';

    protected $fillable = [
        'nome',
        'ch',
        'n_semestres',
        'justificativa',
        'impacto',
        'disciplinas',
        'status'
    ];
}
