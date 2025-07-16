<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'email',
        'a_pat',
        'a_mat',
        'nombre',
        'inst',
        'cargo',
        'e_fed',
        'c_elec',
        'ine',
        'pasap',
        'f_pasap',
        'c_curp',
        'curp',
        'email_comp',
        'tel',
        'ext',
        'cel',
        'comp',
    ];
}
