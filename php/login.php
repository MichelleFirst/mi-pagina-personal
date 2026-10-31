<?php
    session_start();

    require_once "../config/conexion.php";

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: ../login.php");
        exit();
    }

    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["password"] ?? "";

    // Comprobar que los campos no estén vacíos
    if ($correo == "" || $password == "") {
        $_SESSION["error_login"] = "Completa todos los campos.";

        header("Location: ../login.php");
        exit();
    }

    $conexion = conectar();

    $sql = "SELECT id, nombre, correo, password, rol
            FROM usuarios
            WHERE correo = ?";

    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    $usuario = mysqli_fetch_assoc($resultado);

    // Verificar que el usuario exista y la contraseña sea correcta
    if ($usuario && password_verify($password, $usuario["password"])) {

        session_regenerate_id(true);

        $_SESSION["id"] = $usuario["id"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["rol"] = $usuario["rol"];

        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        header("Location: ../index.php");
        exit();

    } else {

        $_SESSION["error_login"] =
            "Correo o contraseña incorrectos. Verifica tus datos.";

        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        header("Location: ../login.php");
        exit();
    }
?>
