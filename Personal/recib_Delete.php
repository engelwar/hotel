<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];

$DeleteRegistro = ("DELETE FROM personal WHERE CODIGO = '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);

?>