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
	function insertarUnidad($descripcion)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO unidad(idUnidad,descripcion,estado) VALUES(0,'$descripcion','$estado')";
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
	function eliminarUnidad($id)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$estado="Inactivo";
		$sql ="UPDATE unidad SET estado = '$estado'where idUnidad='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se eliminó con éxito el registro de la unidad con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se eliminó  el registro de la unidad con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function editarUnidad($id,$descripcion)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$sql ="UPDATE unidad SET descripcion='$descripcion' where idUnidad='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se modifico con éxito el registro de la unidad con el codigo: <b>'.$id.'</b> 					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se edito  el registro de la unidad con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function insertarUsuario($email,$password,$tipo)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO usuarios(id,usuario,password,tipoUsuario,estado) VALUES(0,'$email','$password','$tipo','$estado')";
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
	function eliminarUsuario($id)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$estado="Inactivo";
		$sql ="UPDATE usuarios SET estado = '$estado'where id='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se eliminó con éxito el registro del usuario con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se eliminó  el registro del usuario con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
	function editarUsuario($id,$email,$password,$tipo)
	{
			$cnn = new Conexion();
			$con = $cnn->conexionMysql();
			mysqli_select_db($con,"sistemaferreteria");
		$sql ="UPDATE usuarios SET usuario='$email',password='$password',tipoUsuario='$tipo' where id='$id'";
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong>Se modifico con éxito el registro del usuario con el codigo: <b>'.$id.'</b>
					</div>';
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se edito  el registro del usuario con el codigo: <b>'.$id.'</b>
					</div>';
		}
		return printf($mensaje);
	}
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
	function insertarVentaDetalle($idCliente,$tipodocumento,$nrodocumento,$fecha,$total)
	{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="INSERT INTO venta(idVenta,idCliente,tipo_Documento,documento,fechaVenta,total,estado) VALUES(0,'$idCliente','$tipodocumento','$nrodocumento','$fecha','$total','$estado')";
	
		if($consulta = $con->query($sql))
		{
			$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong> Los datos de la venta fueron correctamente ingresados en la base de datos.
					</div>';
				  	
		}
		else
		{
		$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> Ocurrio un error al ingresar los datos correctamente.
					</div>';
		}
		$con->close();
		return printf($mensaje);
	}
