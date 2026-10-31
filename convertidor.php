<?php
    require_once __DIR__ . "/includes/proteger.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yesenia Michelle Chuc Kuyoc">
        <title>Convertidor a Pesos</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/convertidor.js?v=2" defer></script>
    </head>
    <body>
        
        <?php require_once __DIR__ . "/includes/encabezado.php"; ?>

        <main>
            <h1>Convertidor a Pesos Mexicanos (MXN)</h1>
            <p>Ingresa una cantidad en Dólares (USD) o Euros (EUR) para obtener su equivalencia en Pesos Mexicanos.</p>

            <div id="convertidor-contenedor" class="tarjeta">
                <label for="monto">Monto a convertir:</label>
                <input type="number" id="monto" placeholder="Ej. 100" step="any">

                <label for="moneda">Moneda de origen:</label>
                <select id="moneda">
                    <option value="USD">Dólares (USD)</option>
                    <option value="EUR">Euros (EUR)</option>
                </select>

                <div class="botones">
                    <button onclick="convertirAPesos()">Convertir a MXN</button>
                    <button onclick="limpiarConvertidor()">Limpiar</button>
                </div>

                <h3 id="resultado-conversion"></h3>
            </div>
        </main>

        <footer>
            <p>Autor: Yesenia Michelle Chuc Kuyoc</p>
            <p>Tizimín, Yucatán, Septiembre, 2026.</p>
        </footer>
    </body>
</html>