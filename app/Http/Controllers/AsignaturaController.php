<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura; //<-- Imortamos el modelo de asignatura.

class AsignaturaController extends Controller
{
    /**
     *  Muestra el listado de asignaturas en la vista asignaturas.blade.php.
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas', ['asignaturas' => $asignaturas]);
    }

    /**
     *  Muestra el formulario para crear una nueva asignatura. 
     */
    public function crear()
    {
        return view('crear_asignatura');
    }

    /**
     * Almacena la nueva asignatura en la base de datos.
     */
    public function guardar(Request $request)
    {
        /** Por ahora, vamos a hacer un "freno de mano" (dd) para espiar qué nos llega del formulario.
         *  Esto detiene la aplicación y nos muestra los datos en pantalla.
         * Es solo para comprobar como funciona el envío de datos desde el formulario,
         * pero en producción no se debe usar dd(), ya que detiene la aplicación y no es seguro 
         * mostrar los datos del request en pantalla.
         */
        //dd($request->all());


        /**  Definimos las reglas de validación para los campos del formulario.
         */
        $reglas =[
            'nombre' => 'required|min:3|unique:asignaturas,nombreasignatura',
            'horas' => 'required|numeric|min:1',
        ];

        /** Vamos a definir los mensajes de error personalizados y traducidos al Español
         * a cada regla de validación.
         */
        $mensajes =[
            'nombre.required' => 'El nombre de la asignatura es obligatorio.',
            'nombre.min'      => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.unique'   => 'Esta asignatura ya está registrada en la academia.',
            'horas.required'  => 'La carga horaria es obligatoria.',
            'horas.numeric'   => 'Las horas deben ser un número positivo.',
            'horas.min'       => 'La asignatura debe tener al menos 1 hora lectiva.'
        ];

        // Pasamos las reglas y los mensajes al validador de Laravel
        $request->validate($reglas, $mensajes);

        /** Si llega hasta aquí, los datos de entrada son  válidos y seguros. */
        // 1. Instanciamos un objeto vacío del modelo Asignatura (como una fila nueva de Excel)
        $nuevaAsignatura = new Asignatura();

        // 2. Rellenamos sus propiedades con lo que viene del formulario HTML (atrapado por $request)
        $nuevaAsignatura->nombreAsignatura = $request->input('nombre');
        $nuevaAsignatura->horas = $request->input('horas');

        // 3. Eloquent hace la magia: ejecuta el "INSERT INTO asignaturas..." en MySQL por nosotros
        $nuevaAsignatura->save();

        // 4. Redireccionamos al usuario al listado principal con un mensaje de éxito silencioso
        return redirect('/asignaturas')
            ->with('Éxito', '¡Asignatura guardada correctamente!');
    }

    /** Eliminamos la asignatura en base al id */
    public function eliminar($id)
    {
        /**  Buscamos la asignatura en la BBDD por su id.
         * Si no se encuentra el id, el método findOnFail lanzará una excepción 
         * y Laravel mostrará un error 404 de forma controlada.
         */
        $asignatura = Asignatura::findOrFail($id);

        // Ejecutamos la orden de eliminación en la base de datos.
        $asignatura->delete();

        /**  Redirigimos al ususario al listado con la tabla ya actualizada. 
         * En esta ocacion no se usa view() porque no estamos mostrando una vista nueva,
         * sino que queremos redirigir a la ruta /asignaturas, que a su vez ejecutará
         * el método index() de este mismo controlador, que es el encargado de 
         * recuperar el listado actualizado de asignaturas y mostrarlo en la vista
         * asignaturas.blade.php. 
         * */
        return redirect('/asignaturas')
            ->with('Cuidado', '¡Asignatura eliminada correctamente!');
    }
}
