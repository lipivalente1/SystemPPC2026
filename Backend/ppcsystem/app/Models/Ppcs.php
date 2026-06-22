<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppcs extends Model
{
    //
    //
    protected $table = 'ppcs';

    protected $fillable = [
        'nome',
        'ch',
        'n_semestres',
        'justificativa',
        'impacto',
        'disciplinas',
        'status',
        'faculdade_id',
        'tecnico_id'
    ];
}
