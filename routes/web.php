<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('cerrado');
});

Route::get('/registro/completado/{user}', [RegistroController::class, 'showConfirmation'])
     ->name('registro.confirmacion');

Route::get('/registro/completado/{user}/pdf', [RegistroController::class, 'generatePDF'])
     ->name('registro.pdf');

Route::get('/pdf/{id}', [RegistroController::class, 'verPDF']);

Route::get('/reporte', [RegistroController::class, 'reporte'])->name('reporte');
Route::get('/exportar-pdf', [RegistroController::class, 'exportarPDF'])->name('exportar.pdf');
Route::get('/exportar-excel', [RegistroController::class, 'exportarExcel'])->name('exportar.excel');

Route::get('/formulario', [RegistroController::class, 'formularioSatisfaccion'])->name('formSatis');
Route::post('/formulario', [RegistroController::class, 'guardarForm'])->name('formulario.guardar');
Route::get('/reporte-satisfaccion', [RegistroController::class, 'reporteSatisfaccion'])->name('repoSatis');
