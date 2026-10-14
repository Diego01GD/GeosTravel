<?php 

require("conexion.php");

$nombrePais = $_POST['Pais'];

$insertar = "INSERT INTO paises (nombre_pais) VALUES ('$nombrePais')"; 
$query = mysqli_query($conectar, $insertar);

if ($query) {
  echo '
  <script>
    alert("PAIS AÑADIDO CORRECTAMENTE");
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