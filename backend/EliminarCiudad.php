<?php 

require "conexion.php";
require "seguridadAD.php";

$id = $_GET['id'];

$borrar = 'DELETE FROM ciudades WHERE id_ciudad = ' . $id;

$resultado = mysqli_query($conectar, $borrar);
  
if ($resultado) {
    echo "<script>
              alert('SE ELIMINO EL DATO CORRECTAMENTE');
              window.location = '../VerProductos.php';
          </script>";
}


?>