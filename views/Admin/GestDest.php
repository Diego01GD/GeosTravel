<?php 
require("../../backend/SeguridadAD.php")
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/GEO.ico" type="image/x-icon">
  <title>DESTINOS</title>
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

    <h1 class="TitleModule">Gestion de Destinos</h1>
    
      <div class="dispPs">
        <div class="vInfPsAt">
          <h3>Informacion Paises</h3>
          
          <table class="tablaInf">
            
            <tr>
              <th>ID Pais</th>
              <th>Nombre del Pais</th>
              <th>Acciones</th>
            </tr>

            <?php 
            require('../../backend/conexion.php');
            $todos = "SELECT * FROM paises ORDER BY id_pais ASC";

            $resultado = mysqli_query($conectar, $todos);

            while($fila = mysqli_fetch_assoc($resultado)){
            ?>

            <tr>
              <td><?php echo $fila['id_pais']?></td>
              <td><?php echo $fila['nombre_pais']?></td>

              <td><a href="#" class="eliminarPais" data-id="<?php echo $fila['id_pais']?>"><img src="../../img/delete.svg" alt="Eliminar"></a></td>
            </tr>

            <?php 
            }
            ?>
  
            
          </table>
          <button type="button" id="agregarPs" class="btn-add">Añadir Nuevo Pais +</button>

          <form action="../../backend/AgPais.php" class="fAdd" id="formPais" method="post">
            <fieldset>
              <legend>Añadir Nuevo Pais</legend>
              <p class="alerta" id="Alert1"></p>
              <input type="text" name="Pais" placeholder="Nombre del Pais" id="Pais">
              <button type="submit" class="btn-add">Guardar Pais</button>
            </fieldset>
          </form>
        </div>
  
        <div class="vInfPsAt">
          <h3>Informacion Ciudades</h3>
          
          <table class="tablaInf">
  
            <tr>
              <th>ID Ciudad</th>
              <th>Nombre del Pais</th>
              <th>Nombre de la Ciudad</th>
              <th>Acciones</th>
            </tr>
  
            
            <?php 
            require('../../backend/conexion.php');
            $todos = "SELECT c.id_ciudad, c.nombre_ciudad, p.id_pais, p.nombre_pais FROM ciudades c INNER JOIN paises p ON c.id_pais = p.id_pais ORDER BY c.id_ciudad ASC";

            $resultado = mysqli_query($conectar, $todos);

            while($fila = mysqli_fetch_assoc($resultado)){
            ?>

            <tr>
              <td><?php echo $fila['id_ciudad']?></td>
              <td><?php echo $fila['nombre_pais']?></td>
              <td><?php echo $fila['nombre_ciudad']?></td>
              <td><a href="#" class="eliminarCiudad" data-id="<?php echo $fila['id_ciudad']?>"><img src="../../img/delete.svg" alt="Eliminar"></a></td>
            </tr>

            <?php 
            }
            ?>

          </table>
  
          <button type="button" id="agregarCd" class="btn-add">Añadir Nueva Ciudad +</button>
          
          <form action="../../backend/AgCiudad.php" class="fAdd" id="formCiudad" method="post">
            <fieldset>
              <legend>Añadir Nueva Ciudad</legend>
              <p class="alerta" id="Alert2"></p>
              <input type="text" name="Ciudad" placeholder="Nombre de la Ciudad" id="Ciudad">

              <p class="alerta" id="Alert3"></p>
              <select name="idPais" id="idPais">
                <option value="">Selecciona el Pais</option>
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
              <button type="submit" class="btn-add">Guardar Ciudad</button>
            </fieldset>
          </form>
        </div>
      </div>

    </main>
  </div>
  <script src="../../js/script.js"></script>
  <script src="../../js/ocultar.js"></script>
  <script src="../../js/validacion2.js"></script>
  <script src="../../js/validacion3.js"></script>
</body>
</html>