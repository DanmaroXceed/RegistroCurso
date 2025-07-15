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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('a_pat');     // Apellido paterno
            $table->string('a_mat');     // Apellido materno
            $table->string('nombre');    // Nombre
            $table->string('inst');      // Institución
            $table->string('cargo');     // Cargo
            $table->string('e_fed');     // Entidad federativa
            $table->string('c_elec');    // Clave elector
            $table->string('ine');       // INE
            $table->string('pasap')->nullable();     // Pasaporte
            $table->string('c_curp');    // Clave CURP
            $table->string('curp');      // CURP
            $table->string('email_comp'); // Correo complementario
            $table->string('tel');       // Teléfono fijo
            $table->string('ext');       // Extensión
            $table->string('cel');       // Celular
            $table->string('comp')->nullable();      // Comprobante
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
