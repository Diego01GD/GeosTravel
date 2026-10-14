<?php 

require("conexion.php");

$user = addslashes($_POST['email']);
$contrasena = addslashes($_POST['password']);


$comparar = "SELECT * FROM usuarios WHERE correoElect = '$user' AND contrasena = '$contrasena'";

$verificar = mysqli_query($conectar, $comparar);

if(mysqli_num_rows($verificar) > 0){
  $datosUsr = mysqli_fetch_assoc($verificar);
  $rolUsr = $datosUsr['rol'];
  
  session_start();
  $_SESSION["autentificado"] = "SI";
  $_SESSION["id_usuario"] = $datosUsr['id_usuario'];
  $_SESSION["Usuario"] = $datosUsr['nombreUsuario'];
  $_SESSION["Rol"] = $rolUsr;

  if($rolUsr == "ADMINISTRADOR") {
    header("Location: ../views/Admin/Dashboard.php");
  } elseif ($rolUsr == "USUARIO") {
    header("Location: ../index.php");
  }
} else{
  echo '
  <script>
    alert("USUARIO Y CONTRASEÑA INCORRECTOS");
    window.location = "../Login.php?errorusuario=SI";
  </script>';
}

exit();

?>