<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia DAW - Listado de Alumnos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6 sm:p-12 font-sans flex flex-col items-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-2xl border border-gray-200">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-extrabold text-gray-800">Alumnos Matriculados</h1>
                <p class="text-xs text-gray-400 mt-0.5">Estudiantes activos en el sistema</p>
            </div>
            <div class="space-x-2"> {{-- Contenedor para los dos botones --}}
                <a href="/alumnos/crear" class="text-xs font-bold bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded transition-colors shadow">
                    ➕ Añadir Alumno
                </a>
                <a href="/" class="text-xs font-bold bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded transition-colors">
                    ⬅️ Volver al Panel
                </a>

            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="p-3 text-xs font-bold uppercase tracking-wider text-gray-500">Nombre del Alumno</th>
                        <th class="p-3 text-xs font-bold uppercase tracking-wider text-gray-500">Correo Electrónico</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-150">
                    {{-- Comprueba el nombre de la variable que usas en tu SaludoController --}}
                    @foreach ($alumnos as $alumno)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-3 font-semibold text-gray-700">
                            {{ $alumno->nombre }}
                        </td>
                        <td class="p-3 text-sm text-gray-500">
                            {{ $alumno->email }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>