<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/GEO.ico" type="image/x-icon">
  <title>VIAJES</title>
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

    <div class="fondoPart viajes">
      <h1 class="TitleModule"> Encuentre Su Viaje</h1>

      <div class="gridPaq">

        <?php 
        require("./backend/conexion.php");
        
        $todos = "SELECT pq.id_paquete, pq.titulo, pq.duracion_dias, pq.precio_base, pq.oferta, o.precio_oferta, cd.nombre_ciudad AS nombre_ciudad_destino, pd.nombre_pais AS nombre_pais_destino, co.nombre_ciudad AS nombre_ciudad_origen, po.nombre_pais AS nombre_pais_origen, g.url_imagen AS imagen_principal FROM paquetes pq INNER JOIN ciudades cd ON cd.id_ciudad = pq. id_ciudad_destino INNER JOIN paises pd ON pd.id_pais = pq.id_pais_destino INNER JOIN ciudades co ON co.id_ciudad = pq.id_ciudad_origen INNER JOIN paises po ON po.id_pais = pq.id_pais_origen LEFT JOIN ofertas o ON o.id_paquete = pq.id_paquete LEFT JOIN galeria g ON g.id_paquete = pq.id_paquete AND g.orden = 1 ORDER BY pq.id_paquete DESC";

        $resultado = mysqli_query($conectar, $todos);

        while ($paq = mysqli_fetch_assoc($resultado)):
          $precio_final = $paq['precio_base'];
          $es_oferta = false;
          if($paq['oferta'] == 1 && $paq['precio_oferta'] > 0) {
              $precio_final = $paq['precio_oferta'];
              $es_oferta = true;
          }
        ?>

            <div class="paquete <?php echo $es_oferta ? 'paqueteOferta' : ''; ?>">
              <div class="paqueteImg">
                <img src="<?php echo $paq['imagen_principal']?>" alt="">
              </div>

              <div class="paqueteInfo">
                <h3 class="paqueteTitulo"><?php echo $paq['titulo']?></h3>

                <div class="lados flexB">
                  <div class="lado">
                    <p class="pais negritas"><?php echo $paq['nombre_ciudad_origen']?></p>
                    <p><?php echo $paq['nombre_pais_origen']?></p>
                  </div>
                  <p class="flecha">></p>
                  <div class="lado">
                    <p class="pais negritas"><?php echo $paq['nombre_ciudad_destino']?></p>
                    <p><?php echo $paq['nombre_pais_destino']?></p>
                  </div>
                </div>

                <p class="duracion"><?php echo $paq['duracion_dias']?> Días de Aventura</p>

                <div class="preciosDisplay">
                    <?php if ($es_oferta): ?>
                        <p class="precioTachado">$<?php echo number_format($paq['precio_base'], 2); ?></p>
                        <p class="precioFinal Resaltado">$<?php echo number_format($precio_final, 2); ?></p>
                    <?php else: ?>
                        <p class="precioFinal">$<?php echo number_format($precio_final, 2); ?></p>
                    <?php endif; ?>
                </div>

                <a href="Detalles.php?id=<?php echo $paq['id_paquete']?>" class="detalles btn-detalles">Ver Detalles</a>

              </div>

            </div>

        <?php 
        endwhile;
        ?>

      </div>
    </div>
    
  </main>

  <?php 
  include("./components/footer.php");
  ?>
  
</body>
</html>