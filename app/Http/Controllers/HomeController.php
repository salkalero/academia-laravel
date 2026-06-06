<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Http\Request;

/**
 * Clase HomeController
 * Este controlador se encarga de gestionar la página de inicio principal
 * (Dashboard / Central de mandos) del Gestor de Academia DAW
 */

class HomeController extends Controller
{
    /**
     * Muestra la pantalla y el menú principal.
     */
    public function index()
    {
        // Devolverá uma vista llamada 'home'.
        return view('home');
    }

    /**
     * Muestra el panel de control académico del alumno con sus asignaturas y notas.
     */
    public function panel($id)
    {
        // 1. Buscamos al alumno con sus asignaturas actuales
        $alumno = Alumno::with('asignaturas')->findOrFail($id);

        // 2. Buscamos TODAS las asignaturas de la academia para el desplegable
        $todasLasAsignaturas = Asignatura::all();

        // 3. Pasamos ambas variables a la vista
        return view('alumnos.panel', compact('alumno', 'todasLasAsignaturas'));
    }

    /**
     * Procesa el formulario y matricula al alumno en la asignatura seleccionada.
     */
    public function matricular(Request $request, $id)
    {
        // 1. Buscamos al alumno por su ID
        $alumno = Alumno::findOrFail($id);

        // 2. Recuperamos el ID de la asignatura que viene desde el formulario <select>
        $asignaturaId = $request->input('asignatura_id');

        // 3. Usamos 'attach' para meter el registro en la tabla 'create_alumno_asignaturas'
        // Pasamos un segundo parámetro en forma de array para rellenar la nota como NULL al principio
        $alumno->asignaturas()->attach($asignaturaId, ['nota' => null]);

        // 4. Redirigimos de vuelta al panel del alumno con un mensaje de éxito
        return redirect()->back()->with('exito', '¡Alumno matriculado correctamente en la asignatura!');
    }

    /**
 * Actualiza la nota de un alumno en una asignatura específica.
 */
public function actualizarNota(Request $request, $id, $asignaturaId)
{
    // 1. Validamos que la nota sea un número entre 0 y 10
    $request->validate([
        'nota' => 'required|numeric|min:0|max:10',
    ]);

    // 2. Buscamos al alumno por su ID
    $alumno = Alumno::findOrFail($id);

    // 3. Actualizamos el campo 'nota' en la tabla 'create_alumno_asignaturas'
    $alumno->asignaturas()->updateExistingPivot($asignaturaId, [
        'nota' => $request->input('nota')
    ]);

    // 4. Volvemos al panel con un mensaje de éxito
    return redirect()->back()->with('exito', '¡Nota actualizada correctamente!');
}

/**
 * Elimina la relación (matricula) entre el alumno y la asignatura.
 */
public function desmatricular($id, $asignaturaId)
{
    // 1. Buscamos al alumno por su ID
    $alumno = Alumno::findOrFail($id);

    // 2. Rompemos la relación en la tabla intermedia usando detach()
    $alumno->asignaturas()->detach($asignaturaId);

    // 3. Redirigimos de vuelta al panel con un mensaje de éxito
    return redirect()->back()->with('exito', 'El alumno ha sido desmatriculado correctamente de la asignatura.');
}
}
