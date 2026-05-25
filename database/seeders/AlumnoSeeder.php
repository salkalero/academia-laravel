<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno; //<-- Importamos el modelo

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Alumno::create([
            'nombre' => 'Salvador',
            'email' => 'salvador@daw.com'
        ]);

        Alumno::create([
            'nombre' => 'Melina',
            'email' => 'melina@daw.com'
        ]);
    }
}
