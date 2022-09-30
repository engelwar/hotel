<?php 

include('../config.php');

$codigoReserva = $_REQUEST['id'];
$detalleConsulta = $_REQUEST['detalle'];

$update = ("UPDATE consulta_medica SET 
  DETALLE_CONSULTA = '".$detalleConsulta."'
  WHERE CODIGO_RESERVA = '".$codigoReserva."'
");
$resultUpdate = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='generar_consulta.php';
    </script>";

?>