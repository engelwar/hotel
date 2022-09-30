
<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci      = $_REQUEST['ci'];
$celular      = $_REQUEST['celular'];
$contraseña      = $_REQUEST['ci'];
$correo 	 = $_REQUEST['correo'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];

$update = ("UPDATE cliente 
	SET 
	nombres  ='" .$nombres. "',
	apellidos  ='" .$apellidos. "',
	carnet ='" .$ci. "', 
	celular ='" .$celular. "', 
	contraseña ='" .$contraseña. "',
	correo  ='" .$correo. "',
	nacionalidad ='" .$nacionalidad. "'

WHERE codigo_cliente  ='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
