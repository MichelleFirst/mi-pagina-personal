
document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formulario-usuario");

    if (!formulario) return;

    formulario.addEventListener("submit", function (evento) {
        const nombre = formulario.querySelector('[name="nombre"]');
        const correo = formulario.querySelector('[name="correo"]');
        const password = formulario.querySelector('[name="password"]');
        const confirmar = formulario.querySelector('[name="confirmar_password"]');

        if (nombre && nombre.value.trim() === "") {
            evento.preventDefault();
            alert("Ingresa tu nombre.");
            nombre.focus();
            return;
        }

        if (correo && !correo.validity.valid) {
            evento.preventDefault();
            alert("Ingresa un correo electrónico válido.");
            correo.focus();
            return;
        }

        if (password && confirmar) {
            if (password.value !== confirmar.value) {
                evento.preventDefault();
                alert("Las contraseñas no coinciden.");
                confirmar.focus();
                return;
            }

            // En edición, dejar ambos campos vacíos
            // significa conservar la contraseña actual.
            if (password.value !== "" && password.value.length < 8) {
                evento.preventDefault();
                alert("La contraseña debe tener al menos 8 caracteres.");
                password.focus();
                return;
            }
        }
    });
});
