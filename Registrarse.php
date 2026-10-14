<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/GEO.ico" type="image/x-icon">
  <title>REGISTRARSE</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <main>
    <div class="loginMain">
      <form action="./backend/registrar.php" class="logForm" id="formNUsuario" method="post">
        <div class="formTt">
          <p>Registrarse</p>
        </div>

        <div class="inptGroup">
          <label for="nombreNU" class="lblF">Nombre</label>
          <input type="text" id="nombreNU" name="nombreNU" placeholder="Ingresa tu nombre">
          <p class="alerta" id="Alert1"></p>
        </div>

        <div class="inptGroup">
          <label for="apellidosNU" class="lblF">Apellidos</label>
          <input type="text" id="apellidosNU" name="apellidosNU" placeholder="Ingresas tus apellidos">
          <p class="alerta" id="Alert2"></p>
        </div>

        <div class="inptGroup">
          <label for="emailNU" class="lblF">Correo</label>
          <input type="email" id="emailNU" name="emailNU" placeholder="Ingresa tu correo">
          <p class="alerta" id="Alert3"></p>
        </div>

        <div class="inptGroup">
          <label for="passwordNU" class="lblF">Contraseña</label>
          <input type="text" id="passwordNU" name="passwordNU" placeholder="Ingresa tu Contraseña">
          <p class="alerta" id="Alert4"></p>
        </div>

        <button class="submit" type="submit">Registrarse</button>
        <button type="button" class="submit" id="Return">Regresar</button>
      </form>
    </div>
  </main>
  <script src="./js/Return.js"></script>
  <script src="./js/validacion5.js"></script>
</body>
</html>