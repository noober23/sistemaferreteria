<?php 
function buscarProductoNombre()
{
		$form = "<form id='alta-busquedaProducto' class='formulario' data-busquedaProducto>";
	$form .="<fieldset>";
	$form .=" <div class='col-lg-6'>";
	$form .="<fieldset class='scheduler-border'>";
	 $form .="<legend>Datos de Producto</legend>"; 
	$form .="<label form='nombre'> Busqueda por nombre de producto: </label>";
	$form.="<input type='text' id='nombre' class='form-control' name='nombre' />";
	$form.="<br>";
	$form.="</fieldset>";
	$form.="</div>";
	$form.="<br>";	
	$form.="</div>";
	$form.="</fieldset>";
		$form.="<div id='tablas' name='tablas'>";
    $form.="</div>";
	$form.="</form>";
	return printf($form);
}
function buscarFechas()
{
	/*$tabla = "<form id='alta-busquedaProFechas' class='formulario' data-buscarFechas>";
	$tabla .= "<div class='col-lg-3'>";
	$tabla.="</div>";
	$tabla .= "<div class='col-lg-6'>";
	$tabla .="<fieldset class='scheduler-border'>";
	$tabla .="<legend>Datos de Producto</legend>"; 
	$tabla .="<label form='nombre'> Busqueda por nombre de producto: </label>";
	$tabla.="<input id='fechaInicial' class='form-control' name='fechaInicial' />";
	$tabla.="<input id='fechaFinal' class='form-control' name='fechaFinal' />";
	$tabla.="<br>";
		$tabla.="<input type='submit' class='btn btn-success' value='Registrar' id='insertar-btn' name='insertar_btn' />";
	$tabla.="<input type='hidden' value='buscarfecha' id='Transaccion' name='Transaccion' />";
	$tabla.="</fieldset>";
	$tabla.="</div>";
	$tabla .= "<div class='col-lg-3'>";
	$tabla.="</div>";
    $tabla.="<br>";
	$tabla.="</form>";
	return printf($tabla);*/
	$form="<br>";
	$form .= "<form id='editar-busquedaVentaFechas' class='formulario' data-busquedaVentaFechas>";
	$form .= "<div class='col-lg-3'>";
	$form.="</div>";
	$form .= "<div class='col-lg-6'>";
	$form .="<fieldset>";
	$form .=" <div>";
	$form.="<br>";
	$form .="<label form='nombre'> BUSQUEDA DE VENTAS POR FECHAS </label>";
	$form.="<input id='fechaInicial' class='form-control' name='fechaInicial' />";
	$form.="<br>";
	$form.="<input id='fechaFinal' class='form-control' name='fechaFinal' />";
	$form.="<br>";
	$form.="<input type='submit'class='btn btn-success' value='Buscar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='buscarVentasFechas' id='Transaccion' name='Transaccion' />";
	$form.="<hr>";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</div>";
	$form .= "<div class='col-lg-3'>";
	$form.="</div>";
	$form.="</form>";
	$form.="<br>";

	
	return printf($form);
}
function fechas($fecha1,$fecha2)
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	mysqli_select_db($con,"sistemaferreteria");
	$sql="SELECT DISTINCTROW venta.fechaVenta FROM venta where fechaVenta BETWEEN '$fecha1' and '$fecha2' order by fechaVenta";
	$form ="<br>";
	$form .= "<form id='editar-busquedaVentaFechas' class='formulario' data-busquedaVentaFechas>";
	$form .= "<div class='col-lg-3'>";
	$form.="</div>";
	$form .= "<div class='col-lg-6'>";
	$form .="<fieldset>";
	$form .=" <div>";
	$form.="<br>";
	$form .="<label form='nombre'> BUSQUEDA DE VENTAS POR FECHAS </label>";
	$form.="<br>";
	$form.="<input id='fechaInicial' class='form-control' name='fechaInicial' />";
	$form.="<br>";
	$form.="<input id='fechaFinal' class='form-control' name='fechaFinal' />";
	$form.="<br>";
	$form.="<input type='submit'class='btn btn-success' value='Buscar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='buscarVentasFechas' id='Transaccion' name='Transaccion' />";
	$form.="<hr>";
	$form.="</div>";
	$form.="</fieldset>";
		$form.="</div>";
	$form .= "<div class='col-lg-3'>";
	$form.="</div>";
	$form.="</form>";
	$form.="<br>";
			if($consulta = $con->query($sql))
				{
					while($fila = $consulta->fetch_assoc())
	               {
	               		$fecha3=$fila["fechaVenta"];
	               		$sql2="SELECT * FROM venta where fechaVenta='$fecha3' order by idVenta";
						//<div style="border: 2px solid rgb(204, 102, 204);">

	               		$form.="<div class='col-xs-12'  style='border: 1px solid; border-color:black;'><br><b>Fecha: </b>".$fecha3."<br>";
	               		if($consulta2 = $con->query($sql2))
						{
							$form.="<hr>";
							while($fila2 = $consulta2->fetch_assoc())
			               {
			               		$idventa1=$fila2["idVenta"]." ";
			               		$sql3="SELECT * FROM venta INNER JOIN detalle_venta where venta.idVenta=detalle_venta.idVenta and venta.idVenta='$idventa1'";
			               		$valor= "<b>Tipo Documento: </b>".$fila2["tipo_Documento"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Numero documento: </b>".$fila2["documento"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total : </b>".$fila2["total"];
			               		$form.= "<div class='col-xs-12 ' rgb(204, 102, 204);'><br>".$valor."<br><br>";
			               		if($consulta3 = $con->query($sql3))
								{
									
									while($fila3 = $consulta3->fetch_assoc())
					               {
					               	$valor2= "<b>Nombre Producto: </b>".Productos($fila3["idProducto"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Cantidad: </b>".$fila3["cantidad"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>precio Unitario :</b>".$fila3["precio_Unitario"];
					              // 	$iddetalle=$fila3["idDetalle_Venta"];
					               		$form.= "<div class='col-xs-12  '><small>".$valor2."</small></div>";
					               }        
								} 
							$form.="</div><br><br>";   
			               }

						} 	
						$form.="</div>";
	               }

				}
/*
                        <div class="panel-heading">
                            Collapsible Accordion Panel Group
                        </div>
                        <!-- .panel-heading -->
                        <div class='panel-body'>
                            <div class='panel-group' id='accordion'>
                                <div class='panel panel-default'>
                                    <div class="panel-heading">
                                        <h4 class='panel-title'>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Collapsible Group Item #1</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->*/
                    
				 return printf($form);

	/*$estado="Activo";
	//SELECT * FROM venta INNER JOIN detalle_venta where venta.idVenta=detalle_venta.idVenta and venta.fechaVenta BETWEEN '2016-05-03' and '2016-05-03'


		$cnn = new Conexion();
		$con = $cnn->conexionMysql();
		mysqli_select_db($con,"sistemaferreteria");
		$sql="SELECT * FROM venta INNER JOIN detalle_venta where venta.idVenta=detalle_venta.idVenta and venta.fechaVenta BETWEEN '$fecha1' AND '$fecha2' ORDER BY venta.fechaVenta";
			if($consulta = $con->query($sql))
				{
				$factura= '<div class="col-xs-6">
				<h1><a href=" "><img alt="" src="logo.png" /> Logo aquí </a></h1>
				</div>';
				$factura.='<table class="table table-bordered">
				<thead>
				<tr>
				<th>
				<h4>IdVenta</h4>
				</th>
				<th>
				<h4>Fecha Venta</h4>
				</th>
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
	                $factura.='<td>'.$fila["idVenta"].'</td>';
	                $factura.='<td>'.$fila["fechaVenta"].'</td>';
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
 return printf($factura);*/

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
 ?>