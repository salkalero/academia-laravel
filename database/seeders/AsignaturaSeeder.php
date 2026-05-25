<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asignatura; //<-- Importamos el modelo

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Asignatura::create([
            'nombreAsignatura'=>'Programación',
            'horas'=>80
        ]);

        Asignatura::create([
            'nombreAsignatura'=>'Base de Datos',
            'horas'=>120
        ]);
    }
}
