<?php
    session_start();
    require_once "../config/conexion.php";

    // Verificar que el formulario se envió mediante POST
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        exit("Acceso no permitido.");
    }

    // Recuperar los datos del formulario
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmar = $_POST["confirmar_password"] ?? "";

    // Validar los campos
    if ($nombre == "" || $correo == "" ||
        $password == "" || $confirmar == "") {

        $_SESSION["error_registro"] = "Todos los campos son obligatorios.";
        header("Location: ../registro.php");
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        $_SESSION["error_registro"] = "El correo electrónico no es válido.";
        header("Location: ../registro.php");
        exit();
    }

    if (strlen($password) < 8) {

        $_SESSION["error_registro"] = "La contraseña debe tener al menos 8 caracteres.";
        header("Location: ../registro.php");
        exit();
    }

    if ($password !== $confirmar) {

        $_SESSION["error_registro"] = "Las contraseñas no coinciden.";
        header("Location: ../registro.php");
        exit();
    }

    // Conectar con MySQL
    $conexion = conectar();

    // Comprobar si el correo ya existe
    $sql = "SELECT id FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        $_SESSION["error_registro"] = "Este correo electrónico ya está registrado.";

        header("Location: ../registro.php");
        exit();
    }

    mysqli_stmt_close($stmt);

    // Proteger la contraseña
    $password_segura = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    // Insertar el usuario
    $sql = "INSERT INTO usuarios (nombre, correo, password)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $nombre,
        $correo,
        $password_segura
    );

    if (mysqli_stmt_execute($stmt)) {

    $_SESSION["mensaje_registro"] = "¡Registro exitoso! Tu cuenta fue creada correctamente.";

    } else {

        $_SESSION["error_registro"] = "Ocurrió un error al registrar el usuario.";

    }

    // Cerrar la consulta y la conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    // Regresar al formulario de registro
    header("Location: ../registro.php");
    exit();
?>
