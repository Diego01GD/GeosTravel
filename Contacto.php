<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/GEO.ico" type="image/x-icon">
  <title>CONTACTO</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <?php 
  include("./components/header.php");
  ?>

  <main>

    <div class="fondoPart">

      <h2 class="tituloCont">Contactanos</h2>

      <div class="conLados flexB">
        <div class="conLado">
  
          <div class="card">
            <span class="titleForm">Dejanos un Comentario</span>
            <form class="formCont" action="https://formspree.io/f/manrpwzn" method="post" id="FormCont">
              <div class="grupoCont">
                <input placeholder="‎" type="text" name="name" id="name">
                <label for="name">Nombre</label>
              </div>
              <div class="grupoCont">
                <p class="alerta" id="alert1"></p>
                <input placeholder="‎" type="email" id="email" name="email">
                <label for="email">Correo *</label>
              </div>
              <div class="grupoCont">
                <p class="alerta" id="alert2"></p>
                <textarea placeholder="‎" id="message" name="message" rows="5"></textarea>
                <label for="message">Comentario *</label>
              </div>
              <button type="submit">Enviar</button>
            </form>
          </div>
  
        </div>
  
        <div class="conLado">

          <div class="tituloUbi">
            <h3 class="subtituloCont">Nos Encontramos Aqui</h3>
            <img src="./img/darrow.svg" alt="v">
          </div>
  
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.26712778910377!2d-89.61167641882905!3d21.008481757899222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56774cf4453b91%3A0x22ef0681f2e166bf!2sBeatriz%20Achach!5e0!3m2!1ses-419!2smx!4v1765310416315!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
        </div>
      </div>
    </div>
    
  </main>

  <?php 
  include("./components/footer.php");
  ?>
  
  <script src="./js/validacion.js"></script>
</body>
</html>