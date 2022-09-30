<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci 	 = $_REQUEST['ci'];
$fecha_nacimiento 	 = $_REQUEST['fecha_nacimiento'];
$direccion 	 = $_REQUEST['direccion'];
$telefono 	 = $_REQUEST['telefono'];
$correo 	 = $_REQUEST['correo'];
$cargo 	 = $_REQUEST['cargo'];
$especialidad 	 = $_REQUEST['especialidad'];
$turno 	 = $_REQUEST['turno'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];

$QueryInsert = ("INSERT INTO personal(
    NOMBRE,
    APELLIDO,
    CI,
    FECHA_NACIMIENTO,
    DIRECCION,
    TELEFONO,
    CORREO,
    CARGO,
    ESPECIALIDAD,
    TURNO,
    NACIONALIDAD,
    ROL
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$ci."',
    '".$fecha_nacimiento."',
    '".$direccion."',
    '".$telefono."',
    '".$correo."',
    '".$cargo."',
    '".$especialidad."',
    '".$turno."',
    '".$nacionalidad."',
    'personal'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:index.php");
?>
