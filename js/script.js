function validar(url){
  var eliminar = confirm("Desea ELIMINAR el siguiente registro?");
  if(eliminar == true){
    window.location = url;
  }
};

document.addEventListener("DOMContentLoaded", function(){
  let btnElimPaq = document.querySelectorAll(".eliminarPaq");
  let btnElimPais = document.querySelectorAll(".eliminarPais");
  let btnElimCd = document.querySelectorAll(".eliminarCiudad");
  let btnElimUsr = document.querySelectorAll(".eliminarUsr");
  let btnElimRes = document.querySelectorAll(".eliminarRser");

  btnElimPaq.forEach(function(btn) {
    btn.addEventListener("click", function(event){
      event.preventDefault();

      let idRegistro = this.getAttribute('data-id');
      let url = "../backend/EliminarPaquete.php?id=" + idRegistro;

      validar(url);
    });
  });

  btnElimPais.forEach(function(btn) {
    btn.addEventListener("click", function(event){
      event.preventDefault();

      let idRegistro = this.getAttribute('data-id');
      let url = "../backend/EliminarPais.php?id=" + idRegistro;

      validar(url);
    });
  });

  btnElimCd.forEach(function(btn) {
    btn.addEventListener("click", function(event){
      event.preventDefault();

      let idRegistro = this.getAttribute('data-id');
      let url = "../backend/EliminarCiudad.php?id=" + idRegistro;

      validar(url);
    });
  });

  btnElimUsr.forEach(function(btn) {
    btn.addEventListener("click", function(event){
      event.preventDefault();

      let idRegistro = this.getAttribute('data-id');
      let url = "../../backend/EliminarUsuario.php?id=" + idRegistro;

      validar(url);
    });
  });

  btnElimRes.forEach(function(btn) {
    btn.addEventListener("click", function(event){
      event.preventDefault();

      let idRegistro = this.getAttribute('data-id');
      let url = "../backend/EliminarReservacion.php?id=" + idRegistro;

      validar(url);
    });
  });
});
