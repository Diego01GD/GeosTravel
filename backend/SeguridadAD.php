<?php 
session_start();

if($_SESSION["autentificado"] != "SI"){
    header("Location: ../../Login.php"); 
    exit();
}


if($_SESSION["Rol"] != "ADMINISTRADOR"){
    echo "<script>
              alert('ACCESO DENEGADO. No tienes permisos de Administrador.');
              window.location = '../../index.php';
          </script>";
    exit();
}


?>