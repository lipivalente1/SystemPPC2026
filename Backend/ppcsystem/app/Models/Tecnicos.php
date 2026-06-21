<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
    protected $table = 'tecnicos';
    public $timestamps = false;


    protected $fillable = [
        'nome'
    ];
}
