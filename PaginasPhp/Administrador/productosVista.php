<?php 
require_once "..\app\coneccion.php";
function catalogoCategorias($id)
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$catalogo="";
	$sql = "SELECT * FROM categoria WHERE idCategoria='$id' and estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	if($resultado = $con->query($sql)) {
		 while($fila = $resultado->fetch_assoc())
             {
				$catalogo= $fila["descripcion"];
			}
			$resultado->free();
	}
	$con->close();
	return $catalogo;
}
function catalogoCategorias1($id)
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM categoria  where estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
		$resultado=$con->query($sql);
		$lista="<select id='categoria' class='form-control' name='categoria_cbo' required>";
		$lista.="<option value=''>Seleccionar</option>";
		 while($fila = $resultado->fetch_assoc())
             {
             	if($fila["idCategoria"]==$id){
             		$lista.="<option  selected='selected' value='".$fila["idCategoria"]."'>".$fila["descripcion"]."</option>";
             	}else{
             		$lista.="<option value='".$fila["idCategoria"]."'>".$fila["descripcion"]."</option>";	
             	}
             				
			}
			$lista.="</select>";
			$resultado->free();

	$con->close();
	return $lista;
}
function catalogoUnidades1($id)
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM unidad  where estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$resultado=$con->query($sql);
		$lista="<select id='unidad'class='form-control' name='unidad_cbo' required>";
		$lista.="<option value=''>Seleccionar</option>";
		 while($fila = $resultado->fetch_assoc())
             {
             	if($fila["idUnidad"]==$id){
             		$lista.="<option  selected='selected' value='".$fila["idUnidad"]."'>".$fila["descripcion"]."</option>";
             	}
             	else{
             		$lista.="<option value='".$fila["idUnidad"]."'>".$fila["descripcion"]."</option>";	
             	}
             	
			}
			$lista.="</select>";
			$resultado->free();
	$con->close();
	return $lista;
}
function catalogoUnidades($id)
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$catalogo="";
	$sql = "SELECT * FROM unidad WHERE idUnidad='$id' and estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	if($resultado = $con->query($sql)) {
		 while($fila = $resultado->fetch_assoc())
             {
				$catalogo= $fila["descripcion"];
			}
			$resultado->free();
	}
	$con->close();
	return $catalogo;
}
function selectCategorias()
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM categoria  where estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
		$resultado=$con->query($sql);
		$lista="<select id='categoria' class='form-control' name='categoria_cbo' required>";
		$lista.="<option value=''>Seleccionar</option>";
		 while($fila = $resultado->fetch_assoc())
             {
				$lista.="<option value='".$fila["idCategoria"]."'>".$fila["descripcion"]."</option>";
			}
			$lista.="</select>";
			$resultado->free();

	$con->close();
	return $lista;
}
function selectUnidades()
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM unidad  where estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$resultado=$con->query($sql);
		$lista="<select id='unidad'class='form-control' name='unidad_cbo' required>";
		$lista.="<option value=''>Seleccionar</option>";
		 while($fila = $resultado->fetch_assoc())
             {
				$lista.="<option value='".$fila["idUnidad"]."'>".$fila["descripcion"]."</option>";
			}
			$lista.="</select>";
			$resultado->free();
	$con->close();
	return $lista;
}

