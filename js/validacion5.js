document.addEventListener("DOMContentLoaded", () =>{
  document
    .getElementById("formNUsuario")
    .addEventListener("submit", function (e) {

      function validarForm() {

        limpiarAlertas();

        let NombreUsuario = document.getElementById("nombreNU").value.trim();
        let ApellidoUsuario = document.getElementById("apellidosNU").value.trim();
        let CorreoElect = document.getElementById("emailNU").value.trim();
        let Contrasena = document.getElementById("passwordNU").value.trim();
        

        if (NombreUsuario === "") {
          let alert1 = document.getElementById("Alert1");
          alert1.innerText = "Por favor ingresa un nombre de Usuario.";
          return false;
        }
        if (ApellidoUsuario === "") {
          let alert1 = document.getElementById("Alert2");
          alert1.innerText = "Por favor ingresa los apellidos del Usuario.";
          return false;
        }
        if (CorreoElect === "") {
          let alert1 = document.getElementById("Alert3");
          alert1.innerText = "Por favor ingresa un Correo Electronico.";
          return false;
        }
        if (Contrasena === "") {
          let alert1 = document.getElementById("Alert4");
          alert1.innerText = "Por favor ingresa una Contraseña.";
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



