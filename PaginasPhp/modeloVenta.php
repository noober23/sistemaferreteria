<?php 
	require_once "..\app\coneccion.php";

	function insertarVenta($idCliente,$tipodocumento,$nrodocumento,$fecha,$total)
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
function Categorias($id)
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
function Unidades($id)
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
function Productos($id)
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
function clientes($id)
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
		$cont=count($idProducto1);
				 for($i=0; $i<$cont; $i++)
                {
                  $cantidad= $cantidad1[$i];
                  $idProducto= $idProducto1[$i];
                  $precio_Unitario= $precioUnitario1[$i];  
                  	$sql1="INSERT INTO detalle_venta(idDetalle_Venta,idVenta,idProducto,cantidad,precio_Unitario,estado) VALUES(0,'$codigoVenta','$idProducto','$cantidad','$precio_Unitario','$estado')";
                  		if($consulta = $con->query($sql1))
							{
									$mensaje=	"";  	
							}
							else
							{
							$mensaje= '<div class="alert alert-danger alert-dismissable">
										  <button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>¡Cuidado!</strong> Ocurrio un error vuelva a ingresar los datos correctamente.
										</div>';
							}
				}	
					mostrarVentas($codigoVenta);
		$con->close();
		return printf($mensaje);
	}

	function mostrarVentas($idVentae)
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
				<h1>FACTURA</h1>
				<h1><small>Factura #001</small></h1>
				</div>';
				$factura.='<hr />';
				$factura.=	'<div class="row">
				<div class="col-xs-5">
				<div class="panel panel-default">
				<div class="panel-heading">
				<h4>De: <a href="#">Su Nombre</a></h4>
				</div>
				<div class="panel-body"><b>Nombre completo: </b>MIL CONST <br><b>NIT: </b>123456<br><b>Direccion :</b> Calle innominada <br><b>Telefono :</b>123456</div>
				</div>
				</div>
				<div class="col-xs-5 col-xs-offset-2 text-right">
				<div class="panel panel-default">
				<div class="panel-heading text-center">
				<h4><a href="#">DATOS DEL CLIENTE</a></h4>
				</div>
				<div class="panel-body text-length">'.clientes($clientes["idCliente"]).'</div>
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
               	$factura.='<td>'.unidades($fila["idProducto"]).'</td>';
               	$factura.='<td>'.productos($fila["idProducto"]).'</td>';
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