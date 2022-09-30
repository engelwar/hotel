<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci      = $_REQUEST['ci'];
$celular      = $_REQUEST['celular'];
$contraseña      = $_REQUEST['ci'];
$correo 	 = $_REQUEST['correo'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];

$QueryInsert = ("INSERT INTO cliente(
    nombres,
    apellidos,
    carnet,
    celular,
    contraseña,
    correo,
    nacionalidad
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$ci."',
    '".$celular. "',
    '".$contraseña. "',
    '".$correo."',
    '".$nacionalidad. "'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:index.php");
?>
