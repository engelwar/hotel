<?php 

include('../config.php');

$codigoReserva = $_REQUEST['id'];
$detalleConsulta = $_REQUEST['detalle'];

$update = ("UPDATE detalle_resultados_servicios SET 
  DETALLE_RESULTADO_SERVICIO = '".$detalleConsulta."'
  WHERE NUMERO_SOLICITUD_SERVICIO = '".$codigoReserva."'
");
$resultUpdate = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='detalle_resultados_servicios.php';
    </script>";

?>