
<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci 	 = $_REQUEST['ci'];
$celular 	 = $_REQUEST['celular'];
$direccion 	 = $_REQUEST['direccion'];
$correo 	 = $_REQUEST['correo'];
$contraseña 	 = $_REQUEST['ci'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];
$cargo 	 = $_REQUEST['cargo'];


$update = ("UPDATE personal 
	SET 
	nombres  ='" .$nombres. "',
	apellidos  ='" .$apellidos. "',
	carnet	 ='" .$ci. "', 
	celular ='" .$celular. "', 
	direccion ='" .$direccion. "', 
	correo ='" .$correo. "', 
	contraseña ='" .$contraseña. "', 
	nacionalidad ='" .$nacionalidad. "', 
	cargo ='" .$cargo. "'

WHERE codigo  ='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
