<?php 
require "conexion.php";
require "SeguridadAD.php";

$id = $_GET['id'];

if($id > 1){
  $borrar = 'DELETE FROM usuarios WHERE id_usuario = ' . $id;
  
  $resultado = mysqli_query($conectar, $borrar);
  
  if ($resultado) {
    echo '
    <script>
      alert("SE ELIMINO EL USUARIO CORRECTAMENTE");
      window.location = "../views/Admin/GestUsers.php";
    </script>';
  }
  exit();
} else {
  echo '
  <script>
    alert("ESTE REGISTRO NO SE PUEDE ELIMINAR");
    window.location = "../views/Admin/GestUsers.php";
  </script>';
  exit();
}

?>