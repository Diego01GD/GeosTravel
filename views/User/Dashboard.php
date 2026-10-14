<?php 
require("../../backend/SeguridadU.php")
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

  <div class="contSect">
    <aside class="aside">
      <?php 
      include("../../components/navbar2.php");
      ?>
    </aside>

    <main class="main">

      <h1 class="TitleModule">Gestion de Reservas</h1>

      <div class="vInfPs100">
        <h3>Información Reservas</h3>

        <table class="tablaInf">
            <tr>
              <th>ID Reserva</th>
              <th>Nombre Paquete</th>
              <th>Cantidad de Personas</th>
              <th>Metodo de Pago</th>
              <th>Monto Total</th>

            </tr>

            <?php 
              require('../../backend/conexion.php');
              
              $todas_reservas = "SELECT 
                  r.id_reserva, 
                  p.titulo AS nombre_paquete, 
                  r.cantidad_personas, 
                  r.metodo_pago,
                  r.monto_total,
                  r.comprobante_url
              FROM 
                  reservaciones r
              INNER JOIN 
                  paquetes p ON p.id_paquete = r.id_paquete
              ORDER BY 
                  r.id_reserva DESC";

              $resultado = mysqli_query($conectar, $todas_reservas);

              while($fila = mysqli_fetch_assoc($resultado)){
          ?>

          <tr>
            <td><?php echo $fila['id_reserva']?></td>
            <td><?php echo $fila['nombre_paquete']?></td>
            <td><?php echo $fila['cantidad_personas']?></td>
            <td><?php echo $fila['metodo_pago']?></td>
            <td><?php echo number_format($fila['monto_total'], 2);?></td>
          </tr>
          
          <?php 
            }
          ?>

            
        </table>
          
      </div>
      
    </main>
  </div>
  <script src="../../js/script.js"></script>
  <script src="../../js/ocultar2.js"></script>
  <script src="../../js/validacion4.js"></script>
</body>
</html>