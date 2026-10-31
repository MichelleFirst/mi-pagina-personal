<?php
    session_start();

    require_once "../config/conexion.php";

    // Guardar mensaje y regresar a la lista de usuarios
    function regresarLista($mensaje, $esError = false) {

        if ($esError) {
            $_SESSION["error_eliminar"] = $mensaje;
        } else {
            $_SESSION["mensaje_eliminar"] = $mensaje;
        }

        header("Location: lista.php");
        exit();
    }

    // Verificar administrador
    if (!isset($_SESSION["id"]) || $_SESSION["rol"] !== "admin") {
        exit("Acceso denegado.");
    }

    // Solo aceptar POST
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        exit("Solicitud no permitida.");
    }

    // Verificar token
    $token = $_POST["csrf_token"] ?? "";

    if (
        empty($_SESSION["csrf_token"]) ||
        !hash_equals($_SESSION["csrf_token"], $token)
    ) {
        exit("Solicitud inválida.");
    }

    // Obtener ID
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    if (!$id || $id <= 0) {
        regresarLista("ID de usuario inválido.", true);
    }

    if ($id == $_SESSION["id"]) {
        regresarLista(
            "No puedes eliminar tu propia cuenta mientras tienes la sesión iniciada.",
            true
        );
    }

    $conexion = conectar();

    // Consultar el usuario que se quiere eliminar
    $sql = "SELECT rol FROM usuarios WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($stmt);

    if (!$usuario) {
        mysqli_close($conexion);
        regresarLista("El usuario no existe.", true);
    }

    // Evitar eliminar al último administrador
    if ($usuario["rol"] === "admin") {

        $consulta = mysqli_query(
            $conexion,
            "SELECT COUNT(*) AS total FROM usuarios WHERE rol = 'admin'"
        );

        $cantidad = mysqli_fetch_assoc($consulta);

        if ($cantidad["total"] <= 1) {
            mysqli_close($conexion);
            regresarLista("No puedes eliminar al último administrador.", true);
        }
    }

    // Eliminar usuario
    $sql = "DELETE FROM usuarios WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Ejecutar eliminación
    if (mysqli_stmt_execute($stmt)) {

        if (mysqli_stmt_affected_rows($stmt) === 1) {
            $mensaje = "¡Usuario eliminado correctamente!";
            $esError = false;
        } else {
            $mensaje = "No se encontró el usuario.";
            $esError = true;
        }

    } else {

        $mensaje = "Ocurrió un error al eliminar el usuario.";
        $esError = true;

    }

    // Cerrar consulta y conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    // Regresar a la lista con el mensaje correspondiente
    regresarLista($mensaje, $esError);
?>