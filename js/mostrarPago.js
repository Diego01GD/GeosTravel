document.addEventListener("DOMContentLoaded", function() {
    const inputPersonas = document.getElementById('personas');
    const precioUnitarioElemento = document.getElementById('precioF');
    const precioUnitario = parseFloat(precioUnitarioElemento.getAttribute('data-precio-unitario'));
    const montoTotalDisplay = document.getElementById('monto_total'); 
    const montoTotalInput = document.getElementById('monto_total_input'); 
    const seccionPago = document.getElementById('seccionPago'); 
    const metodoPagoSelect = document.getElementById('metodoPago'); 
    const seccionDeposito = document.getElementById('seccionDeposito'); 
    const seccionDatos = document.getElementById('disenoTarjeta');

    function actualizarMonto() {
        const cantidad = parseInt(inputPersonas.value) || 0;
        const total = cantidad * precioUnitario;
        
 
        montoTotalDisplay.textContent = total.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        montoTotalInput.value = total.toFixed(2);
        
        if (cantidad > 0) {
            seccionPago.style.display = 'block';
        } else {
            seccionPago.style.display = 'none';
        }
    }

    inputPersonas.addEventListener('input', actualizarMonto);
    

    metodoPagoSelect.addEventListener('change', function() {
        const metodo = metodoPagoSelect.value;
        
        seccionDeposito.style.display = 'none';

        if (metodo === 'Transferencia') {
            seccionDeposito.style.display = 'block';
            seccionDatos.style.display = 'block';
            document.getElementById('comprobante');
        } else if (metodo === 'Tarjeta') {
            seccionDeposito.style.display = 'block';
            seccionDatos.style.display = 'none';
        }
    });

    actualizarMonto();
});