
<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci      = $_REQUEST['ci'];
$fecha_nacimiento 	 = $_REQUEST['fecha_nacimiento'];
$direccion      = $_REQUEST['direccion'];
$correo 	 = $_REQUEST['correo'];
$num_referencia 	 = $_REQUEST['num_referencia'];
$tipo_sangre 	 = $_REQUEST['tipo_sangre'];
$seguro_medico 	 = $_REQUEST['seguro_medico'];
$profesion 	 = $_REQUEST['profesion'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];
$enfermedad_base      = $_REQUEST['enfermedad_base'];
$personal_referencia      = $_REQUEST['personal_referencia'];

$update = ("UPDATE paciente 
	SET 
	NOMBRE  ='" .$nombres. "',
	APELLIDO  ='" .$apellidos. "',
	CI ='" .$ci. "', 
	FECHA_NACIMIENTO  ='" .$fecha_nacimiento. "',
	DIRECCION ='" .$direccion. "', 
	CORREO  ='" .$correo. "',
	NUMERO_REFERENCIA  ='" .$num_referencia. "',
	TIPO_SANGRE ='" .$tipo_sangre. "', 
	SEGURO_MEDICO  ='" .$seguro_medico. "',
	PROFESION  ='" .$profesion. "',
	NACIONALIDAD ='" .$nacionalidad. "', 
	ENFERMEDAD_BASE  ='" .$enfermedad_base. "', 
	PERSONA_REFERENCIA  ='" .$personal_referencia. "'

WHERE CODIGO ='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
