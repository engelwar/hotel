<?php

$idEspecial = $_POST['dato1'];

include('../config.php');

$sqlEspecial = (" SELECT CODIGO, NOMBRE, APELLIDO FROM personal WHERE ESPECIALIDAD = '$idEspecial' ");
$queryEspecial = mysqli_query($con, $sqlEspecial);

while ($dataEspecial = mysqli_fetch_assoc($queryEspecial)){
  $especial[] = $dataEspecial;
}

echo json_encode($especial);

?>