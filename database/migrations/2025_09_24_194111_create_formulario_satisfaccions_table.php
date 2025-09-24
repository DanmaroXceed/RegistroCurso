<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulario_satisfaccion', function (Blueprint $table) {
            $table->id();
            $table->string('p1');               // Excelente, bueno, etc.
            $table->string('p2');               // Si/No
            $table->string('p3');               // Excelente, bueno, etc.
            $table->string('p4');               // Si, No, No en todos los casos
            $table->text('p5');                 // Respuesta libre
            $table->string('p6');               // Si/No
            $table->text('p7');                 // Respuesta libre
            $table->timestamps();               // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_satisfaccion');
    }
};
