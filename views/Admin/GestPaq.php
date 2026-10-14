<?php 
require("../../backend/SeguridadAD.php")
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/GEO.ico" type="image/x-icon">
  <title>PAQUETES</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@300;400;700&family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

  <div class="contSect">
    <aside class="aside">
      <?php 
      include("../../components/navbar.php");
      ?>
    </aside>

    <main class="main">
      <h1 class="TitleModule">Gestion de Paquetes</h1>

      <div class="vInfPs100">
        <table class="tablaInf">
          <tr>
            <th>ID Paquete</th>
            <th>Titulo</th>
            <th>Duracion</th>
            <th>Ciudad Origen</th>
            <th>Ciudad Destino</th>
            <th>Precio Base</th>
            <th>¿Esta en Oferta?</th>
            <th>Acciones</th>
          </tr>
          
          <?php 
          require("../../backend/conexion.php");
          $todos2 = "SELECT pq.id_paquete, pq.titulo, pq.duracion_dias, pq.precio_base, pq.oferta, cd.id_ciudad AS id_ciudad_destino, cd.nombre_ciudad AS nombre_ciudad_destino, co.id_ciudad AS id_ciudad_origen, co.nombre_ciudad AS nombre_ciudad_origen FROM paquetes pq INNER JOIN ciudades cd ON cd.id_ciudad = pq.id_ciudad_destino INNER JOIN ciudades co ON co.id_ciudad = id_ciudad_origen ORDER BY pq.id_paquete ASC";
          $resultado2 = mysqli_query($conectar, $todos2);

          while($fila2 = mysqli_fetch_assoc($resultado2)){
          ?>

            <tr>
              <td><?php echo $fila2['id_paquete']?></td>
              <td><?php echo $fila2['titulo']?></td>
              <td><?php echo $fila2['duracion_dias']?></td>
              <td><?php echo $fila2['nombre_ciudad_origen']?></td>
              <td><?php echo $fila2['nombre_ciudad_destino']?></td>
              <td><?php echo $fila2['precio_base']?></td>
              <td><?php echo $fila2['oferta']?></td>
              <td><a href="#" class="eliminarPaq" data-id="<?php echo $fila2['id_paquete']?>"><img src="../../img/delete.svg" alt="Eliminar"></a></td>
            </tr>

          <?php 
          }
          ?>

        </table>

        <button type="button" id="nuevoPaquete" class="btn-add">Añadir un Nuevo Paquete +</button>

        <form action="../../backend/AgPaquete.php" id="formPaquete" class="fAdd" method="post" enctype="multipart/form-data">

          <fieldset>
            
            <legend>Añadir Nuevo Paquete</legend>
            
            <div class="Sect">
              <h3>Informacion Basica</h3>
              <p class="alerta" id="Alert1"></p>
              <input type="text" name="nombrePaq" id="nombrePaq" placeholder="Titulo del Paquete. Ej.Viaje a Francia, Italia">
  
              <p class="alerta" id="Alert2"></p>
              <textarea name="DescripcionP" id="DescripcionP" placeholder="Descripcion del Paquete"></textarea>
  
              <div class="inptGroup2">
                <p class="alerta" id="Alert3"></p>
                <input type="number" name="DuracionDias" id="DuracionDias" placeholder="Duracion del Viaje (Dias)">
                <p class="alerta" id="Alert4"></p>
                <input type="number" min="1" name="PrecioPP" id="PrecioPP" placeholder="Precio Base por Persona ($)">
              </div>
            </div>


            <div class="Sect">
              <h3>Informacion Geografica</h3>

              <div class="inptGroup2">
                <p class="alerta" id="Alert5"></p>
                <select name="idPaisOrg" id="idPaisOrg">
                  <option value="">Selecciona el Pais de Origen</option>
                  <?php 
                  require('../../backend/conexion.php');
                  $todos = "SELECT * FROM paises ORDER BY id_pais ASC";
  
                  $resultado = mysqli_query($conectar, $todos);
  
                  while($fila = mysqli_fetch_assoc($resultado)){
                  ?>
                  <option value="<?php echo $fila['id_pais']?>"><?php echo $fila['nombre_pais']?></option>
                  <?php 
                  }
                  ?>
                </select>

                <p class="alerta" id="Alert6"></p>
                <select name="idPaisDest" id="idPaisDest">
                <option value="">Selecciona el Pais de Destino</option>
                <?php 
                require('../../backend/conexion.php');
                $todos = "SELECT * FROM paises ORDER BY id_pais ASC";

                $resultado = mysqli_query($conectar, $todos);

                while($fila = mysqli_fetch_assoc($resultado)){
                ?>
                <option value="<?php echo $fila['id_pais']?>"><?php echo $fila['nombre_pais']?></option>
                <?php 
                }
                ?>
              </select>
              </div>
              
              <br>

              <div class="inptGroup2">
                <p class="alerta" id="Alert7"></p>
                <select name="idCiudadOrg" id="idCiudadOrg">
                <option value="">Selecciona la Ciudad de Origen</option>
                <?php 
                require('../../backend/conexion.php');
                $todos = "SELECT * FROM ciudades ORDER BY id_ciudad ASC";

                $resultado = mysqli_query($conectar, $todos);

                while($fila = mysqli_fetch_assoc($resultado)){
                ?>
                <option value="<?php echo $fila['id_ciudad']?>"><?php echo $fila['nombre_ciudad']?></option>
                <?php 
                }
                ?>
              </select>

              <p class="alerta" id="Alert8"></p>
              <select name="idCiudadDest" id="idCiudadDest">
                <option value="">Selecciona la Ciudad de Destino</option>
                <?php 
                require('../../backend/conexion.php');
                $todos = "SELECT * FROM ciudades ORDER BY id_ciudad ASC";

                $resultado = mysqli_query($conectar, $todos);

                while($fila = mysqli_fetch_assoc($resultado)){
                ?>
                <option value="<?php echo $fila['id_ciudad']?>"><?php echo $fila['nombre_ciudad']?></option>
                <?php 
                }
                ?>
              </select>
              </div>
              
            </div>

            <div class="Sect">
              <h3>Gestion de Oferta</h3>

              <input type="checkbox" id="HabilitarOferta" name="HabilitarOferta" value="1">
              <label for="HabilitarOferta"> Habilitar Oferta para este Paquete</label>
              <div class="oferta" id="oferta">
                <input type="number" min="1" name="PrecioOferta" id="PrecioOferta" placeholder="Ingresa el Precio por Persona en Oferta">
                <div class="inptGroup2">
                  <input type="date" name="FechaInicio" id="FechaInicio">
                  <input type="date" name="FechaFin" id="FechaFin">
                </div>
              </div>
            </div>

            <div class="Sect">
              <h3>Gestion de Imagenes del Paquete</h3>
              <p class="alerta" id="Alert9"></p>
              <input type="file" id="FotosP" name="fotosPaquete[]" multiple accept="image/*">
            </div>

            <button type="submit" name="submit" class="btn-add">Guardar Paquete</button>
          
          </fieldset>

        </form>

      </div>
    </main>
  </div>
  <script src="../../js/script.js"></script>
  <script src="../../js/ocultar3.js"></script>
  <script src="../../js/ocultar4.js"></script>
  <script src="../../js/validacion7.js"></script>
</body>
</html>