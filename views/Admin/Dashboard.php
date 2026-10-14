<?php 
require("../../backend/SeguridadAD.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/GEO.ico" type="image/x-icon">
  <title>DASHBOARD</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

    

  
    <main class="PanelAdmin">
      <h1>Bienvenido <?php echo $_SESSION['Usuario']?></h1>
      <div class="contOpt">
        <div class="CardPAd">
          <a href="GestPaq.php" class="cardPA">
            <div class="cardP">
              <div class="cTxt">
                <img src="../../img/package.svg" alt="Paquete">
                <p>Gestion de Paquetes</p>
              </div>
            </div>
          </a>
        </div>

        <div class="CardPAd">
          <a href="GestReserv.php" class="cardPA">
            <div class="cardP">
              <div class="cTxt">
                <img src="../../img/calendar.svg" alt="Reservacion">
                <p>Gestion de Reservaciones</p>
              </div>
            </div>
          </a>
        </div>

        <div class="CardPAd">
          <a href="GestDest.php" class="cardPA">
            <div class="cardP">
              <div class="cTxt">
                <img src="../../img/location.svg" alt="Destinos">
                <p>Gestion de Destinos</p>
              </div>
            </div>
          </a>
        </div>

        <div class="CardPAd">
          <a href="GestUsers.php" class="cardPA">
            <div class="cardP">
              <div class="cTxt">
                <img src="../../img/users.svg" alt="Usuarios">
                <p>Gestion de<br>Usuarios</p>
              </div>
            </div>
          </a>
        </div>

        <div class="CardPAd">
          <a href="../../backend/Logout.php" class="cardPA">
            <div class="cardP2">
              <div class="cTxt">
                <img src="../../img/logout.svg" alt="Logout">
                <p>Cerrar<br>Sesion</p>
              </div>
            </div>
          </a>
        </div>


      </div>
    </main>
  
  
</body>
</html>