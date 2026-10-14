<?php 

require("conexion.php");

$NombreNU = $_POST['nombreNU'];
$ApellidosNU = $_POST['apellidosNU'];
$EmailNU = $_POST['emailNU'];
$PasswordNU = $_POST['passwordNU'];


$consulta = "SELECT * FROM usuarios WHERE correoElect = '$EmailNU'";
$resultado = mysqli_query($conectar, $consulta);


if(mysqli_num_rows($resultado) > 0){
  echo '
  <script>
    alert("ESTE CORREO ELECTRONICO YA ESTA REGISTRADO \nINTENTA CON UNO DIFERENTE");
    window.history.go(-1);
  </script>
  ';
} else {
  $insertar = "INSERT INTO usuarios (nombreUsuario, apellidoUsuario, correoElect, contrasena, rol) VALUES ('$NombreNU', '$ApellidosNU', '$EmailNU', '$PasswordNU', 'USUARIO')";
  $query = mysqli_query($conectar, $insertar);
  if($query){
    echo '
    <script>
      alert("TE HAS REGISTRADO CORRECTAMENTE \nYA PUEDES INICIAR SESION");
      location.href="../index.php";
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