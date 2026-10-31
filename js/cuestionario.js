// Pregunta 1
function res1() {
    var respuesta = document.getElementById('respuesta1').value.trim().toLowerCase();
    var resultado = document.getElementById('resultado1');

    if (respuesta === "html") {
        resultado.innerHTML = "<span class='correcto'>Correcto</span>";
    } else {
        resultado.innerHTML = "<span class='incorrecto'>No es correcto</span>";
    }
}

// Pregunta 2
function res2() {
    var respuesta = document.getElementById('respuesta2').value.trim().toLowerCase();
    var resultado = document.getElementById('resultado2');

    if (respuesta === "css") {
        resultado.innerHTML = "<span class='correcto'>Correcto</span>";
    } else {
        resultado.innerHTML = "<span class='incorrecto'>No es correcto</span>";
    }
}

// Pregunta 3
function res3() {
    var respuesta = document.getElementById('respuesta3').value.trim().toLowerCase();
    var resultado = document.getElementById('resultado3');

    if (respuesta === "javascript" || respuesta === "js") {
        resultado.innerHTML = "<span class='correcto'>Correcto</span>";
    } else {
        resultado.innerHTML = "<span class='incorrecto'>No es correcto</span>";
    }
}

// Pregunta 4: Opción Múltiple
function res4() {
    var lista = document.getElementById('respuesta4');
    var resultado = document.getElementById('resultado4');

    if (lista.value === "1995") {
        resultado.innerHTML = "<span class='correcto'>Correcto</span>";
    } else if (lista.value === "") {
        resultado.innerHTML = "<span class='aviso'>Por favor, selecciona una respuesta</span>";
    } else {
        resultado.innerHTML = "<span class='incorrecto'>No es correcto</span>";
    }
}

// Pregunta 5: Opción Múltiple 
function res5() {
    var lista = document.getElementById('respuesta5');
    var resultado = document.getElementById('resultado5');

    if (lista.value === "innerHTML") {
        resultado.innerHTML = "<span class='correcto'>Correcto</span>";
    } else if (lista.value === "") {
        resultado.innerHTML = "<span class='aviso'>Por favor, selecciona una respuesta</span>";
    } else {
        resultado.innerHTML = "<span class='incorrecto'>No es correcto</span>";
    }
}

// Limpiar: borra las respuestas y los mensajes de las 5 preguntas
function limpiarCuestionario() {
    for (var i = 1; i <= 5; i++) {
        document.getElementById('respuesta' + i).value = "";
        document.getElementById('resultado' + i).innerHTML = "";
    }
}
