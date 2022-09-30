<?php

$medico = $_POST['dato1'];
$fecha_consulta = $_POST['dato2'];

include('../config.php');

$sqlHoras = (" SELECT T.CODIGO, R.FECHA_RESERVA, T.INICIO, T.FIN
FROM reservas R, turnos T 
WHERE concat(T.CODIGO,'-',R.CODIGO_RESERVA) not in(
    SELECT R.CODIGO_TURNOS
    FROM reservas R
    WHERE R.FECHA_RESERVA = '$fecha_consulta' AND R.CODIGO_PERSONAL = $medico
)
GROUP BY T.INICIO
order by R.CODIGO_TURNOS, T.CODIGO ");

$queryHoras = mysqli_query($con, $sqlHoras);

while ($dataHoras = mysqli_fetch_assoc($queryHoras)){
  $horas[] = $dataHoras;
}

echo json_encode($horas);

?>