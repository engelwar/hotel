<?php
include('../config.php');
$cantidad      = $_REQUEST['cantidad'];
$cliente 	 = $_REQUEST['cliente'];
$servicio      = $_REQUEST['servicio'];

$sqlPrecio = ("
SELECT precio 
FROM servicio
WHERE codigo_servicio = '".$servicio."'
");

$queryPrecio = mysqli_query($con, $sqlPrecio);
$x = mysqli_fetch_array($queryPrecio);

$subTotal = $cantidad * $x['precio'];

$QueryInsert = ("INSERT INTO detalle_servicio(
    codigo_servicio,
    cantidad,
    subtotal,
    codigo_cliente
)
VALUES (
    '".$servicio. "',
    '".$cantidad. "',
    '".$subTotal."',
    '".$cliente. "'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:solicitar_servicio.php");
?>
