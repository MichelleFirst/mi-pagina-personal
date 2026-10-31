<?php
    session_start();

    $mensaje_registro = $_SESSION["mensaje_registro"] ?? "";
    $error_registro = $_SESSION["error_registro"] ?? "";

    unset($_SESSION["mensaje_registro"], $_SESSION["error_registro"]);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de usuarios</title>

        <link rel="stylesheet" href="css/usuarios.css">
        <script src="js/validar_usuarios.js" defer></script>
    </head>
    <body>
        <div class="contenedor">
            <h1>Crear una cuenta</h1>
            <p>Completa los siguientes datos para registrarte.</p>

            <?php if (!empty($mensaje_registro)): ?>
                <div class="mensaje-exito">
                    <?= htmlspecialchars($mensaje_registro, ENT_QUOTES, "UTF-8") ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error_registro)): ?>
                <div class="mensaje-error">
                    <?= htmlspecialchars($error_registro, ENT_QUOTES, "UTF-8") ?>
                </div>
            <?php endif; ?>

            <form id="formulario-usuario" action="php/registro.php" method="POST">

                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre"
                    maxlength="100" required>

                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo"
                    maxlength="150" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" minlength="8" required>

                <label for="confirmar_password">Re-contraseña:</label>
                <input type="password" id="confirmar_password" name="confirmar_password" minlength="8" required>

                <button type="submit">Registrarme</button>
            </form>

            <p>¿Ya tienes una cuenta?
                <a href="login.php">Inicia sesión</a>
            </p>
        </div>
    </body>
</html>
