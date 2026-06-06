<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumnoPanelTest extends TestCase
{
    // Este trait limpia la base de datos de pruebas en cada ejecución
    use RefreshDatabase;

    
    public function test_un_alumno_puede_ser_matriculado_en_una_asignatura()
    {
        // 1. Preparación
        $alumno = Alumno::factory()->create();
        $asignatura = Asignatura::factory()->create();

        // 2. Acción (Simulamos el envío del formulario)
        $response = $this->post("/alumnos/{$alumno->id}/matricular", [
            'asignatura_id' => $asignatura->id
        ]);

        // 3. Verificación
        $response->assertRedirect(); // Comprueba que redirige de vuelta
        
        $this->assertDatabaseHas('create_alumno_asignaturas', [
            'alumno_id' => $alumno->id,
            'asignatura_id' => $asignatura->id
        ]); // Comprueba que el registro existe en la tabla intermedia
    }
}