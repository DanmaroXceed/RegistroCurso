<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{
    public function showConfirmation(Registro $user)
    {
        return view('registro.confirmacion', compact('user'));
    }

    public function generatePDF(Registro $user)
    {
        $pdf = Pdf::loadView('registro.pdf', compact('user'));
        return $pdf->stream('registro_'.$user->id.'.pdf');
    }
}
