<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignatura extends Model
{
    use HasFactory;

    /**
     * Relación: Una asignatura pertenece a muchos alumnos.
     */
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'create_alumno_asignaturas')
            ->withPivot('nota')
            ->withTimestamps();
    }
}
