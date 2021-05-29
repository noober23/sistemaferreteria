<?php
require_once "..\app\coneccion.php";
$id = $_POST["id"];

//OBTENEMOS LOS VALORES DEL PRODUCTO

 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM cliente  where documento_Identidad='$id'";
	mysqli_select_db($con,"sistemaferreteria");
		$resultado=$con->query($sql);
		$valores2 = mysqli_fetch_array($resultado);

$datos = array(
				0 => $valores2['nombre'], 
				1 => $valores2['apellidos'],
				2 => $valores2['direccion'], 
				3 => $valores2['telefono'], 
				);
echo json_encode($datos);
?>