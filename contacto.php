<?php
    require_once __DIR__ . "/includes/proteger.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yesenia Michelle Chuc Kuyoc">
        <title>Contacto</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/validacion.js" defer></script>
    </head>
    <body>
        <?php require_once __DIR__ . "/includes/encabezado.php"; ?>

        <main>
            <h1>Contacto</h1>
            <form id="formulario" onsubmit="return validarFormulario(event)">
                <fieldset>
                <legend>Uso de cajas de texto - Nombre</legend>
                <label class="campo">Nombre: <input name='nombre' id="nombre" type="text"></label>
                <label class="campo">Apellidos: <input name='apellidos' id="apellidos" type="text"></label>
                </fieldset>

                <fieldset>
                    <legend>Uso de Radio Buttons - Género </legend>
                    <label><input type="radio" name="radio1" id="radio1">Masculino</label>
                    <label><input type="radio" name="radio1" id="radio2">Femenino</label>
                </fieldset>

                <fieldset>
                    <legend>Uso del CheckBox - Intereses</legend>
                    <label><input type="checkbox" name="deporte" id="deporte" value="Deportes"> Hacer Deporte</label>
                    <label><input type="checkbox" name="tv" id="tv" value="Televisión"> Ver Televisión</label>
                    <label><input type="checkbox" name="ejercicio" id="ejercicio" value="ejercicio"> Hacer ejercicio</label>
                </fieldset>

                <fieldset>
                    <legend>Uso de Select - Estudios Actuales </legend>
                    <select name="select" id="estudios">
                        <option value="">-- Selecciona una opción --</option>
                        <option value="value1">Secundaria</option>
                        <option value="value2">Bachillerato</option>
                        <option value="value3">Licenciatura</option>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>Uso de list - Navegador usado</legend>
                    <label class="campo">Selecciona el Buscador utilizado:
                    <input list="buscadores" name="MisBuscadores" id="buscador"></label>
                    <datalist id="buscadores">
                        <option value="Chrome">
                        <option value="Firefox">
                        <option value="Internet Explorer">
                        <option value="Opera">
                        <option value="Safari">
                        <option value="Microsoft Edge">
                    </datalist>
                </fieldset>
                <div id="mensaje-resultado"></div>
                <div class="botones-form">
                    <input type="submit" value="Enviar">
                    <button type="button" id="btn-limpiar" onclick="limpiarFormulario()">Limpiar</button>
                </div>
            </form>
        </main>

        <footer>
            <p>Autor: Yesenia Michelle Chuc Kuyoc</p>
            <p>Tizimín, Yucatán, Septiembre, 2026.</p>
        </footer>
    </body>
</html>