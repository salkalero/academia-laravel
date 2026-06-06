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
        Schema::create('create_alumno_asignaturas', function (Blueprint $table) {
            $table->id();

            /** Creamos las claves foráneas que conectan con nuestras tablas principales.
             * Si el alumno se borra, se borra su matrícula automáticamente (onDelete cascade)
             */
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('cascade');

            // Añadimos el campo para la puntuación/nota (puede ser nulo al principio si no se ha evaluado)
            $table->decimal('nota', 4, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_alumno_asignaturas');
    }
};
