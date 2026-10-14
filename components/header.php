<div class="cont-header">
  <header>
    <div class="ancho flexB">
      <div class="logo flexB">
        <img src="./img/GEO.svg" alt="G">
        <a href="index.php"><h2>geos travel</h2></a>
      </div>
    
      <div class="navegacion">
        <div class="links flexB">
          <a href="index.php">Inicio</a>
          <a href="Viajes.php">Viajes</a>
          <a href="Ofertas.php">Ofertas</a>
          <a href="Contacto.php">Contacto</a>
        </div>
      </div>
    
      <div class="sesion">
        <!-- <a href="Login.php"><strong>Login</strong></a> -->
         <?php 
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }

          if (isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == "SI") {
              $rol = $_SESSION['Rol'];
              
              if ($rol == 'ADMINISTRADOR') {
                  $dashboard_link = "./views/Admin/Dashboard.php";
                  $dashboard_text = "Dashboard";
              } else {
                  $dashboard_link = "./views/User/Dashboard.php";
                  $dashboard_text = "Dashboard";
              }
              ?>
              
              <a href="<?php echo $dashboard_link; ?>">
                  <strong><?php echo $dashboard_text; ?></strong>
              </a>
              
              <?php
              } else {
                  ?>
                  <a href="Login.php"><strong>Login</strong></a>
                  
                  <?php
              }
              ?>
      </div>
    </div>
  </header>
</div>