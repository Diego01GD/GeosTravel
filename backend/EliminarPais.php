<?php 

require "conexion.php";
require "seguridadAD.php";

$id = $_GET['id'];

$borrar = 'DELETE FROM paises WHERE id_pais = ' . $id;

$resultado = mysqli_query($conectar, $borrar);
  
if ($resultado) {
    echo "<script>
              alert('SE ELIMINO EL DATO CORRECTAMENTE');
              window.location = '../VerProductos.php';
          </script>";
}


?>