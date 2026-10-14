    const btnPais = document.getElementById('agregarPs');
    const formPais = document.getElementById('formPais');

    const btnCiudad = document.getElementById('agregarCd');
    const formCiudad = document.getElementById('formCiudad');

    const btnAUsuario = document.getElementById('agregarUsr');
    const formAUsuario = document.getElementById('formAUsuario');

    function toggleForm(formElement) {

      if (formElement.style.display === 'none' || formElement.style.display === '') {
        formElement.style.display = 'block';
      } else {
        formElement.style.display = 'none';
      }
    }

    btnPais.addEventListener('click', () => {
      toggleForm(formPais);
    });

    btnCiudad.addEventListener('click', () => {
      toggleForm(formCiudad);
    });