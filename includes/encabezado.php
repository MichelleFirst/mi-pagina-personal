<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<header>

    <?php if (isset($_SESSION["id"])): ?>
        <div class="barra-usuario">
            <span>
                Hola,
                <?php echo htmlspecialchars(
                    $_SESSION["nombre"],
                    ENT_QUOTES,
                    "UTF-8"
                ); ?>
            </span>
        </div>
    <?php endif; ?>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="autobiografia.php">Quién soy</a></li>
            <li><a href="galeria.php">Galería</a></li>
            <li><a href="convertidor.php">Convertidor</a></li>
            <li><a href="calculadora.php">Calculadora</a></li>
            <li><a href="cuestionario.php">Cuestionario</a></li>
            <li><a href="contacto.php">Contacto</a></li>

            <?php if (isset($_SESSION["id"])): ?>

                <?php if (($_SESSION["rol"] ?? "") === "admin"): ?>
                    <li>
                        <a href="php/lista.php">Gestionar usuarios</a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="php/cerrar_sesion.php">Cerrar sesión</a>
                </li>

            <?php else: ?>

                <li><a href="login.html">Iniciar sesión</a></li>
                <li><a href="registro.html">Registrarse</a></li>

            <?php endif; ?>
        </ul>
    </nav>

</header>