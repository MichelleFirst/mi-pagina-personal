<?php
    require_once "config/conexion.php";

    $conexion = conectar();

    echo "¡Conexión exitosa con la base de datos!";

    mysqli_close($conexion);
?>