function mostrarProducto()
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM producto WHERE estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	$contador=1;
	if($resultado = $con->query($sql)) {
		$table.="<table class='table table-striped table-condensed table-hover'>";
        	  $table.="<thead>";
        	  $table.="<tr>";
              $table.="<th width='100'>Numero</th>";
              $table.="<th width='150'>Categoria</th>";
              $table.="<th width='150'>Unidad</th>";
              $table.="<th width='150'>Nombre</th>";
              $table.="<th width='150'>Descripcion</th>";
              $table.="<th width='100'>Precio Compra</th>";
              $table.="<th width='100'>Precio Venta</th>";
              $table.="<th width='100'>fecha</th>";
              $table.="<th width='100'>Stock</th>";
              $table.="<th></th>";
              $table.="</tr>";  
              $table.="</thead>"; 
               $table.="<tbody>";
               while($fila = $resultado->fetch_assoc())
               {
                $table.="<tr>";
               	$table.="<td>".$contador."</td>";
               	$table.="<td>".catalogoCategorias($fila["idCategoria"])."</td>";
               	$table.="<td>".catalogoUnidades($fila["idUnidad"])."</td>";
               	$table.="<td>".$fila["nombre"]."</td>";
               	$table.="<td>".$fila["descripcion"]."</td>";
               	$table.="<td>".$fila["precio_compra"]."</td>";
               	$table.="<td>".$fila["precio_venta"]."</td>";
               	$table.="<td>".$fila["fecha"]."</td>";
               	$table.="<td>".$fila["stock"]."</td>";
               	$table.="<td><a class='btn icon-btn btn-success' href='javascript:editarProducto(".$fila["idProducto"].")'>Editar</a>";
               	$table.="   <a class='btn icon-btn btn-danger' href='javascript:eliminarProducto(".$fila["idProducto"].")'>Eliminar</a></td>";
               	 $table.="</tr>"; 
               	 $contador=$contador+1;
               }
               $resultado->free();

              $table.="</tbody>";
               $table.="</table>";
               $respuesta=$table;
	}
	else
	{
					$respuesta= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se ejecuto la consulta a la Base de Datos.
					</div>';
	}
		$con->close();
	return printf($respuesta);
}
function mostrarProductoVendedor()
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM producto WHERE estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	$contador=1;
	if($resultado = $con->query($sql)) {
		$table.="<table class='table table-striped table-condensed table-hover'>";
        	  $table.="<thead>";
        	  $table.="<tr>";
              $table.="<th width='100'>Numero</th>";
              $table.="<th width='150'>Categoria</th>";
              $table.="<th width='150'>Unidad</th>";
              $table.="<th width='150'>Nombre</th>";
              $table.="<th width='150'>Descripcion</th>";
              $table.="<th width='100'>Precio Compra</th>";
              $table.="<th width='100'>Precio Venta</th>";
              $table.="<th width='100'>fecha</th>";
              $table.="<th width='100'>Stock</th>";
              $table.="</tr>";  
              $table.="</thead>"; 
               $table.="<tbody>";
               while($fila = $resultado->fetch_assoc())
               {
                $table.="<tr>";
               	$table.="<td>".$contador."</td>";
               	$table.="<td>".catalogoCategorias($fila["idCategoria"])."</td>";
               	$table.="<td>".catalogoUnidades($fila["idUnidad"])."</td>";
               	$table.="<td>".$fila["nombre"]."</td>";
               	$table.="<td>".$fila["descripcion"]."</td>";
               	$table.="<td>".$fila["precio_compra"]."</td>";
               	$table.="<td>".$fila["precio_venta"]."</td>";
               	$table.="<td>".$fila["fecha"]."</td>";
               	$table.="<td>".$fila["stock"]."</td>";
                $table.="</tr>"; 
               	 $contador=$contador+1;
               }
               $resultado->free();

              $table.="</tbody>";
               $table.="</table>";
               $respuesta=$table;
	}
	else
	{
					$respuesta= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> No se ejecuto la consulta a la Base de Datos.
					</div>';
	}
		$con->close();
	return printf($respuesta);
}
function altaProducto(){
	$form = "<form id='alta-producto' class='formulario' data-insertarProducto>";
	$form .="<fieldset>";
	$form .="<div>";
	$form .="<label form='categoria'> Categoria: </label>";
	$form .=selectCategorias();
	$form .="<label form='unidad'> Unidad: </label>";
	$form .=selectUnidades();
	$form .="<label form='nombre'> Nombre: </label>";
	$form.="<input type='text' id='nombre' class='form-control' name='nombre_txt' required />";
	$form .="<label form='descripcion'> Descripcion: </label>";
	$form.="<textArea rows='5' type='text' id='descripcion' class='form-control' name='descripcion_txt' required></textArea>";	
	$form .="<label form='preciocompra'> Precio Compra: </label>";
	$form.="<input type='text' id='preciocompra' class='form-control' name='preciocompra_txt' required />";
	$form .="<label form='precioventa'> Precio Venta: </label>";
	$form.="<input type='text' id='precioventa' class='form-control' name='precioventa_txt' required />";
	$form .="<label form='fecha'> Fecha: </label>";
	$form.="<input id='fecha' class='form-control' name='fecha_txt' required />";
	$form .="<label form='stock'> Stock: </label>";
	$form.="<input type='number' id='stock' class='form-control' name='stock_txt' required />";
	$form.="<br>";
	$form.="<input type='submit' class='btn btn-success' value='Registrar' id='insertar-btn' name='insertar_btn' />";
	$form.="<input type='hidden' value='insertarProducto' id='Transaccion' name='Transaccion' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	return printf($form);
}

function cargarDatosProducto($id){
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM producto WHERE idProducto='$id'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	if($resultado = $con->query($sql)) {
		$fila=$resultado->fetch_assoc();
	$form = "<form id='editar-producto' class='formulario' data-editarProducto>";
	$form .="<fieldset>";
	$form .="<div>";
	$form .="<label form='categoria'> Categoria: </label>";
	$form .=catalogoCategorias1($fila["idCategoria"]);
	$form .="<label form='unidad'> Unidad: </label>";
	$form .=catalogoUnidades1($fila["idUnidad"]);
	$form .="<label form='nombre'> Nombre: </label>";
	$form.="<input type='text' id='nombre' value='".$fila["nombre"]."' class='form-control' name='nombre_txt' required />";
	$form .="<label form='descripcion'> Descripcion: </label>";
	$form.="<textArea rows='5' type='text' id='descripcion' class='form-control' name='descripcion_txt' required>".$fila["descripcion"]."</textArea>";	
	$form .="<label form='preciocompra'> Precio Compra: </label>";
	$form.="<input type='text' id='preciocompra' value='".$fila["precio_compra"]."' class='form-control' name='preciocompra_txt''".$fila["descripcion"]."' required />";
	$form .="<label form='precioventa'> Precio Venta: </label>";
	$form.="<input type='text' id='precioventa' class='form-control' value='".$fila["precio_venta"]."' name='precioventa_txt' required />";
	$form .="<label form='fecha'> Fecha: </label>";
	$form.="<input id='fecha' class='form-control' value='".$fila["fecha"]."' name='fecha_txt' required />";
	$form .="<label form='stock'> Stock: </label>";
	$form.="<input type='number' id='stock' class='form-control' value='".$fila["stock"]."' name='stock_txt' required />";
     $form.="<br>";
	$form.="<input type='submit'class='btn btn-info' value='Editar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='editarProducto' id='Transaccion' name='Transaccion' />";
	$form.="<input type='hidden'  value='".$fila["idProducto"]."' id='cod' name='cod' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	$form.="<hr>";
	}
	
	return printf($form);
}
 ?>


