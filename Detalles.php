<?php 
  require("./backend/conexion.php");
  $idPaq = $_GET['id'];

  $consulta = "SELECT pq.*, cd.nombre_ciudad AS nombre_ciudad_destino, pd.nombre_pais AS nombre_pais_destino, co.nombre_ciudad AS nombre_ciudad_origen, po.nombre_pais AS nombre_pais_origen, o.precio_oferta, g.url_imagen AS imagen_principal FROM paquetes pq INNER JOIN ciudades cd ON cd.id_ciudad = pq.id_ciudad_destino INNER JOIN paises pd ON pd.id_pais = pq.id_pais_destino INNER JOIN ciudades co ON co.id_ciudad = pq.id_ciudad_origen INNER JOIN paises po ON po.id_pais = pq.id_pais_origen LEFT JOIN ofertas o ON o.id_paquete = pq.id_paquete LEFT JOIN galeria g ON g.id_paquete = pq.id_paquete AND g.orden = 2 WHERE pq.id_paquete = $idPaq";

  $resultado = mysqli_query($conectar, $consulta);
  $paqueteR = mysqli_fetch_assoc($resultado);


  $consultaG = "SELECT url_imagen FROM galeria WHERE id_paquete = $idPaq ORDER BY orden ASC";

  $resultadoG = mysqli_query($conectar, $consultaG);

  $precio_final = $paqueteR['precio_base'];
  $es_oferta = false;
  if ($paqueteR['oferta'] == 1 && $paqueteR['precio_oferta'] > 0) {
      $precio_final = $paqueteR['precio_oferta'];
      $es_oferta = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/GEO.ico" type="image/x-icon">
  <title>DETALLES</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <?php 
  include("./components/header.php");
  ?>

  <main class="detallePaqueteMain">
    <div class="ancho">
      <div class="heroDetalle" style="background-image: url(<?php echo $paqueteR['imagen_principal']?>);" >
          <div class="alingTextD">
            <h1 class="TtDetalle"><?php echo $paqueteR['titulo']?></h1>
            <p class="destPaq">Destino: <?php echo $paqueteR['nombre_ciudad_destino'] . ", " . $paqueteR['nombre_pais_destino']?></p>
          </div>
      </div>

      <section class="infoReservaGrid">
        <div class="descPaq">
          <h2>Detalles del Viaje</h2>
          <p class="duracionD">Duración: <?php echo $paqueteR['duracion_dias']?> Días</p>
          <br>
          <h3>Resumen del Viaje</h3>
          <p><?php echo $paqueteR['descripcion']?></p>
          <br>
          <h3>Datos de Ubicacion</h3>
          <div class="flexDest">
            <div class="partD">
              <img src="./img/plane2.svg" alt="">
              <p class="labelMini">Ciudad de Salida</p>
              <p class="TextM"><?php echo $paqueteR['nombre_ciudad_origen']?></p>
              <br>
              <p class="labelMini">Pais de Salida</p>
              <p class="TextM"><?php echo $paqueteR['nombre_pais_origen']?></p>
            </div>
            <div class="partD">
              <img src="./img/rarrowA.svg" alt=">">
            </div>
            <div class="partD">
              <img src="./img/arrive.svg" alt="">
              <p class="labelMini">Ciudad de Destino</p>
              <p class="TextM"><?php echo $paqueteR['nombre_ciudad_destino']?></p>
              <br>
              <p class="labelMini">Pais de Destino</p>
              <p class="TextM"><?php echo $paqueteR['nombre_pais_destino']?></p>
            </div>
          </div>
        </div>

        <div class="reservar">
          <div class="reservarPrecios">
            <?php if($es_oferta): ?>
              <p class="precioEtiqueta">Precio de Oferta:</p>
              <p class="precioTachadoG"><?php echo number_format($paqueteR['precio_base'], 2); ?></p>
              <h2 class="precioFinalG Resaltado"><?php echo number_format($precio_final, 2); ?></h2>
            <?php else: ?>
              <p class="precioEtiqueta">Precio por Persona:</p>
              <h2 class="precioFinalG"><?php echo number_format($precio_final, 2); ?></h2>
            <?php endif; ?>  
          </div>

          <a href="Reservar.php?paq=<?php echo $idPaq ?>" class="btnReservar">Reservar Ahora</a>
        </div>
        
      </section>
    </div>
  </main>

  <?php 
  include("./components/footer.php");
  ?>
  
</body>
</html>