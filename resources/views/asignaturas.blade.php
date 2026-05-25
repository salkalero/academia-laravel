<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia DAW - Listado de Asignaturas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6 sm:p-12 font-sans flex flex-col items-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-2xl border border-gray-200">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-extrabold text-gray-800">Plan de Estudios</h1>
                <p class="text-xs text-gray-400 mt-0.5">Asignaturas vigentes en el ciclo de DAW</p>
            </div>
            <div class="space-x-2"> {{-- Contenedor para los dos botones --}}
                <a href="/asignaturas/crear" class="text-xs font-bold bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded transition-colors shadow">
                    ➕ Añadir Asignatura
                </a>
                <a href="/" class="text-xs font-bold bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded transition-colors">
                    ⬅️ Volver
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">

            <!-- Bloque de aviso cuando se añade una asignatura o cuando se elimina la asignatura. -->
            @if(session('Éxito'))
            <div style="background-color: #d1e7dd; color: #0f5132; padding: 15px; margin-bottom: 20px; border: 1px solid #badbcc; border-radius: 5px;">
                <strong>¡Éxito!</strong> {{ session('Éxito') }}
            </div>
            @endif

            @if(session('Cuidado'))
            <div style="background-color: #f8d7da; color: #842029; padding: 15px; margin-bottom: 20px; border: 1px solid #f5c2c7; border-radius: 5px;">
                <strong>Aviso:</strong> {{ session('Cuidado') }}
            </div>
            @endif

            <!--  Tabla donde se muestran todas las asignaturas que hay en la bbdd y los botones de cada línea.. -->
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="p-3 text-xs font-bold uppercase tracking-wider text-gray-500">Asignatura</th>
                        <th class="p-3 text-xs font-bold uppercase tracking-wider text-gray-500 text-center">Carga Horaria</th>
                        <th class="p-3 text-xs font-bold uppercase tracking-wider text-gray-500 text-center">Acciones</th> {{-- <-- Nueva Columna --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-150">
                    {{-- El bucle Blade que recupera los datos de Eloquent --}}
                    @foreach ($asignaturas as $asignatura)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-3 font-semibold text-gray-700 text-xl">
                            {{ $asignatura->nombreAsignatura }}
                        </td>
                        <td class="p-3 text-center">
                            <span class="inline-block bg-red-100 text-red-700 text-xl font-bold px-2.5 py-1 rounded-full">
                                {{ $asignatura->horas }} horas
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <form action="/asignaturas/{{ $asignatura->id }}/eliminar" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta asignatura?');">
                                @csrf
                                <button type="submit" class="text-xs bg-red-500 hover:bg-red-600 text-white font-bold px-3 py-1.5 rounded transition-colors shadow-sm">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>