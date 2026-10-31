<?php
    require_once __DIR__ . "/includes/proteger.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yesenia Michelle Chuc Kuyoc">
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/fecha.js" defer></script>
    </head>
    <body>
        <?php require_once __DIR__ . "/includes/encabezado.php"; ?>

        <main>
            <h1> Mi página web</h1> 
            <p>Bienvenidos a mi página web, aprendiendo en el curso de desarrollo de aplicaciones web, donde encontrarás mi información personal y académica, al igual que una galería de imágenes y videos, un convertidor de dólares y euros a pesos mexicanos, una mini calculadora de números al cuadrado, un pequeño cuestionario interactivo y, por último, un apartado de contacto.</p>
            <div id="fecha-hora"></div> 
            <div class="imagenes-inicio">
                <img src="media/DesarrolloWEb.jpg" alt="Imagen de Apps" width="500" height="300">
                <img src="https://ucentralvirtual.ucentral.edu.co/wp-content/uploads/2025/09/ingenieria-de-sotfware-online-1-1.png" alt="Foto de internet" width="500" height="300">
            </div>

            <div class="mapa">
            <h2>Ubicación de la Unidad Multidisciplinaria Tizimín (UMT)</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5151.189536561342!2d-88.14483246021472!3d21.156519327479486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f522b6c741fe2ff%3A0x1a4273ac58448ae1!2sUADY%20-%20Unidad%20Multidisciplinaria%20Tizim%C3%ADn!5e0!3m2!1ses-419!2smx!4v1788193245083!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </main>

        <footer>
            <p>Autor: Yesenia Michelle Chuc Kuyoc</p>
            <p>Tizimín, Yucatán, Septiembre, 2026.</p>
        </footer>
    </body>
</html>