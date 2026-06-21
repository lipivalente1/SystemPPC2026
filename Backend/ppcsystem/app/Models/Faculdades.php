<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculdades extends Model
{
    protected $table = 'faculdades';
    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];
}
