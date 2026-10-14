<?php 
require("conexion.php");


function escapar($con, $data) {
    return mysqli_real_escape_string($con, $data);
}

// Datos de la tabla 'paquetes'
$titulo = escapar($conectar, $_POST['titulo']);
$desc_corta = escapar($conectar, $_POST['desc_corta']);
$itinerario = escapar($conectar, $_POST['itinerario']);
$desc_detallada = escapar($conectar, $_POST['desc_detallada']);
$duracion_dias = escapar($conectar, $_POST['duracion_dias']);
$id_ciudad_destino = escapar($conectar, $_POST['id_ciudad_destino']);
$id_pais_origen = escapar($conectar, $_POST['id_pais_origen']);
$id_pais_destino = escapar($conectar, $_POST['id_pais_destino']);

$id_ciudad_origen = escapar($conectar, $_POST['id_ciudad_origen']); 
// ... (Recolección y escape de los IDs geográficos) ...

$precio_base = escapar($conectar, $_POST['precio_base']);
$activar_oferta = isset($_POST['activar_oferta']) ? 1 : 0; 
$urls_galeria = $_POST['url_imagen']; // No escapamos el array aún

// 2. INSERCIÓN PRINCIPAL EN PAQUETES
$consulta_paquete = "INSERT INTO paquetes (titulo, descripcion_corta, descripcion_detallada, duracion_dias, 
                   id_ciudad_origen, id_ciudad_destino, id_pais_origen, id_pais_destino, 
                   itinerario, precio_base, esta_en_oferta) 
                   VALUES ('$titulo', '$desc_corta', '$desc_detallada', '$duracion_dias', 
                           '$id_ciudad_origen', '$id_ciudad_destino', '$id_pais_origen', '$id_pais_destino', 
                           '$itinerario', '$precio_base', $activar_oferta)";

$resultado_paquete = mysqli_query($conectar, $consulta_paquete);

if($resultado_paquete){
    
    $nuevo_id_paquete = mysqli_insert_id($conectar); // Obtener el ID
    $exito_galeria = true;
    $exito_oferta = true;

    // 3. INSERCIÓN DE GALERÍA
    $orden = 1;
    foreach ($urls_galeria as $url) {
        $url_escapada = escapar($conectar, trim($url));
        if (!empty($url_escapada)) {
            $consulta_galeria = "INSERT INTO galeria (id_paquete, url_imagen, orden) 
                                 VALUES ('$nuevo_id_paquete', '$url_escapada', '$orden')";
            if (!mysqli_query($conectar, $consulta_galeria)) {
                $exito_galeria = false;
            }
            $orden++;
        }
    }

    // 4. INSERCIÓN DE OFERTAS
    if ($activar_oferta == 1) {
        $precio_oferta = escapar($conectar, $_POST['precio_oferta']);
        $fecha_inicio = escapar($conectar, $_POST['fecha_inicio']);
        $fecha_fin = escapar($conectar, $_POST['fecha_fin']);
        
        $consulta_oferta = "INSERT INTO ofertas (id_paquete, precio_oferta, fecha_inicio, fecha_fin) 
                            VALUES ('$nuevo_id_paquete', '$precio_oferta', '$fecha_inicio', '$fecha_fin')";
        
        if (!mysqli_query($conectar, $consulta_oferta)) {
            $exito_oferta = false;
        }
    }

    // 5. FINALIZACIÓN Y REDIRECCIÓN
    if ($exito_galeria && $exito_oferta) {
        echo '<script>alert("Paquete guardado exitosamente!"); window.location = ("../admin_dashboard.php");</script>';
    } else {
        echo '<script>alert("Paquete guardado, pero hubo errores en galería u ofertas."); window.location = ("../admin_dashboard.php");</script>';
    }

} else {
    echo '<script>alert("ERROR al guardar el paquete principal."); window.history.go(-1);</script>';
}
mysqli_close($conectar);
?>