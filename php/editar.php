<?php
    session_start();

    // Recuperar mensajes
    $mensaje_edicion = $_SESSION["mensaje_edicion"] ?? "";
    $error_edicion = $_SESSION["error_edicion"] ?? "";

    // Eliminar mensajes después de leerlos
    unset($_SESSION["mensaje_edicion"], $_SESSION["error_edicion"]);

    require_once "../config/conexion.php";

    // Comprobar que sea administrador
    if (!isset($_SESSION["id"]) || ($_SESSION["rol"] ?? "") !== "admin") {
        exit("Acceso denegado.");
    }

    // Crear token CSRF si todavía no existe
    if (empty($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    // Comprobar que exista el ID
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if (!$id || $id <= 0) {
        exit("ID de usuario inválido.");
    }

    $conexion = conectar();

    // Buscar al usuario
    $sql = "SELECT id, nombre, correo
            FROM usuarios
            WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($resultado);

    if (!$usuario) {
        exit("El usuario no existe.");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Modificar usuario</title>

        <link rel="stylesheet" href="../css/usuarios.css">
    </head>

    <body>
        <div class="contenedor">
            <h1>Modificar usuario</h1>

            <?php if (!empty($mensaje_edicion)): ?>
                <div class="mensaje-exito">
                    <?= htmlspecialchars($mensaje_edicion, ENT_QUOTES, "UTF-8") ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error_edicion)): ?>
                <div class="mensaje-error">
                    <?= htmlspecialchars($error_edicion, ENT_QUOTES, "UTF-8") ?>
                </div>
            <?php endif; ?>

            <form id="formulario-usuario" action="actualizar.php" method="POST">

                <input type="hidden" name="id"
                    value="<?php echo $usuario['id']; ?>">

                <input type="hidden" name="csrf_token"
                    value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                <label>Nombre:</label>

                <input type="text" name="nombre"
                    value="<?php echo htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8'); ?>"
                    maxlength="100" required>

                <label>Correo electrónico:</label>

                <input type="email" name="correo"
                    value="<?php echo htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8'); ?>"
                    maxlength="150" required>

                <label>Nueva contraseña (opcional):</label>
                <input type="password"
                    name="password"
                    id="password"
                    minlength="8"
                    placeholder="Dejar vacío para conservar la actual">

                <label>Confirmar nueva contraseña:</label>
                <input type="password"
                    name="confirmar_password"
                    id="confirmar_password"
                    placeholder="Repite la nueva contraseña">
                
                
                    <button type="submit">Guardar cambios</button>


            </form>

            <p>
                <a href="lista.php">Volver al listado</a>
            </p>

        </div>

        <script src="../js/validar_usuarios.js"></script>
    </body>
</html>
