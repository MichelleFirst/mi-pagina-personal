<?php
    session_start();

    require_once "../config/conexion.php";

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

    // Obtener datos
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmar_password = $_POST["confirmar_password"] ?? "";

    // Validaciones
    if (!$id || $id <= 0 || $nombre === "" || $correo === "") {
        exit("Completa correctamente todos los campos obligatorios.");
    }

    if (strlen($nombre) > 100 || strlen($correo) > 150) {
        exit("Los datos superan la longitud permitida.");
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        exit("El correo electrónico no es válido.");
    }

    
    if ($password !== $confirmar_password) {
        $_SESSION["error_edicion"] = "Las contraseñas no coinciden.";
        header("Location: editar.php?id=" . urlencode((string) $id));
        exit();
    }

    // Validar longitud de la nueva contraseña
    if ($password !== "" && strlen($password) < 8) {
        $_SESSION["error_edicion"] = "La contraseña debe tener al menos 8 caracteres.";
        header("Location: editar.php?id=" . urlencode((string) $id));
        exit();
    }

    $conexion = conectar();

    // Actualizar datos
    if ($password !== "") {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios
                SET nombre = ?, correo = ?, password = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conexion, $sql);

        mysqli_stmt_bind_param(
            $stmt, "sssi", $nombre, $correo, $hash, $id
        );

    } else {

        $sql = "UPDATE usuarios
                SET nombre = ?, correo = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conexion, $sql);

        mysqli_stmt_bind_param(
            $stmt, "ssi", $nombre, $correo, $id
        );

    }

    // Ejecutar la actualización
    if (mysqli_stmt_execute($stmt)) {

        $_SESSION["mensaje_edicion"] = "¡Usuario actualizado correctamente!";

    } else {

        if (mysqli_stmt_errno($stmt) == 1062) {
            $_SESSION["error_edicion"] = "Ese correo ya está registrado por otro usuario.";
        } else {
            $_SESSION["error_edicion"] = "Ocurrió un error al actualizar el usuario.";
        }

    }

    // Cerrar la consulta y la conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    // Regresar al formulario del usuario editado
    header("Location: editar.php?id=" . urlencode((string) $id));
    exit();
?>
