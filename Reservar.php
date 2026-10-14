<?php 
require("./backend/conexion.php");
require("./backend/SeguridadU.php");

$id_Paq = $_GET['paq'];

$consultaP = "SELECT pq.*, o.precio_oferta FROM paquetes pq LEFT JOIN ofertas o ON o.id_paquete = pq.id_paquete WHERE pq.id_paquete = $id_Paq";

  $resulta2 = mysqli_query($conectar, $consultaP);
  $paqueteP = mysqli_fetch_assoc($resulta2);

  $precio_final = $paqueteP['precio_base'];
  $es_oferta = false;
  if ($paqueteP['oferta'] == 1 && $paqueteP['precio_oferta'] > 0) {
      $precio_final = $paqueteP['precio_oferta'];
      $es_oferta = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/GEO.ico" type="image/x-icon">
  <title>RESERVAR</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <?php 
  include("./components/header.php");
  ?>

  <main class="fondoPart">
    <div class="CardReserva ancho">
      <h1 class="TitleModule">Finalizar Reserva</h1>
      <p class="reservaTitulo">Paquete: <?php echo $paqueteP['titulo']?></p>
      <?php if($es_oferta): ?>
        <p class="precioTachadoG"><?php echo number_format($paqueteP['precio_base'], 2); ?></p>
        <p class="precioFinalG Resaltado" id="precioF" data-precio-unitario="<?php echo $precio_final; ?>" ><?php echo number_format($precio_final, 2); ?></p>
      <?php else: ?>
        <p class="precioFinalG" id="precioF" data-precio-unitario="<?php echo $precio_final; ?>" ><?php echo number_format($precio_final, 2); ?></p>
      <?php endif; ?>

      <form action="./backend/procReserv.php" method="post" enctype="multipart/form-data" id="formReserv">
        <input type="hidden" name="id_paquete" value="<?php echo $id_Paq?>">
        <input type="hidden" name="monto_total_input" id="monto_total_input">

        <fieldset class="reservaFieldset">
                <legend>Cantidad de Personas</legend>
                <div class="groupReserva">
                    <label for="personas">Personas a Reservar:</label>
                    <input type="number" id="personas" name="cantidad_personas" min="1" value="1">
                </div>
                
                <div class="finalDisplay">
                    <p>Monto Total Estimado:</p>
                    <h2 class="precioFinalG">$<span id="monto_total"></span></h2>
                </div>
            </fieldset>
            <br>

            <fieldset class="reservaFieldset" id="seccionPago">
                <legend>2. Seleccionar Método de Pago</legend>
                <p class="alerta" id="Alert1"></p>
                <label for="metodoPago">Método de Pago:</label>
                <select id="metodoPago" name="metodoPago">
                    <option value="">Seleccione el Método</option>
                    <option value="Transferencia">Depósito / Transferencia Bancaria</option>
                    <option value="Tarjeta">Pago con Tarjeta</option>
                </select>
            </fieldset>
            <br>
            <fieldset class="reservaFieldset" id="seccionDeposito">
                <legend>3. Detalles de Depósito y Comprobante</legend>

                <div class="disenoTarjeta" id="disenoTarjeta">
                    <?php include("./components/disenoTarjeta.php");?>
                </div>
                
                <p class="alertaComp">Importante: Adjunte el comprobante de la transferencia en formato PDF.</p>

                <p class="alerta" id="Alert2"></p>
                <label for="comprobante">Adjuntar Comprobante (SOLO PDF):</label>
                <input type="file" id="comprobante" name="comprobantePdf" accept="application/pdf">
                
            </fieldset>

            <button type="submit" name="submit_reserva" class="btn-add" id="btn-finalizar">Finalizar Reserva y Subir Comprobante</button>
      </form>
    </div>
    
  </main>

  <?php 
  include("./components/footer.php");
  ?>
  <script src="./js/mostrarPago.js"></script>
  <script src="./js/validacion6.js"></script>
</body>
</html>