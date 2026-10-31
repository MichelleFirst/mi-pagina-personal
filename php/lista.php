<?php
    session_start();

    require_once "../config/conexion.php";

    if (!isset($_SESSION["id"]) || ($_SESSION["rol"] ?? "") !== "admin") {
        http_response_code(403);
        require_once __DIR__ . "/../includes/acceso_denegado.php";
        exit();
    }

    // Recuperar mensajes de eliminación
    $mensaje_eliminar = $_SESSION["mensaje_eliminar"] ?? "";
    $error_eliminar = $_SESSION["error_eliminar"] ?? "";

    // Limpiar los mensajes después de leerlos
    unset($_SESSION["mensaje_eliminar"], $_SESSION["error_eliminar"]);

    // Conectar con MySQL
    $conexion = conectar();

    $sql = "SELECT id, nombre, correo, rol, fecha_registro, fecha_actualizacion
        FROM usuarios
        ORDER BY id ASC";

    $resultado = mysqli_query($conexion, $sql);

    // Crear token de seguridad para los formularios
    if (empty($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    if (!$resultado) {
        die("Error al consultar los usuarios.");
    }

    ?>

    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gestión de usuarios</title>

            <link rel="stylesheet" href="../css/usuarios.css">
        </head>
        <body>

            <div class="contenedor listado">

                <h1>Gestión de usuarios</h1>

                <?php if (!empty($mensaje_eliminar)): ?>
                    <div class="mensaje-exito">
                        <?= htmlspecialchars($mensaje_eliminar, ENT_QUOTES, "UTF-8") ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($error_eliminar)): ?>
                    <div class="mensaje-error">
                        <?= htmlspecialchars($error_eliminar, ENT_QUOTES, "UTF-8") ?>
                    </div>
                <?php endif; ?>

                <p>
                    Bienvenido,
                    <?php echo htmlspecialchars($_SESSION["nombre"]); ?>
                </p>

                <h2>Usuarios registrados</h2>

                <div class="tabla-contenedor">

                    <table class="tabla-usuarios">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Fecha de registro</th>
                                <th>Última modificación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>

                                <tr>
                                    <td>
                                        <?php echo $usuario["id"]; ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($usuario["nombre"]); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($usuario["correo"]); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($usuario["rol"]); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($usuario["fecha_registro"]); ?>
                                    </td>

                                    <td>
                                        <?= $usuario["fecha_actualizacion"]
                                            ? htmlspecialchars($usuario["fecha_actualizacion"])
                                            : "Sin modificaciones" ?>
                                    </td>

                                    <td>

                                        <a href="editar.php?id=<?php echo $usuario['id']; ?>">
                                            Editar
                                        </a>

                                        <form action="eliminar.php" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">

                                            <input type="hidden" name="id"
                                                value="<?php echo $usuario['id']; ?>">

                                            <input type="hidden" name="csrf_token"
                                                value="<?php echo $_SESSION['csrf_token']; ?>">

                                            <button type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                    
                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

                <p>
                    <a href="../index.php">Volver al inicio</a>
                </p>

                <p>
                    <a href="cerrar_sesion.php">Cerrar sesión</a>
                </p>

            </div>

        </body>
    </html>

    <?php

    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>
