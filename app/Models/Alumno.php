<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;

    /** Relación: Un alumno pertenece a muchas asignaturas. */
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'create_alumno_asignaturas')
            ->withPivot('nota') // Le indicamos que traiga también la columna de la nota.
            ->withTimestamps();
    }

    
}
