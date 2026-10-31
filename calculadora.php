<?php
    require_once __DIR__ . "/includes/proteger.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yesenia Michelle Chuc Kuyoc">
        <title>Calculadora - Número al Cuadrado</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/calculadora.js" defer></script>
    </head>
    <body>

        <?php require_once __DIR__ . "/includes/encabezado.php"; ?>
        
        <main>
            <h1>Mini Calculadora: Número al Cuadrado</h1>
            <p>Ingresa un número para calcular su valor elevado al cuadrado (x²).</p>

            <div id="calculadora-contenedor" class="tarjeta">
                <label for="n1">Número:</label>
                <input type="number" id="n1" placeholder="Ej. 4">
                <div class="botones">
                    <button onclick="cuadrado()">x<sup>2</sup></button>
                    <button onclick="vaciar()">Limpiar</button>
                </div>

                <h3 id="resultado-cuadrado"></h3>
            </div>
        </main>

        <footer>
            <p>Autor: Yesenia Michelle Chuc Kuyoc</p>
            <p>Tizimín, Yucatán, Septiembre, 2026.</p>
        </footer>
    </body>
</html>