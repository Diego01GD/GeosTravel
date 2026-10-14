<?php 
session_start();
$_SESSION = array();

session_destroy();

echo "<script>
              alert('Cerrando sesión...');
              window.location = '../index.php';
      </script>";
?>