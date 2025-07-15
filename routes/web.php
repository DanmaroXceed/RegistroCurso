<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro/completado/{user}', [RegistroController::class, 'showConfirmation'])
     ->name('registro.confirmacion');

Route::get('/registro/completado/{user}/pdf', [RegistroController::class, 'generatePDF'])
     ->name('registro.pdf');
