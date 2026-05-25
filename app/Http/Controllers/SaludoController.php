<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; //<-- MUY IMPORTANTE Importamos el mmodelo Alumno

class SaludoController extends Controller
{
    //Se modifica la función para mostrar los datos de una base de datos real.
    public function mostrarListado()
    {
        // Eloquent hace la magia: busca todos los registros de la tabla 'alumnos'
        // Esto equivale a un "SELECT * FROM alumnos" en SQL clásico
        $alumnos = Alumno::all();

        // Le pasamos la colección de la base de datos a la vista
        return view('listado', ['alumnos' => $alumnos]);
    }

    // Muestra el formulario para crear un nuevo ususario.
    public function crearAlumno()
    {
        return view('crear_alumno');
    }

    /** Almacena el nuevo alumno en la base de datos. */
    public function guardarAlumno(Request $request)
    {
        //dd($request->all());

        /**  Definimos las reglas de validación para los campos del formulario.
         */
        $reglas = [
            'nombre' => 'required|min:3',
            'email'  => 'required|email|unique:alumnos,email',
        ];

        /** Vamos a definir los mensajes de error personalizados y traducidos al Español
         * a cada regla de validación.
         */
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'      => 'El nombre debe tener al menos 3 caracteres.',
            'email.required'  => 'El email es obligatorio.',
            'email.email'     => 'El email debe ser una dirección válida.',
            'email.unique'    => 'El email ya está registrado en la academia.',
        ];

        // Pasamos las reglas y los mensajes al validador de Laraverl.

        $request->validate($reglas, $mensajes);

        /** Si llega hasta aquí, los datos de entrada son  válidos y seguros. */

        // 1. Instanciamos un objeto vacío del modelo Alumno (como una fila nueva de Excel)
        $nuevoAlumno = new Alumno();

        // 2. Rellenamos sus propiedades con lo que viene del formulario HTML (atrapado por $request)
        $nuevoAlumno->nombre = $request->input('nombre');
        $nuevoAlumno->email = $request->input('email');

        // 3. Eloquent hace la magia: ejecuta el "INSERT INTO alumnos..." en MySQL por nosotros
        $nuevoAlumno->save();

        // 4. Redireccionamos al usuario al listado principal con un mensaje de éxito silencioso
        return redirect('/alumnos');
    }
}
