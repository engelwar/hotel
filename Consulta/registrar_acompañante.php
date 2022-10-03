<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci      = $_REQUEST['ci'];
$codigo_cliente       = $_REQUEST['cliente'];

$QueryInsert = ("INSERT INTO acompañante(
    nombres,
    apellidos,
    carnet,
    codigo_cliente
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$ci."',
    '".$codigo_cliente. "'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:solicitar_acompañante.php");
?>
