document.addEventListener("DOMContentLoaded", function() {

    const formulario = document.getElementById("registroForm");

    formulario.addEventListener("submit", function(event) {
        const password = document.getElementById("password").value;
        const confirmar = document.getElementById("confirmar").value;

        if (password !== confirmar) {

            event.preventDefault();

            alert("Las contraseñas no coinciden.");

            document.getElementById("confirmar").focus();
        }
    });
    
});
