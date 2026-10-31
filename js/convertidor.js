function convertirAPesos() {
    // Obtener los valores ingresados por el usuario
    const montoInput = document.getElementById('monto').value;
    const moneda = document.getElementById('moneda').value;
    const resultado = document.getElementById('resultado-conversion');

    const monto = parseFloat(montoInput);

    // Validar que el monto sea un número válido y mayor a 0
    if (isNaN(monto) || monto <= 0) {
        resultado.className = "error";
        resultado.textContent = 'Por favor, ingresa un monto válido mayor a 0.';
        return;
    }

    // Tasas de cambio (puedes ajustar los valores)
    const tasaUSD = 18.79; // 1 USD = 18.79 MXN
    const tasaEUR = 20.96; // 1 EUR = 20.96 MXN

    let totalMXN = 0;

    if (moneda === 'USD') {
        totalMXN = monto * tasaUSD;
    } else if (moneda === 'EUR') {
        totalMXN = monto * tasaEUR;
    }

    // Mostrar el resultado en el HTML
    resultado.className = "ok";
    resultado.textContent = `${monto} ${moneda} equivale a $${totalMXN.toFixed(2)} MXN`;
}

function limpiarConvertidor() {
    document.getElementById('monto').value = '';
    document.getElementById('resultado-conversion').textContent = '';
}