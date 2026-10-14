 const btnAUsuario = document.getElementById('agregarUsr');
    const formAUsuario = document.getElementById('formAUsuario');

    function toggleForm(formElement) {

      if (formElement.style.display === 'none' || formElement.style.display === '') {
        formElement.style.display = 'block';
      } else {
        formElement.style.display = 'none';
      }
    }

    btnAUsuario.addEventListener('click', () => {
      toggleForm(formAUsuario);
    });

  