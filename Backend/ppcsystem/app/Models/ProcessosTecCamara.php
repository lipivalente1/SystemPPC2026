<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessosTecCamara extends Model
{
    protected $table = 'processos_tec_camara';
    public $timestamps = false;


    protected $fillable = [
        'content',
        'ppc_id'
    ];
}
