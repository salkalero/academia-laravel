<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Primer Blade</title>
    <style>
        body { font-family: sans-serif; background: #f3f4f6; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; }
        h1 { color: #ff2d20; }
    </style>
</head>
<body>
    <div class="card">
        <h1>¡Hola {{$nombreUsuario}}!</h1>
        <p>Esta pantalla ya no es texto plano, ¡es una vista Blade real en Laravel 13!</p>
    </div>
</body>
</html>