function CategoriasVenta($id)
{
	//SELECT categoria.descripcion FROM  categoria INNER JOIN producto on producto.idCategoria=categoria.idCategoria where producto.idProducto='34'
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$catalogo="";
	$sql = "SELECT categoria.descripcion FROM  categoria INNER JOIN producto on producto.idCategoria=categoria.idCategoria where producto.idProducto='$id'";
	mysqli_select_db($con,"sistemaferreteria");
		$consulta1 = $con->query($sql);
		$fila=$consulta1->fetch_assoc();
		$catalogo= $fila["descripcion"];
		$consulta1->free();
	$con->close();
	return $catalogo;
}
function UnidadesVenta($id)
{
	//SELECT unidad.descripcion FROM  unidad INNER JOIN producto on producto.idUnidad=unidad.idUnidad where producto.idProducto='34'
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$unidades="";
	$sql = "SELECT unidad.descripcion FROM  unidad INNER JOIN producto on producto.idUnidad=unidad.idUnidad where producto.idProducto='$id'";
	mysqli_select_db($con,"sistemaferreteria");
		$consulta1 = $con->query($sql);
		$fila=$consulta1->fetch_assoc();
		$unidades= $fila["descripcion"];
		$consulta1->free();
	$con->close();
	return $unidades;
}
function ProductosVenta($id)
{
	//SELECT unidad.descripcion FROM  unidad INNER JOIN producto on producto.idUnidad=unidad.idUnidad where producto.idProducto='34'
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$descripcion="";
	$sql = "SELECT * FROM  producto where idProducto='$id'";
	mysqli_select_db($con,"sistemaferreteria");
		$consulta1 = $con->query($sql);
		$fila=$consulta1->fetch_assoc();
		$descripcion= $fila["descripcion"];
		$consulta1->free();
	$con->close();
	return $descripcion;
}
function clientesVenta($id)
{
	//SELECT unidad.descripcion FROM  unidad INNER JOIN producto on producto.idUnidad=unidad.idUnidad where producto.idProducto='34'
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$completo="";
	$sql = "SELECT * FROM  cliente where documento_Identidad='$id'";
	mysqli_select_db($con,"sistemaferreteria");
		$consulta1 = $con->query($sql);
		$fila=$consulta1->fetch_assoc();
		$completo= "<b>Nombre completo: </b>".$fila["nombre"]." ".$fila["apellidos"]." <br><b>Documento Identidad: </b>".$fila["documento_Identidad"]."<br><b>Direccion :</b>".$fila["direccion"]."<br><b>Telefono :</b>".$fila["telefono"];
		$consulta1->free();
	$con->close();
	return $completo;
}
function actualizarStockProductos($id,$cantidad)
{
	 $cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$descripcion="";
	$sql = "SELECT * FROM  producto where idProducto='$id'";
	mysqli_select_db($con,"sistemaferreteria");
	if($consulta = $con->query($sql))
	{
		$filaProducto = $consulta->fetch_assoc();
		$stockProducto=$filaProducto["stock"];
		$actualizarstock=$stockProducto-$cantidad;
		$sql1="UPDATE producto SET stock='$actualizarstock' WHERE idProducto='$id'";
		$consulta1 = $con->query($sql1);
	}
	
		$consulta->free();
		$con->close();
}
function insertarDetalleVenta($idCliente,$tipodocumento,$nrodocumento,$fecha,$idProducto1,$cantidad1,$precioUnitario1)
	{
		$cnn = new Conexion();
		$con = $cnn->conexionMysql();
		mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql="SELECT * FROM venta WHERE idCliente='$idCliente' and tipo_Documento='$tipodocumento' and documento='$nrodocumento'";
		$consulta1 = $con->query($sql);
		$fila=$consulta1->fetch_assoc();
		$codigoVenta= $fila["idVenta"];
		$mensaje="";
		$cont=count($idProducto1);
				 for($i=0; $i<$cont; $i++)
                {
                  $cantidad= $cantidad1[$i];
                  $idProducto= $idProducto1[$i];
                  $precio_Unitario= $precioUnitario1[$i];  
                  	$sql1="INSERT INTO detalle_venta(idDetalle_Venta,idVenta,idProducto,cantidad,precio_Unitario,estado) VALUES(0,'$codigoVenta','$idProducto','$cantidad','$precio_Unitario','$estado')";
                  		if($consulta = $con->query($sql1))
							{
									actualizarStockProductos($idProducto,$cantidad);
							}
							else
							{
									$mensaje= '<div class="alert alert-danger alert-dismissable">
										  <button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>¡Cuidado!</strong> Ocurrio un error vuelva a ingresar los datos correctamente.
										</div>';
							}
				}	
					mostrarVentaDetalles($codigoVenta);
		$con->close();
		return printf($mensaje);
	}

	function mostrarVentaDetalles($idVentae)
	{
		$total=0;
		$cnn = new Conexion();
		$con = $cnn->conexionMysql();
		mysqli_select_db($con,"sistemaferreteria");

		$sql1 = "SELECT * FROM  venta  WHERE idVenta='$idVentae'";
		$consulta1 = $con->query($sql1);
		$clientes=$consulta1->fetch_assoc();
		$con->close();
		$cnn = new Conexion();
		$con = $cnn->conexionMysql();
		mysqli_select_db($con,"sistemaferreteria");
		$sql="SELECT * FROM  venta INNER JOIN detalle_venta on venta.idVenta=detalle_venta.idVenta WHERE detalle_venta.idVenta='$idVentae'";
			if($consulta = $con->query($sql))
				{
				$factura= '<div class="col-xs-6">
				<h1><a href=" "><img alt="" src="logo.png" /> Logo aquí </a></h1>
				</div>
				<div class="col-xs-6 text-right">
				<h1>'.$clientes["tipo_Documento"].'</h1>
				<h1><small>#'.$clientes["documento"].'</small></h1>
				</div>';
				$factura.='<hr />';
				$factura.=	'<div class="row">
				<div class="col-xs-5">
				<div class="panel panel-default">
				<div class="panel-heading">
				<h4>DATOS DE LA EMPRESA</h4>
				</div>
				<div class="panel-body"><b>Nombre completo: </b>MIL CONST <br><b>NIT: </b>123456<br><b>Direccion :</b> Calle innominada <br><b>Telefono :</b>123456</div>
				</div>
				</div>
				<div class="col-xs-5 col-xs-offset-2 text-right">
				<div class="panel panel-default">
				<div class="panel-heading text-center">
				<h4>DATOS DEL CLIENTE</h4>
				</div>
				<div class="panel-body text-length">'.clientesVenta($clientes["idCliente"]).'</div>
				</div>
				</div>
				</div>';
				$factura.='<table class="table table-bordered">
				<thead>
				<tr>
				<th>
				<h4>Cantidad</h4>
				</th>
				<th>
				<h4>tipo Unidad</h4>
				</th>
				<th>
				<h4>Descripcion</h4>
				</th>
				<th>
				<h4>Precio_Unidad</h4>
				</th>
				</tr>
				</thead>
				<tbody>';

 				while($fila = $consulta->fetch_assoc())
               {
               	$total=$fila["total"];
                $factura.='<tr>';
               	$factura.='<td>'.$fila["cantidad"].'</td>';
               	$factura.='<td>'.unidadesVenta($fila["idProducto"]).'</td>';
               	$factura.='<td>'.productosVenta($fila["idProducto"]).'</td>';
               	$factura.='<td>'.$fila["precio_Unitario"].'</td>';
               	 $factura.='</tr>'; 
               }
$factura.='</tbody>
</table>
<div class="row text-right">
					<div class="col-xs-3 col-xs-offset-7"><strong>
					<p>Total:</p>
					</strong></div>
		<div class="col-xs-2"><strong>
		<p>'.$total.'</p>
		</strong></div>
</div>';
}
 return printf($factura);
	}

 ?>