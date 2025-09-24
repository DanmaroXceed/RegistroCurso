<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioSatisfaccion extends Model
{
    protected $table = 'formulario_satisfaccion';

    protected $fillable = [
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
    ];
}
