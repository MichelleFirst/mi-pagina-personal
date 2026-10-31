function cuadrado() {
    let numInput = document.getElementById("n1");
    let resultado = document.getElementById("resultado-cuadrado");
    let valor = parseFloat(numInput.value);

    // Validar que se haya ingresado un número válido
    if (isNaN(valor)) {
        resultado.className = "error";
        resultado.textContent = "Por favor, ingresa un número válido.";
        return;
    }

    // Calcular el cuadrado
    let total = valor * valor;

    // Mostrar el resultado en pantalla
    resultado.className = "ok";
    resultado.textContent = `El cuadrado de ${valor} es: ${total}`;
}

function vaciar() {
    document.getElementById("n1").value = "";
    document.getElementById("resultado-cuadrado").textContent = "";
}