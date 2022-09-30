<?php

$numero_receta = $_POST['dato1'];
$nombre_medicamento = $_POST['dato2'];
$posologia = $_POST['dato3'];
$cantidad = $_POST['dato4'];

include('../config.php');

$sqlReceta = (" INSERT INTO detalle_receta(
  NUMERO_RECETA,
  NOMBRE_MEDICAMENTO,
  POSOLOGIA,
  CANTIDAD
)
VALUES(
  '".$numero_receta."',
  '".$nombre_medicamento."',
  '".$posologia."',
  '".$cantidad."'
) ");
$queryReceta = mysqli_query($con, $sqlReceta);

$sqlConsulta = (" SELECT NOMBRE_MEDICAMENTO, POSOLOGIA, CANTIDAD FROM detalle_receta WHERE NUMERO_RECETA = '".$numero_receta."' ");
$queryConsulta = mysqli_query($con, $sqlConsulta);

while ($dataReceta = mysqli_fetch_assoc($queryConsulta)){
  $receta[] = $dataReceta;
}

echo json_encode($receta);

?>