
<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];
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


$update = ("UPDATE personal 
	SET 
	NOMBRE  ='" .$nombres. "',
	APELLIDO  ='" .$apellidos. "',
	CI	 ='" .$ci. "', 
	FECHA_NACIMIENTO ='" .$fecha_nacimiento. "', 
	DIRECCION ='" .$direccion. "', 
	TELEFONO ='" .$telefono. "', 
	CORREO ='" .$correo. "', 
	CARGO ='" .$cargo. "', 
	ESPECIALIDAD ='" .$especialidad. "', 
	TURNO ='" .$turno. "', 
	NACIONALIDAD ='" .$nacionalidad. "' 

WHERE CODIGO ='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
