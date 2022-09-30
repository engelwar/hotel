<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci 	 = $_REQUEST['ci'];
$celular 	 = $_REQUEST['celular'];
$direccion 	 = $_REQUEST['direccion'];
$correo 	 = $_REQUEST['correo'];
$contraseña 	 = $_REQUEST['ci'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];
$cargo 	 = $_REQUEST['cargo'];

$QueryInsert = ("INSERT INTO personal(
    nombres,
    apellidos,
    carnet,
    celular,
    direccion,
    correo,
    contraseña,
    nacionalidad,
    cargo
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$ci."',
    '".$celular."',
    '".$direccion."',
    '".$correo."',
    '".$contraseña."',
    '".$nacionalidad."',
    '".$cargo."'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:index.php");
?>
