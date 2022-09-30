<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];

$DeleteRegistro = ("DELETE FROM personal WHERE codigo  = '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);

?>