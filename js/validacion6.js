document.addEventListener("DOMContentLoaded", () =>{
  document
    .getElementById("formReserv")
    .addEventListener("submit", function (e) {

      function validarForm() {

        limpiarAlertas();

        let metodoPago = document.getElementById("metodoPago").value.trim();
        let Comprobante = document.getElementById("comprobante").value.trim();
        

        if (metodoPago === "") {
          let alert1 = document.getElementById("Alert1");
          alert1.innerText = "Por favor selecciona un metodo de Pago.";
          return false;
        }
        if (Comprobante === "") {
          let alert1 = document.getElementById("Alert2");
          alert1.innerText = "Por favor adjunta el comprobante de pago.";
          return false;
        }
        return true;
      }


      if (!validarForm()) {
        e.preventDefault();
      }
    });
});

function limpiarAlertas(){
  const alerts = document.querySelectorAll(".alerta");
  alerts.forEach((a) => (a.innerText = ""));
}



