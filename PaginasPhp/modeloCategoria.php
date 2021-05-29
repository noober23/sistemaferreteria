<?php 
	require_once "..\app\coneccion.php";

	function insertarCategoria($descripcion)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO categoria(idCategoria,descripcion,estado) VALUES(0,'$descripcion','$estado')";
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
	function eliminarCategoria($id)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$estado="Inactivo";
		$sql ="UPDATE categoria SET estado = '$estado'where idCategoria='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se eliminó con éxito el registro de la categoria con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se eliminó  el registro de la categoria con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function editarCategoria($id,$descripcion)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$sql ="UPDATE categoria SET descripcion='$descripcion' where idCategoria='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se modifico con éxito el registro de la categoria con el codigo: <b>'.$id.'</b> 					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se edito  el registro de la categoria con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}

 ?>