<?php
require_once "..\app\coneccion.php";
$id = $_POST["documento"];
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM venta  where documento='$id'";
	mysqli_select_db($con,"sistemaferreteria");
		$resultado=$con->query($sql);
		$valores = mysqli_fetch_array($resultado);
		$idCliente= $valores['idCliente'];
		$sql2 = "SELECT * FROM cliente  where documento_Identidad='$idCliente'";
		$resultado2=$con->query($sql2);
		$valores2 = $resultado2->fetch_assoc();
		$carnet=$valores2['documento_Identidad'];
		$nombre= $valores2['nombre']; 
		$apellidos =$valores2['apellidos'];
		$direccion =$valores2['direccion']; 
		$telefono =$valores2['telefono'];
		$cadena=$carnet."/".$nombre."/".$apellidos."/".$direccion."/".$telefono;
$datos = array(
				0 => $valores['idVenta'], 
				1 => $cadena,
				2 => $valores['tipo_Documento'], 
				3 => $valores['fechaVenta'],
				4 => $valores['total'],  
				);
echo json_encode($datos);
?>