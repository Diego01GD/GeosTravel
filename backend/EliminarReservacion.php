<?php 
require "conexion.php";
require "SeguridadAD.php";

$id = $_GET['id'];

if($id > 0){
  $borrar = 'DELETE FROM reservaciones WHERE id_reserva = ' . $id;
  
  $resultado = mysqli_query($conectar, $borrar);
  
  if ($resultado) {
    echo '
    <script>
      alert("SE ELIMINO EL USUARIO CORRECTAMENTE");
      window.location = "../views/Admin/GestReserv.php";
    </script>';
  }
  exit();
} else {
  echo '
  <script>
    alert("ESTE REGISTRO NO SE PUEDE ELIMINAR");
    window.location = "../views/Admin/GestReserv.php";
  </script>';
  exit();
}

?>