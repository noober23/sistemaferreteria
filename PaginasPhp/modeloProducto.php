<?php 
	require_once "..\app\coneccion.php";
	function insertarProducto($categoria,$unidad,$nombre,$descripcion,$preciocompra,$precioventa,$fecha,$stock)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO producto(idProducto,idCategoria,idUnidad,nombre,descripcion,precio_compra,precio_venta,fecha,stock,estado) VALUES(0,'$categoria','$unidad','$nombre','$descripcion','$preciocompra','$precioventa','$fecha','$stock','$estado')";
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
	function eliminarProducto($id)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$estado="Inactivo";
		$sql ="UPDATE producto SET estado = '$estado'where idProducto='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se eliminó con éxito el registro del producto con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se eliminó  el registro del producto con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function editarProducto($id,$categoria,$unidad,$nombre,$descripcion,$preciocompra,$precioventa,$fecha,$stock)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$sql ="UPDATE producto SET idCategoria='$categoria',idUnidad='$unidad',nombre='$nombre',descripcion='$descripcion',precio_compra='$preciocompra',precio_venta='$precioventa',fecha='$fecha',stock='$stock' where idProducto='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se modifico con éxito el registro del producto con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se edito  el registro del producto con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}

 ?>