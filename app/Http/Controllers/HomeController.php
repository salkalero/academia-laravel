<?php

namespace App\Http\Controllers;

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
}
