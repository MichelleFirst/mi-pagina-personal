<?php
    require_once __DIR__ . "/includes/proteger.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yesenia Michelle Chuc Kuyoc">
        <title>Cuestionario Interactivo - Desarrollo Web</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/cuestionario.js" defer></script>
    </head>
    <body>
        
        <?php require_once __DIR__ . "/includes/encabezado.php"; ?>

        <main>
            <h1>Cuestionario de Desarrollo Web</h1>

            <article class="pregunta">
                <h4>Pregunta 1</h4>
                <p>¿Qué lenguaje se utiliza para la estructura de una página web?</p>
                <input type="text" id="respuesta1" placeholder="responda aquí">
                <button type="button" onclick="res1()">consultar</button>
                <div id="resultado1" class="resultado"></div>
            </article>

            <article class="pregunta">
                <h4>Pregunta 2</h4>
                <p>¿Qué lenguaje se encarga de la presentación y estilos visuales?</p>
                <input type="text" id="respuesta2" placeholder="responda aquí">
                <button type="button" onclick="res2()">consultar</button>
                <div id="resultado2" class="resultado"></div>
            </article>

            <article class="pregunta">
                <h4>Pregunta 3</h4>
                <p>¿Qué lenguaje de programación aporta comportamiento e interactividad del lado del cliente?</p>
                <input type="text" id="respuesta3" placeholder="responda aquí">
                <button type="button" onclick="res3()">consultar</button>
                <div id="resultado3" class="resultado"></div>
            </article>

            <article class="pregunta">
                <h4>Pregunta 4</h4>
                <p>¿En qué año fue diseñado JavaScript por Brendan Eich?</p>
                <select id="respuesta4">
                    <option value="">-- Selecciona una opción --</option>
                    <option value="1990">1990</option>
                    <option value="1995">1995</option>
                    <option value="2000">2000</option>
                    <option value="2005">2005</option>
                </select>
                <button type="button" onclick="res4()">consultar</button>
                <div id="resultado4" class="resultado"></div>
            </article>

            <article class="pregunta">
                <h4>Pregunta 5</h4>
                <p>¿Qué propiedad del DOM permite leer o cambiar el contenido HTML interno de un elemento?</p>
                <select id="respuesta5">
                    <option value="">-- Selecciona una opción --</option>
                    <option value="innerText">innerText</option>
                    <option value="outerHTML">outerHTML</option>
                    <option value="innerHTML">innerHTML</option>
                    <option value="textContent">textContent</option>
                </select>
                <button type="button" onclick="res5()">consultar</button>
                <div id="resultado5" class="resultado"></div>
            </article>

            <button type="button" id="btn-limpiar" onclick="limpiarCuestionario()">Limpiar</button>
        </main>

        <footer>
            <p>Autor: Yesenia Michelle Chuc Kuyoc</p>
            <p>Tizimín, Yucatán, Septiembre, 2026.</p>
        </footer>
    </body>
</html>