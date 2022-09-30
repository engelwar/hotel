<?php

include('../config.php');

$idReserva = $_REQUEST['id'];
$idMedico = $_REQUEST['idMedico'];
$idHorario = $_REQUEST['id_horario'];
$Fecha = $_REQUEST['fecha_consulta'];

$update = ("UPDATE reservas SET 
  CODIGO_PERSONAL   = '".$idMedico."',
  CODIGO_TURNOS  = '".$idHorario."',
  FECHA_RESERVA = '".$Fecha."'

  WHERE CODIGO_RESERVA = '".$idReserva."'
");
$resultUpdate = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='asignar_medico.php';
    </script>";

// $sqlAccion = ("UPDATE reservas 
// 	SET 
// 	CODIGO_PERSONAL   ='" .$idMedico. "',
// 	CODIGO_TURNOS   ='" .$idHorario. "',
// 	FECHA_RESERVA	 ='" .$Fecha. "'

// WHERE CODIGO ='" .$idRegistros. "'
// ");

// $queryAccion = mysqli_query($con, $sqlAccion);

