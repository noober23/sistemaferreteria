<?php 
	require_once "..\app\coneccion.php";

	function insertarProveedor($direccion,$nombre,$apellidos,$documentoIdentidad,$telefono,$celular)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO proveedor(idProveedor,direccion,nombre,apellidos,documento_Identidad,telefono,celular,estado) VALUES(0,'$direccion','$nombre','$apellidos','$documentoIdentidad','$telefono','$celular','$estado')";
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
	function eliminarProveedor($id)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$estado="Inactivo";
		$sql ="UPDATE proveedor SET estado = '$estado'where idProveedor='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se eliminó con éxito el registro del proveedor con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se eliminó  el registro del proveedor con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function editarProveedor($id,$direccion,$nombre,$apellidos,$documentoIdentidad,$telefono,$celular)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$sql ="UPDATE proveedor SET nombre='$nombre',apellidos='$apellidos',direccion='$direccion',documento_Identidad='$documentoIdentidad',telefono='$telefono',celular='$celular' where idProveedor='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se modifico con éxito el registro del proveedor con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se edito  el registro del proveedor con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}

 ?>