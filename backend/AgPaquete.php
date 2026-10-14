<?php 
include("conexion.php");
require("SeguridadAD.php");

$nombrePaq = $_POST['nombrePaq'];
$DescripcionP = $_POST['DescripcionP'];
$DuracionDias = $_POST['DuracionDias'];
$PrecioPP = $_POST['PrecioPP'];


$idPaisOrg = $_POST['idPaisOrg'];
$idPaisDest = $_POST['idPaisDest'];
$idCiudadOrg = $_POST['idCiudadOrg'];
$idCiudadDest = $_POST['idCiudadDest'];


$HabilitarOferta = isset($_POST['HabilitarOferta']) ? 1 : 0;
$PrecioOferta = ($HabilitarOferta == 1) ? $_POST['PrecioOferta'] : NULL;
$FechaInicio = $_POST['FechaInicio'];
$FechaFin = $_POST['FechaFin'];

$Insert1_Paquete = "INSERT INTO paquetes (titulo, descripcion, duracion_dias, id_ciudad_origen, id_ciudad_destino, id_pais_origen, id_pais_destino, precio_base, oferta) VALUES ('$nombrePaq', '$DescripcionP', '$DuracionDias', '$idCiudadOrg', '$idCiudadDest', '$idPaisOrg', '$idPaisDest', '$PrecioPP', '$HabilitarOferta')";

$resultado1 = mysqli_query($conectar, $Insert1_Paquete);

if($resultado1){
  $NId_Paq = mysqli_insert_id($conectar);
  $exito = true;

  if($HabilitarOferta == 1 && $PrecioOferta !== NULL){
    $consultaOf = "INSERT INTO ofertas (id_paquete, precio_oferta, fecha_inicio, fecha_fin) VALUES ('$NId_Paq', '$PrecioOferta', '$FechaInicio', '$FechaFin')";

    if(!mysqli_query($conectar, $consultaOf)){
      $exito = false;
    }
  }

  $orden = 1;
  if(count($_FILES['fotosPaquete']['name']) > 0){
    foreach($_FILES['fotosPaquete']['name'] as $i => $name){

      if(strlen($name) > 1){
        $sourceFoto = $_FILES['fotosPaquete']['tmp_name'][$i];
        $tamanoFoto = $_FILES['fotosPaquete']['size'][$i];
        $tipoImg = $_FILES['fotosPaquete']['type'][$i];

        if($tamanoFoto > 1000000 || ($tipoImg != "image/jpeg" && $tipoImg != "image/png" && $tipoImg != "image/gif" && $tipoImg != "image/webp")){
          continue;
        }

        $dirLocal = "media";
        $timestamp = date('YmdHis');
        $nombreUnico = $timestamp . "-" . $name;
        $resultadoFotos = "./" . $dirLocal . "/" . $nombreUnico;
        $resultadoFotos2 = "../" . $dirLocal . "/" . $nombreUnico;

        if(move_uploaded_file($sourceFoto, $resultadoFotos2)){
          $queryGal = "INSERT INTO galeria (id_paquete, url_imagen, orden) VALUES ('$NId_Paq', '$resultadoFotos', $orden)";

          if(!mysqli_query($conectar, $queryGal)){
            $exito = false;
          }
          $orden++;
      }   
    }
  }
}

if($exito){
  echo'
  <script>
    alert("Paquete Almacenado Exitosamente");
    window.location = ("../views/Admin/GestPaq.php");
  </script>';
} else {
  echo '
  <script>
    alert("Paquete guardado, pero hubo errores con las fotos o la oferta."); 
    window.location = ("../GestPaq.php");
  </script>';
}

}
?>