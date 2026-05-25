<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor academia DAW - Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white p-8 rounded-xl shadow-lg max-w-lg w-full text-center border border-gray-200">

        <div class="mb-6">
            <span class="text-xs font-bold uppercase tracking-widest bg-red-100 text-red-600 px-3 py-1 rounded-full">
                Panel de Control v1.0
            </span>
            <h1 class="text-3xl font-extrabold text-gray-800 mt-3">
                Academia <span class="text-red-500">DAW</span>
            </h1>
            <p class="text-sm text-gray-500 mt-1">Sistema integral de gestión de alumnos y asignaturas</p>
        </div>

        <hr class="border-gray-200 my-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <a href="/alumnos" class="flex flex-col items-center justify-center p-5 bg-gray-50 hover:bg-red-50 border border-gray-200 hover:border-red-200 rounded-lg transition-all duration-200 group">
                <span class="text-3xl mb-2">👨‍🎓</span>
                <span class="font-bold text-gray-700 group-hover:text-red-600 transition-colors">Alumnos</span>
                <span class="text-xs text-gray-400 mt-1">Listado y matrículas</span>
            </a>

            <a href="/asignaturas" class="flex flex-col items-center justify-center p-5 bg-gray-50 hover:bg-red-50 border border-gray-200 hover:border-red-200 rounded-lg transition-all duration-200 group">
                <span class="text-3xl mb-2">📚</span>
                <span class="font-bold text-gray-700 group-hover:text-red-600 transition-colors">Asignaturas</span>
                <span class="text-xs text-gray-400 mt-1">Carga horaria y cursos</span>
            </a>

        </div>

        <div class="mt-8 text-xs text-gray-400">
            Desarrollado en el entorno de formación · 2026
        </div>

    </div>
</body>

</html>