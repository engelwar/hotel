<?php

$numero_receta = $_POST['dato1'];
$nombreReceta = $_POST['dato2'];

include('../config.php');

$sqlDelete = (" DELETE FROM detalle_receta WHERE NUMERO_RECETA = $numero_receta AND NOMBRE_MEDICAMENTO = '" . $nombreReceta . "' ");
$queryDelete = mysqli_query($con, $sqlDelete);

$sqlConsulta = (" SELECT NOMBRE_MEDICAMENTO, POSOLOGIA, CANTIDAD FROM detalle_receta WHERE NUMERO_RECETA = '".$numero_receta."' ");
$queryConsulta = mysqli_query($con, $sqlConsulta);

while ($dataReceta = mysqli_fetch_assoc($queryConsulta)){
  $receta[] = $dataReceta;
}

echo json_encode($receta);

?>