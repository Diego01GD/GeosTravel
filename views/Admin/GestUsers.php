<?php 
require("../../backend/SeguridadAD.php")
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/GEO.ico" type="image/x-icon">
  <title>USUARIOS</title>
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

      <h1 class="TitleModule">Gestion de Usuarios</h1>

      <div class="vInfPs100">
        <h3>Información Usuarios</h3>

        <table class="tablaInf">
            <tr>
              <th>ID Usuario</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Correo Electronico</th>
              <th>Contraseña</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>

            <?php 
            require('../../backend/conexion.php');
            $todos = "SELECT * FROM usuarios ORDER BY id_usuario ASC";

            $resultado = mysqli_query($conectar, $todos);

            while($fila = mysqli_fetch_assoc($resultado)){
            ?>

            <tr>
              <td><?php echo $fila['id_usuario']?></td>
              <td><?php echo $fila['nombreUsuario']?></td>
              <td><?php echo $fila['apellidoUsuario']?></td>
              <td><?php echo $fila['correoElect']?></td>
              <td><?php echo $fila['contrasena']?></td>
              <td><?php echo $fila['rol']?></td>
              <td><a href="#" class="eliminarUsr" data-id="<?php echo $fila['id_usuario']?>"><img src="../../img/delete.svg" alt="Eliminar"></a></td>
            </tr>

            <?php 
            }
            ?>
        </table>

        <button type="button" id="agregarUsr" class="btn-add">Añadir Nuevo Usuario +</button>

          <form action="../../backend/AgAUsuario.php" class="fAdd" id="formAUsuario" method="post">
            <fieldset>
              <legend>Añadir Nuevo Usuario</legend>

              <p class="alerta" id="Alert1"></p>
              <input type="text" name="nombreUsuario" placeholder="Nombre del Usuario" id="NombreUsuario">

              <p class="alerta" id="Alert2"></p>
              <input type="text" name="apellidoUsuario" placeholder="Apellido(s) del Usuario" id="apellidoUsuario">

              <p class="alerta" id="Alert3"></p>
              <input type="email" name="correoElect" placeholder="Correo Electronico del Usuario" id="correoElect">

              <p class="alerta" id="Alert4"></p>
              <input type="text" name="contrasena" placeholder="Contraseña del Usuario" id="contrasena">

              <p class="alerta" id="Alert5"></p>
              <select name="rolU" id="rolU">
                <option value="" selected>Selecciona un rol para el usuario</option>
                <option value="USUARIO">Usuario</option>
                <option value="ADMINISTRADOR">Administrador</option>
              </select>

              <button type="submit" class="btn-add">Registrar Usuario</button>
            </fieldset>
          </form>
      </div>
      
    </main>
  </div>
  <script src="../../js/script.js"></script>
  <script src="../../js/ocultar2.js"></script>
  <script src="../../js/validacion4.js"></script>
</body>
</html>