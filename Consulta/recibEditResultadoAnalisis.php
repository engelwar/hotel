<?php 

include('../config.php');

$numero_analisis = $_REQUEST['id'];
$detalle = $_REQUEST['detalle'];
$fecha = date('Y-m-d H:i:s');

$update = ("UPDATE resultado_analisis SET 
  DETALLE_RESULTADO_LABORATORIO = '".$detalle."',
  FECHA = '".$fecha."'
  WHERE NUMERO_ANALISIS  = '".$numero_analisis."'
");
$resultUpdate = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='resultado_analisis.php';
    </script>";

?>