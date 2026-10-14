<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/GEO.ico" type="image/x-icon">
  <title>INICIAR SESION</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <main>
    <div class="loginMain">
      <form action="./backend/loguear.php" class="logForm" id="logForm" method="post">
        <div class="formTt">
          <p>Iniciar Sesion</p>
        </div>
        <div class="inptGroup">
          <label for="email" class="lblF">Correo</label>
          <input type="email" id="email" name="email" placeholder="Ingresa tu correo">
        </div>

        <div class="inptGroup">
          <label for="password" class="lblF">Contraseña</label>
          <input type="text" id="password" name="password" placeholder="Ingresa tu Contraseña">
        </div>

        <button class="submit" type="submit">Iniciar Sesion</button>
        <div class="registrarLink">
          Aun no tienes una Cuenta?<a href="Registrarse.php">Registrarse</a>
        </div>

        <button class="submit" type="button" id="Return2">Regresar</button>
      </form>
    </div>
  </main>
  <script src="./js/Return2.js"></script>
</body>
</html>