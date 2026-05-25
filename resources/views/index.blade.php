<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Salvador Calero - Fotografía</title>
    <meta name="description" content="Portfolio de Salvador Calero - Macros, paisajes y retratos.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cookies.css">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <a class="logo" href="/">Salvador Calero</a>
            <nav class="main-nav" id="mainNav">
                <a href="index.html">Inicio</a>
                <a href="portfolio.html">Portfolio</a>
                <a href="sobre-mi.html">Sobre mí</a>
                <a href="contacto.html">Contacto</a>
            </nav>
            <button id="hamburger" aria-label="Abrir menú">☰</button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-inner">
                <h1>Salvador Calero</h1>
                <p>Fotografía — Macros · Paisajes · Retratos</p>
            </div>
        </section>

        <section class="featured container">
            <h2>Trabajos destacados</h2>
            <div class="grid">
                <a href="img/portfolio/paisajes/example1.jpg" class="thumb"><img
                        src="img/portfolio/paisajes/example1.jpg" alt="Paisaje 1"></a>
                <a href="img/portfolio/macro/example1.jpg" class="thumb"><img src="img/portfolio/macro/example1.jpg"
                        alt="Macro 1"></a>
                <a href="img/portfolio/retratos/example1.jpg" class="thumb"><img
                        src="img/portfolio/retratos/example1.jpg" alt="Retrato 1"></a>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <span id="year"></span> Salvador Calero — <a href="aviso-legal.html">Aviso legal</a> · <a
                    href="politica-privacidad.html">Privacidad</a> · <a href="politica-cookies.html">Cookies</a></p>
        </div>
    </footer>

    <!-- Cookie banner -->
    <div id="cookie-banner" class="cookie-banner" role="dialog" aria-live="polite" aria-label="Aviso de cookies">
        <p>Utilizamos cookies para mejorar tu experiencia. <a href="politica-cookies.html">Más info</a></p>
        <div class="actions"><button id="accept-cookies">Aceptar</button></div>
    </div>

    <script src="js/protect-images.js"></script>
    <script src="js/cookies.js"></script>
    <script src="js/main.js"></script>
</body>

</html>