document.addEventListener("DOMContentLoaded", () =>{
  document
    .getElementById("FormCont")
    .addEventListener("submit", function (e) {
      if (!validarForm()) {
        e.preventDefault();
      }
    });
});

function limpiarAlertas(){
  const alerts = document.querySelectorAll(".alerta");
  alerts.forEach((a) => (a.innerText = ""));
}

function validarForm() {

  limpiarAlertas();

  let Email = document.getElementById("email").value.trim();
  let Mensaje = document.getElementById("message").value.trim();
  

  if (Email === "") {
    let alert1 = document.getElementById("alert1");
    alert1.innerText = "Por favor ingresa un Correo Electronico.";
    return false;
  }
  if (Mensaje == "") {
    let alert3 = document.getElementById("alert2");
    alert3.innerText = "Por favor escribe un mensaje.";
    return false;
  }
  return true;
}
