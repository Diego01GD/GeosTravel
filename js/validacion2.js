document.addEventListener("DOMContentLoaded", () =>{
  document
    .getElementById("formPais")
    .addEventListener("submit", function (e) {

      function validarForm() {

        limpiarAlertas();

        let NombrePais = document.getElementById("Pais").value.trim();
        

        if (NombrePais === "") {
          let alert1 = document.getElementById("Alert1");
          alert1.innerText = "Por favor ingresa un nombre.";
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



