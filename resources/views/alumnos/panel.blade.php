<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de {{ $alumno->nombre }}</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa;">

    <a href="/alumnos" style="text-decoration: none; color: #0d6efd;">← Volver al listado</a>

    <h2>Panel Académico: {{ $alumno->nombre }} {{ $alumno->apellido }}</h2>
    <p><strong>Email:</strong> {{ $alumno->email }}</p>

    <hr>

    @if(session('exito'))
    <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #badbcc;">
        {{ session('exito') }}
    </div>
    @endif

    <h3>Matricular en una Asignatura</h3>

    <form action="/alumnos/{{ $alumno->id }}/matricular" method="POST" style="margin-bottom: 30px; background-color: #e2e3e5; padding: 15px; border-radius: 5px;">
        @csrf
        <label for="asignatura_id">Selecciona una asignatura:</label>
        <select name="asignatura_id" id="asignatura_id" required style="padding: 5px; margin-right: 10px;">
            <option value="">-- Seleccionar --</option>
            @foreach($todasLasAsignaturas as $asig)
            <option value="{{ $asig->id }}">{{ $asig->nombreAsignatura }} (ID: {{ $asig->id }})</option>
            @endforeach
        </select>

        <button type="submit" style="background-color: #198754; color: white; border: none; padding: 6px 12px; border-radius: 3px; cursor: pointer;">
            Matricular Alumno
        </button>
    </form>

    <h3>Asignaturas Matriculadas</h3>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; background-color: white;">
        <thead style="background-color: #e9ecef;">
            <tr>
                <th>Código</th>
                <th>Asignatura</th>
                <th>Horas</th>
                <th>Nota Actual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alumno->asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->id }}</td>
                
                <td>{{ $asignatura->nombreAsignatura }}</td>
                
                <td>{{ $asignatura->horas }}h</td>
                
                <td>
                    <form action="/alumnos/{{ $alumno->id }}/nota/{{ $asignatura->id }}" method="POST" style="display: inline-flex; align-items: center; gap: 5px; margin: 0;">
                        @csrf
                        <input type="number" name="nota" value="{{ $asignatura->pivot->nota }}" min="0" max="10" step="0.1" placeholder="0.0" style="width: 60px; padding: 2px;">
                        <button type="submit" style="background-color: #0d6efd; color: white; border: none; padding: 4px 8px; border-radius: 3px; cursor: pointer;">
                            Guardar
                        </button>
                    </form>
                </td>
                
                <td>
                    <form action="/alumnos/{{ $alumno->id }}/desmatricular/{{ $asignatura->id }}" method="POST" style="display: inline; margin: 0;">
                        @csrf
                        <button type="submit" onclick="return confirm('¿Seguro que quieres desmatricular a este alumno de la asignatura?')" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                            Desmatricular
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: #6c757d;">
                    Este alumno aún no está matriculado en ninguna asignatura.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>