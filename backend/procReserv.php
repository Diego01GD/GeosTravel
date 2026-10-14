<?php 
include("conexion.php");
require("SeguridadU.php");
session_start();

if (!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] != "SI" || !isset($_SESSION['id_usuario'])) {
    echo '<script>alert("Debe iniciar sesión para reservar."); window.location = "../../index.php";</script>';
    exit();
}

$id_usuario = $_SESSION['id_usuario']; 
$id_paquete = $_POST['id_paquete']; 
$cantidad_personas = $_POST['cantidad_personas'];
$metodo_pago = $_POST['metodoPago']; 
$monto_total = $_POST['monto_total_input']; 



$dirLocal = "comprobantes"; 
$rutaRaizServidor = "../" . $dirLocal;

$rutaTmp = $_FILES['comprobantePdf']['tmp_name'];
$tipoArch = $_FILES['comprobantePdf']['type'];
$nombreArch = $_FILES['comprobantePdf']['name'];
$tamanoArch = $_FILES['comprobantePdf']['size'];


if (empty($rutaTmp)) {
    echo '<script>alert("Debe adjuntar el comprobante de pago."); window.history.go(-1);</script>';
    exit();
}
if ($tipoArch != "application/pdf") {
    echo '<script>alert("Solo se aceptan archivos PDF como comprobante."); window.history.go(-1);</script>';
    exit();
}


if ($tamanoArch > 5000000) { 
    echo '<script>alert("El archivo es demasiado grande (Máx 5MB)."); window.history.go(-1);</script>';
    exit();
}


$timestamp = date('YmdHis');
$nombreUnico = $id_usuario. "_". $id_paquete ."_" . $timestamp . ".pdf"; 
$rutaFinalServidor = $rutaRaizServidor . "/" . $nombreUnico;
$rutaFinalDB = "./" . $dirLocal . "/" . $nombreUnico;

if (!move_uploaded_file($rutaTmp, $rutaFinalServidor)) {
    echo '
    <script>
      alert("Error al subir el comprobante. Verifique permisos de la carpeta ' . $dirLocal . '.");
      window.history.go(-1);
    </script>';
    exit();
}



$consultaR = "INSERT INTO reservaciones 
    (id_usuario, id_paquete, cantidad_personas, metodo_pago, comprobante_url, monto_total) 
    VALUES 
    ('$id_usuario', '$id_paquete', '$cantidad_personas', '$metodo_pago', '$rutaFinalDB', '$monto_total')";

$resultado_reserva = mysqli_query($conectar, $consultaR);

if ($resultado_reserva) {
    echo '
    <script>
      alert("Reservación enviada exitosamente. Estado: Pendiente.");
      window.location = "../index.php";
    </script>';
} else {
    echo '
    <script>
      alert("Error al registrar la reservación."); 
      window.history.go(-1);
    </script>';
}

mysqli_close($conectar);
?>