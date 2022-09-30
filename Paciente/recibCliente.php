<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci      = $_REQUEST['ci'];
$fecha_nacimiento 	 = $_REQUEST['fecha_nacimiento'];
$direccion      = $_REQUEST['direccion'];
$correo 	 = $_REQUEST['correo'];
$num_referencia 	 = $_REQUEST['num_referencia'];
$tipo_sangre 	 = $_REQUEST['tipo_sangre'];
$seguro_medico 	 = $_REQUEST['seguro_medico'];
$profesion 	 = $_REQUEST['profesion'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];
$enfermedad_base      = $_REQUEST['enfermedad_base'];
$personal_referencia      = $_REQUEST['personal_referencia'];

$QueryInsert = ("INSERT INTO paciente(
    NOMBRE,
    APELLIDO,
    CI,
    FECHA_NACIMIENTO,
    DIRECCION,
    CORREO,
    NUMERO_REFERENCIA,
    TIPO_SANGRE,
    SEGURO_MEDICO,
    PROFESION,
    NACIONALIDAD,
    ENFERMEDAD_BASE,
    PERSONA_REFERENCIA,
    ROL
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$ci."',
    '".$fecha_nacimiento. "',
    '".$direccion. "',
    '".$correo."',
    '".$num_referencia. "',
    '".$tipo_sangre. "',
    '".$seguro_medico."',
    '".$profesion. "',
    '".$nacionalidad. "',
    '".$enfermedad_base."',
    '".$personal_referencia. "',
    'paciente'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:index.php");
?>
