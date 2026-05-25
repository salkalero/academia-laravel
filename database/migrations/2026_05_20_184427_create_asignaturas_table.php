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
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id(); // Id Autoincremental.
            $table->string('nombreAsignatura'); //Columna para el nombre de la Asignatura.
            $table->integer('horas'); // Columna para las horas de la asignatura.
            $table->timestamps(); // Columnas creadas_el y actualizado_el.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaturas');
    }
};
