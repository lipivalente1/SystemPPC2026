<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessosFaculTec extends Model
{
    protected $table = 'processos_facul_tec';
    public $timestamps = false;

    protected $fillable = [
        'content',
        'ppc_id'
    ];
}
