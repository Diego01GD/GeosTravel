<?php 

require("conexion.php");

$id_pais = $_POST['idPais'];
$nombreCiudad = $_POST['Ciudad'];

$insertar = "INSERT INTO ciudades (id_pais, nombre_ciudad) VALUES ('$id_pais', '$nombreCiudad')"; 
$query = mysqli_query($conectar, $insertar);

if ($query) {
  echo '
  <script>
    alert("CIUDAD AÑADIDA CORRECTAMENTE");
    location.href="../views/Admin/GestDest.php";
  </script>
  ';
} else {
  echo '
  <script>
    alert("LOS DATOS NO PUDIERON ALMACENARSE CORRECTAMENTE");
    location.href="../views/Admin/GestDest.php";
  </script>
  ';
}


?>