document.addEventListener("DOMContentLoaded", () =>{
  document
    .getElementById("formCiudad")
    .addEventListener("submit", function (e) {

      function validarForm() {

        limpiarAlertas();

        let NombreCiudad = document.getElementById("Ciudad").value.trim();
        let IdPais = document.getElementById("idPais").value.trim();
        

        if (NombreCiudad === "") {
          let alert2 = document.getElementById("Alert2");
          alert2.innerText = "Por favor ingresa un nombre.";
          return false;
        }

        if (IdPais === "") {
          let alert3 = document.getElementById("Alert3");
          alert3.innerText = "Por favor selecciona un Pais.";
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


