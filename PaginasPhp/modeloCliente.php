<?php 
	require_once "..\app\coneccion.php";

	function insertarCliente($direccion,$nombre,$apellidos,$documentoIdentidad,$telefono)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO cliente(idCliente,direccion,nombre,apellidos,documento_Identidad,telefono,estado) VALUES(0,'$direccion','$nombre','$apellidos','$documentoIdentidad','$telefono','$estado')";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong> Los datos fueron correctamente ingresados de la base de datos.
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> Ocurrio un error vuelva a ingresar los datos correctamente.
					</div>';
		}
	
		return printf($mensaje);
	}
	function eliminarCliente($id)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$estado="Inactivo";
		$sql ="UPDATE cliente SET estado = '$estado'where idCliente='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se eliminó con éxito el registro del cliente con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se eliminó  el registro del cliente con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function editarCliente($id,$direccion,$nombre,$apellidos,$documentoIdentidad,$telefono)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$sql ="UPDATE cliente SET nombre='$nombre',apellidos='$apellidos',direccion='$direccion',documento_Identidad='$documentoIdentidad',telefono='$telefono' where idCliente='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se modifico con éxito el registro del cliente con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se edito  el registro del cliente con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}

 ?>