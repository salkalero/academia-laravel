<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia DAW - Nueva Asignatura</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6 sm:p-12 font-sans flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-200">

        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-gray-800">Dar de alta a un nuevo Alumno</h1>
            <p class="text-xs text-gray-400 mt-0.5">Añade un nuevo alumno al sistema</p>
        </div>

        <form action="/alumnos" method="POST" class="space-y-4">

        <!-- Mostrar errores de validación -->
            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-lg text-sm space-y-1">
                <p class="font-bold">⚠️ Por favor, corrige los siguientes errores:</p>
                <ul class="list-disc list-inside text-xs">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- el token csrf, con esto Laravel verifica que la petición es segura y deja pasar los datos del formulario -->
            @csrf

            <div>
                <label for="nombre" class="block text-sm font-bold text-gray-700 mb-1">Nombre del alumno</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ej: Juan Pérez"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition-all">
            </div>

            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" placeholder="Ej: juan.perez@example.com"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition-all">
            </div>

            <div>            

            <div class="flex items-center justify-end space-x-3 pt-2">
                <a href="/alumnos" class="text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold text-sm px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all">
                    Guardar Alumno
                </button>
            </div>

        </form>

    </div>

</body>

</html>