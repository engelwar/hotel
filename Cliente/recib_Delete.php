<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];

$DeleteRegistro = ("DELETE FROM cliente WHERE codigo_cliente  = '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);
?>