<?php

include('../config.php');

$idPaciente = $_GET['idPaciente'];
$idMedico = $_GET['idMedico'];
$idHorario = $_GET['id_horario'];
$Fecha = $_GET['fecha_consulta'];

$sqlAccion = (" INSERT INTO `reservas` (`CODIGO_RESERVA`, `CODIGO_PACIENTE`, `CODIGO_PERSONAL`, `CODIGO_TURNOS`, `FECHA_RESERVA`) VALUES (NULL, '" . $idPaciente . "', '" . $idMedico . "', '" . $idHorario . "', '" . $Fecha . "'); ");

$queryAccion = mysqli_query($con, $sqlAccion);

if ($queryAccion) {

  $sqlConsultaAccion = (" SELECT CODIGO_RESERVA FROM  reservas WHERE CODIGO_PACIENTE = $idPaciente AND CODIGO_PERSONAL = $idMedico AND CODIGO_TURNOS = $idHorario AND FECHA_RESERVA = '$Fecha' ");
  $queryConsultaAccion = mysqli_query($con, $sqlConsultaAccion);
  $num = $queryConsultaAccion->num_rows;

  if ($num > 0) {
    $row = $queryConsultaAccion->fetch_assoc();
    $idReserva = $row['CODIGO_RESERVA'];
    $sqlConsulta = (" INSERT INTO `consulta_medica` (`NUMERO_CONSULTA`, `CODIGO_RESERVA`, `DETALLE_CONSULTA`) VALUES (NULL, '" . $idReserva . "', NULL); ");
    $queryConsulta = mysqli_query($con, $sqlConsulta);
    if($queryConsulta){
      $sqlConsultaMedica = (" SELECT NUMERO_CONSULTA FROM consulta_medica WHERE CODIGO_RESERVA = $idReserva ");
      $queryConsultaMedica = mysqli_query($con, $sqlConsultaMedica);
      if($queryConsultaMedica){
        $row2 = $queryConsultaMedica->fetch_assoc();
        $numero_consulta = $row2['NUMERO_CONSULTA'];
        $sqlReceta = (" INSERT INTO receta_medica(
          CODIGO_CONSULTA,
          FECHA
        )
        VALUES(
          '".$numero_consulta."',
          '".$Fecha."'
        ) ");
        $queryReceta = mysqli_query($con, $sqlReceta);
        if ($queryReceta) {
          header('Location: solicitar_servicio.php');
        } else {
          echo "error";
        }
      }
    }
  }
}
