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
        return $pdf->stream('registro_' . $user->id . '.pdf');
    }

    public function verPDF(Int $id)
    {
        $registro = Registro::find($id);
        return view('registro.pdf', compact('registro'));
    }

    public function reporte()
    {
        $datos = Registro::all();
        return view('reporte', compact('datos'));
    }

    public function exportarPDF()
    {
        $datos = Registro::all(); // O tu query filtrada

        $pdf = Pdf::loadView('pdf.reporte', compact('datos'))
            ->setPaper('legal', 'landscape'); // Si tu tabla es ancha

        return $pdf->download('reporte_registros.pdf');
    }
}
