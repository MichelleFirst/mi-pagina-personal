function actualizarFechaHora() {
    const ahora = new Date();
    
    const opcionesFecha = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    
    const fechaFormateada = ahora.toLocaleDateString('es-ES', opcionesFecha);
    
    const horas = String(ahora.getHours()).padStart(2, '0');
    const minutos = String(ahora.getMinutes()).padStart(2, '0');
    const segundos = String(ahora.getSeconds()).padStart(2, '0');
    
    const contenedor = document.getElementById('fecha-hora');
    if (contenedor) {
        contenedor.innerHTML = `<p>Hoy es: ${fechaFormateada}</p>
                                <p>Hora actual:${horas}:${minutos}:${segundos}</p>`;
    }
}

// Ejecutar cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", () => {
    setInterval(actualizarFechaHora, 1000);
    actualizarFechaHora();
});