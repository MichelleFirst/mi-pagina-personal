<?php
    session_start();

    $error = $_SESSION["error_login"] ?? "";
    unset($_SESSION["error_login"]);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión</title>

        <link rel="stylesheet" href="css/usuarios.css">
    </head>
    <body>
        <div class="contenedor login">
            <h1>Iniciar sesión</h1>
            <p>Ingresa tus datos para acceder.</p>

            <?php if (!empty($error)): ?>
                <div class="mensaje-error" role="alert">
                    <?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?>
                </div>
            <?php endif; ?>

            <form action="php/login.php" method="POST">

                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo"
                    name="correo" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password"
                    name="password" required>

                <button type="submit">Ingresar</button>

            </form>

            <p>¿No tienes cuenta?
                <a href="registro.php">Regístrate aquí</a>
            </p>

        </div>
    </body>
</html>
