const btnPaquete = document.getElementById("nuevoPaquete");
const formPaquete = document.getElementById("formPaquete");

function toggleForm(formElement) {
  if (
    formElement.style.display === "none" ||
    formElement.style.display === ""
  ) {
    formElement.style.display = "block";
  } else {
    formElement.style.display = "none";
  }
}

btnPaquete.addEventListener("click", () => {
  toggleForm(formPaquete);
});
