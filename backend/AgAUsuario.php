<?php 

require("conexion.php");

$NombreUsuario = $_POST['nombreUsuario'];
$ApellidoUsuario = $_POST['apellidoUsuario'];
$CorreoElect = $_POST['correoElect'];
$Contrasena = $_POST['contrasena'];
$RolU = $_POST['rolU'];

$consulta = "SELECT * FROM usuarios WHERE correoElect = '$CorreoElect'";
$resultado = mysqli_query($conectar, $consulta);


if(mysqli_num_rows($resultado) > 0){
  echo '
  <script>
    alert("ESTE CORREO ELECTRONICO YA ESTA REGISTRADO \nINTENTA CON UNO DIFERENTE");
    window.history.go(-1);
  </script>
  ';
} else {
  $insertar = "INSERT INTO usuarios (nombreUsuario, apellidoUsuario, correoElect, contrasena, rol) VALUES ('$NombreUsuario', '$ApellidoUsuario', '$CorreoElect', '$Contrasena', '$RolU')";
  $query = mysqli_query($conectar, $insertar);
  if($query){
    echo '
    <script>
      alert("USUARIO AÑADIDO CORRECTAMENTE");
      location.href="../views/Admin/GestUsers.php";
    </script>
    ';
  } else {
    echo '
    <script>
      alert("LOS DATOS NO PUDIERON ALMACENARSE CORRECTAMENTE");
      window.history.go(-1);
    </script>
    ';
  }
}

?>