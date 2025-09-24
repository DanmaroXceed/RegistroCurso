<?php

namespace App\Http\Controllers;

use App\Exports\RegistrosExport;
use Illuminate\Http\Request;
use App\Models\Registro;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\FormularioSatisfaccion;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public function exportarExcel()
    {
        return Excel::download(new RegistrosExport, 'registros_curso.xlsx');
    }

    public function formularioSatisfaccion()
    {
        return view('satisfaccion-form');
    }

    public function guardarForm(Request $request)
    {
        try {
            DB::beginTransaction();
            // Validar datos
            $validated = $request->validate([
                'p1' => 'required|string',
                'p2' => 'required|string',
                'p3' => 'required|string',
                'p4' => 'required|string',
                'p5' => 'required|string',
                'p6' => 'required|string',
                'p7' => 'required|string',
            ]);

            // Guardar en BD
            FormularioSatisfaccion::create($validated);

            DB::commit();

            // Redirigir a la vista de resultado
            return view('resultado', [
                'success' => true,
                'mensaje' => '¡Gracias! El formulario fue guardado correctamente.'
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return view('resultado', [
                'success' => false,
                'mensaje' => 'Hubo un error al guardar el formulario: ' . $e->getMessage()
            ]);
        }
    }

    public function reporteSatisfaccion()
    {
        $respuestas = FormularioSatisfaccion::all();

        // Contar para p1 y p3 (5 opciones)
        $opciones = ['Excelente', 'Sobresaliente', 'Bueno', 'Regular', 'Malo'];

        $p1_counts = [];
        $p3_counts = [];
        foreach ($opciones as $op) {
            $p1_counts[$op] = $respuestas->where('p1', $op)->count();
            $p3_counts[$op] = $respuestas->where('p3', $op)->count();
        }

        // Contar para p2 y p6 (Sí/No)
        $p2_counts = [
            'Si' => $respuestas->where('p2', 'Si')->count(),
            'No' => $respuestas->where('p2', 'No')->count(),
        ];

        $p6_counts = [
            'Si' => $respuestas->where('p6', 'Si')->count(),
            'No' => $respuestas->where('p6', 'No')->count(),
        ];

        // Para p4 (Sí, No, No en todos los casos)
        $p4_counts = [
            'Si' => $respuestas->where('p4', 'Si')->count(),
            'No' => $respuestas->where('p4', 'No')->count(),
            'No en todos los casos' => $respuestas->where('p4', 'No en todos los casos')->count(),
        ];

        // Preguntas libres (p5 y p7) → se mostrarán como listado
        $p5_respuestas = $respuestas->pluck('p5');
        $p7_respuestas = $respuestas->pluck('p7');

        return view('satisfaccion-resultados', compact(
            'p1_counts',
            'p3_counts',
            'p2_counts',
            'p6_counts',
            'p4_counts',
            'p5_respuestas',
            'p7_respuestas'
        ));
    }
}
