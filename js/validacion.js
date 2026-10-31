function validarFormulario(event) {
    var resultado = document.getElementById('mensaje-resultado');
    var errores = [];

    // 1. Validar Nombre y Apellidos
    var nombre = document.getElementById('nombre').value.trim();
    var apellidos = document.getElementById('apellidos').value.trim();
    if (nombre === '' || apellidos === '') {
        errores.push("Por favor, llena el nombre y los apellidos.");
    }

    // 2. Validar Género (Radio Buttons)
    var generoM = document.getElementById('radio1');
    var generoF = document.getElementById('radio2');
    if (!generoM.checked && !generoF.checked) {
        errores.push("Selecciona tu género.");
    }

    // 3. Validar Intereses (CheckBox)
    var deporte = document.getElementById('deporte').checked;
    var tv = document.getElementById('tv').checked;
    var ejercicio = document.getElementById('ejercicio').checked;
    if (!deporte && !tv && !ejercicio) {
        errores.push("Selecciona al menos un interés.");
    }

    // 4. Validar Estudios Actuales (Select)
    var estudios = document.getElementById('estudios').value;
    if (estudios === "") {
        errores.push("Selecciona tu nivel de estudios actuales.");
    }

    // 5. Validar Navegador Usado (Datalist)
    var buscador = document.getElementById('buscador').value.trim();
    if (buscador === "") {
        errores.push("Escribe o selecciona el buscador utilizado.");
    }

    // Si existen errores, se detiene el envío y se muestran todos
    if (errores.length > 0) {
        event.preventDefault(); // Detener el envío
        
        var mensajeHTML = "<div class='error'>";
        mensajeHTML += "<p>Por favor corrige los siguientes campos:</p><ul>";
        
        for (var i = 0; i < errores.length; i++) {
            mensajeHTML += "<li>" + errores[i] + "</li>";
        }
        
        mensajeHTML += "</ul></div>";
        resultado.innerHTML = mensajeHTML; // Mostrar lista de errores
        return false;
    }

    // Si no hay errores, se aprueba el envío
    event.preventDefault(); // Evita recargar la página para visualizar el éxito
    resultado.innerHTML = "<span class='ok'>¡Formulario validado con éxito! Enviando información...</span>";
    return false;
}

// Limpiar: vacía todos los campos del formulario y quita el mensaje
function limpiarFormulario() {
    document.getElementById('formulario').reset();
    document.getElementById('mensaje-resultado').innerHTML = "";
}
