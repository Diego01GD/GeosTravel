document
  .getElementById("HabilitarOferta")
  .addEventListener("change", function () {
    var campos = document.getElementById("oferta");
    if (this.checked) {
      campos.style.display = "block";
    } else {
      campos.style.display = "none";
    }
  });
