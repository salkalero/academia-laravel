<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController; // Importante: Importamos el controlador de saludoController.php
use App\Http\Controllers\AsignaturaController; // Importamos el controlador de asignaturaController.php.
use App\Http\Controllers\HomeController; // Importamos el controlador de HomeController.


/* Añadimos {nombre} a la URL y se lo pasamos a la función */
Route::get ('saludo2/{nombre?}', function($nombre = 'Invitado'){
    if ($nombre === 'Invitado') {
    $nombre = ',No pusiste tu nombre, asi que me dirigiré a ti como Invitado';
    return view ('saludo2',['nombreUsuario'=> $nombre]);
    };
     return view ('saludo2', ['nombreUsuario' =>$nombre]);
});

// Ruta para mostrar la página de inicio.
Route::get('/', [HomeController::class, 'index']);

// Ruta para mostrar el listado de alumnos.
Route::get('/alumnos', [SaludoController::class, 'mostrarListado']);

// Ruta para mostrar el listado de asignaturas.
Route::get('/asignaturas', [AsignaturaController::class, 'index']);

// Ruta para mostrar la página de formulario crear asignatura, carga la vista.
Route::get('/asignaturas/crear', [AsignaturaController::class, 'crear']);

// Ruta para recibir los datos del formulario crear asignatura, procesa el envío.
Route::post('/asignaturas', [AsignaturaController::class, 'guardar']);

// Ruta para mostrar la página de formulario crear alumno, carga la vista.
Route::get('alumnos/crear', [SaludoController::class,'crearAlumno']);

// Ruta para recibir los datos del formulario crear alumno, procesa el envío.
Route::post('/alumnos', [SaludoController::class,'guardarAlumno']);

// Ruta para eliminar una asignatura, El {id} cambiará según la asignatura elegida.
Route::post('asignaturas/{id}/eliminar', [AsignaturaController::class, 'eliminar']);
