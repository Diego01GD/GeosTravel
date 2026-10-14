document.addEventListener("DOMContentLoaded", () =>{
  document
    .getElementById("formPaquete")
    .addEventListener("submit", function (e) {

      function validarForm() {

        limpiarAlertas();

        let NombrePaquete = document.getElementById("nombrePaq").value.trim();
        let DescripcionP = document.getElementById("DescripcionP").value.trim();
        let DuracionDias = document.getElementById("DuracionDias").value.trim();
        let PrecioPP = document.getElementById("PrecioPP").value.trim();
        let idPaisOrg = document.getElementById("idPaisOrg").value.trim();
        let idPaisDest = document.getElementById("idPaisDest").value.trim();
        let idCiudadOrg = document.getElementById("idCiudadOrg").value.trim();
        let idCiudadDest = document.getElementById("idCiudadDest").value.trim();
        let FotosP = document.getElementById("FotosP").value.trim();
        

        if (NombrePaquete === "") {
          let alert1 = document.getElementById("Alert1");
          alert1.innerText = "Por favor ingresa un nombre para el Paquete.";
          return false;
        }
        if (DescripcionP === "") {
          let alert2 = document.getElementById("Alert2");
          alert2.innerText = "Por favor ingresa una descripcion para el Paquete.";
          return false;
        }
        if (DuracionDias === "") {
          let alert3 = document.getElementById("Alert3");
          alert3.innerText = "Por favor ingresa la duracion.";
          return false;
        }
        if (PrecioPP === "") {
          let alert4 = document.getElementById("Alert4");
          alert4.innerText = "Por favor ingresa un Precio.";
          return false;
        }
        if (idPaisOrg === "") {
          let alert5 = document.getElementById("Alert5");
          alert5.innerText = "Por favor Selecciona un pais de Origen.";
          return false;
        }
        if (idPaisDest === "") {
          let alert6 = document.getElementById("Alert6");
          alert6.innerText = "Por favor Selecciona un pais de Destino.";
          return false;
        }
        if (idCiudadOrg === "") {
          let alert7 = document.getElementById("Alert7");
          alert7.innerText = "Por favor Selecciona una ciudad de Origen.";
          return false;
        }
        if (idCiudadDest === "") {
          let alert8 = document.getElementById("Alert8");
          alert8.innerText = "Por favor Selecciona una ciudad de Destino.";
          return false;
        }
        if (FotosP === "") {
          let alert9 = document.getElementById("Alert9");
          alert9.innerText = "Por favor Selecciona imagenes para el Paquete.";
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



