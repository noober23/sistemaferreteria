<?php 
require_once "..\app\coneccion.php";
function catalogoCategoriasVenta()
{
 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM categoria  where estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
		$resultado=$con->query($sql);
		$lista="<select id='categoria' class='form-control' name='categoria_cbo' required>";
		 while($fila = $resultado->fetch_assoc())
             {
             	$lista.="<option value='".$fila["idCategoria"]."'>".$fila["descripcion"]."</option>";	           				
			}
			$lista.="</select>";
			$resultado->free();

	$con->close();
	return $lista;
}
function Venta()
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM venta WHERE estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	$contador=1;
	if($resultado = $con->query($sql)) {
		$table.="<table class='table table-striped table-condensed table-hover'>";
        	 $table.="<thead>";
        	 $table.="<tr>";
            $table.="<th width='150'>Numero</th>";
             $table.="<th width='150'>Nombre</th>";
              $table.="<th width='150'>Apellidos</th>";
              $table.="<th width='150'>Documento Identidad</th>";
              $table.="<th width='150'>Direccion</th>";
             $table.="<th width='150'>Telefono</th>";
              $table.="<th></th>";
              $table.="</tr>";  
              $table.="</thead>"; 
               $table.="<tbody>";
               while($fila = $resultado->fetch_assoc())
               {
                $table.="<tr>";
               	$table.="<td>".$contador."</td>";
               	$table.="<td>".$fila["nombre"]."</td>";
               	$table.="<td>".$fila["apellidos"]."</td>";
               	$table.="<td>".$fila["documento_Identidad"]."</td>";
               	$table.="<td>".$fila["direccion"]."</td>";
               	$table.="<td>".$fila["telefono"]."</td>";
               	$table.="<td><a class='btn icon-btn btn-success' href='javascript:editarCliente(".$fila["idCliente"].")'>Editar</a>";
               	$table.="<a class='btn icon-btn btn-danger' href='javascript:eliminarCliente(".$fila["idCliente"].")'>Eliminar</a></td>";
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
function ya()
{
	$form = "<div class='col-lg-6'>";
	$form .= "<form id='alta-producto23' class='formulario' data-buscarr>";
	$form .="<fieldset class='scheduler-border'>";
	 $form .="<legend>Datos de producto</legend>"; 
	$form .="<div>";
	$form .="<label form='tipoCategorias'> Categorias: </label>";
	$form.=catalogoCategoriasVenta();	
	$form .="<label form='listaProductos'> Lista de Productos: </label>";
	$form.="<select class='form-control' name='listaPro' id='listaPro'>
                            </select>";	
	$form .="<label form='precio_venta'> Precio venta: </label>";
	$form.="<input type='number' value='0' id='precio_venta' class='form-control' name='precio_venta_txt' />";
	$form .="<label form='stock'> Stock: </label>";
	$form.="<input type='number' value='0' id='stock' class='form-control' name='stock_txt'  />";                        
	$form .="<label form='fecha'> Fecha de venta: </label>";
	$form.="<input type='text' id='fecha' class='form-control' name='fecha_txt' required />";
	$form .="<label form='total'> Total: </label>";
	$form.="<input type='number' value='0' id='total' class='form-control' name='total_txt' required />";
	$form.="<br>";
	$form.="<input type='submit' class='btn btn-success' value='Registrar' id='insertar-btn' name='insertar_btn' />";
	$form.="<input type='hidden' value='productos' id='Transaccion' name='Transaccion' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="<table class='table table-striped table-condensed table-hover' id='tablas' name='tablas'>";
        	  $form.="<thead>";
        	  $form.="<tr>";
              $form.="<th width='100'>Numero</th>";
              $form.="<th width='150'>Categoria</th>";
              $form.="<th width='150'>Nombre</th>";
              $form.="<th width='150'>Descripcion</th>";
              $form.="<th width='100'>Precio Venta</th>";
              $form.="<th width='100'>fecha</th>";
              $form.="<th width='100'>Stock</th>";
              $form.="<th></th>";
              $form.="</tr>";  
              $form.="</thead>"; 
               $form.="<tbody>";
               $form.="</tbody>";
               $form.="</table>";
	$form.="</form>";
		$form.="</div>";
		$form.="<div id='respuesta' name='respuesta'>";
		$form.="</div>";
	return printf($form);
}
function altaVentaDetalle(){

	$form = "<form id='alta-VentaDetalle' class='formulario' data-insertarVentaDetalles>";
	$form .= "<div class='col-lg-4'>";
	$form .="<fieldset class='scheduler-border'>";
	$form .="<legend>Datos de cliente</legend>"; 	
	$form .="<label form='documentoIdentidad'> Documento Identidad: </label>";
	$form.="<input type='number' id='documentoIdentidad' class='form-control' name='documentoIdentidad_txt' required />";
	$form .="<label form='nombre'> Nombre: </label>";
	$form.="<input type='text' id='nombre' class='form-control' name='nombre_txt' disabled='disabled' required />";
	$form .="<label form='apellidos'> Apellidos: </label>";
	$form.="<input type='text' id='apellidos' class='form-control' name='apellidos_txt' disabled='disabled'  required />";	
	$form .="<label form='direccion'> Direccion: </label>";
	$form.="<input type='text' id='direccion' class='form-control' name='direccion_txt' disabled='disabled'   />";
	$form .="<label form='telefono'> Telefono: </label>";
	$form.="<input type='number' id='telefono' class='form-control' name='telefono_txt' disabled='disabled'  />";
	$form.="<br>";
	$form.="</fieldset>";
	$form.="</div>";
	$form .= "<div class='col-lg-4'>";
	$form .="<fieldset class='scheduler-border'>";
	 $form .="<legend>Datos de factura</legend>"; 
	$form .="<label form='tipoDocumento'> Tipo documento: </label>";
	$form.="<select class='form-control' name='tipo_cbo'>
                              <option value='RECIBO'>RECIBO</option>
                              <option value='FACTURA'>FACTURA</option>
                            </select>";	
	$form .="<label form='documento'> Numero documento: </label>";
	$form.="<input type='number' id='documento' class='form-control' name='documento_txt' required />";
	$form .="<label form='fecha'> Fecha de venta: </label>";
	$form.="<input type='text' id='fecha' class='form-control' name='fecha_txt' required />";
	$form.="<br>";
	$form.="</fieldset>";
	$form.="</div>";

	$form .= "<div class='col-lg-4'>";
	$form .="<fieldset class='scheduler-border'>";
	$form .="<legend>Datos de producto</legend>"; 
	$form .="<label form='tipoCategorias'> Categorias: </label>";
	$form.=catalogoCategoriasVenta();	
	$form .="<label form='listaProductos'> Lista de Productos: </label>";
	$form.="<select class='form-control' name='listaPro' id='listaPro'>
                            </select>";	
	$form .="<label form='precio_venta'> Precio venta: </label>";
	$form.="<input type='number' value='0' id='precio_venta' class='form-control' name='precio_venta_txt' disabled='disabled' />";
	$form .="<label form='stock'> Stock: </label>";
	$form.="<input type='number' value='0' id='stock' class='form-control' name='stock_txt' disabled='disabled' />";                        
	$form .="<label form='cantidad'> Cantidad: </label>";
	$form.="<input type='number' value='0' id='cantidad' class='form-control' name='cantidad_txt' required />";
	$form.="<br>";
	$form.="<input class='btn btn-success' value='Agregar Producto' id='insertar-producto' name='insertar_producto' />";
	$form.="</fieldset>";
	$form.="</div>";
	$form.="<table class='table table-striped table-condensed table-hover' id='tablas' name='tablas'>";
        	  $form.="<thead>";
        	  $form.="<tr>";
              $form.="<th width='100'>Numero</th>";
              $form.="<th width='150'>Categoria</th>";
              $form.="<th width='150'>Descripcion</th>";
              $form.="<th width='100'>Precio Venta</th>";
              $form.="<th width='100'>Cantidad</th>";
              $form.="<th></th>";
              $form.="</tr>";  
              $form.="</thead>"; 
               $form.="<tbody>";
               $form.="</tbody>";
    $form.="</table>";
    $form.="<br>";
	$form .="<label form='total'> total: </label>";
	$form.="<input type='number' value='0' id='total' class='form-control' name='total_txt' disabled='disabled'  />";
	$form.="<br>";
	$form.="<input type='reset' class='btn btn-warning' value='Sumar total' id='sumar-producto' name='sumar_producto' />";
	$form.="<input type='submit' class='btn btn-default' value='Insertar Venta' id='insertar-venta' name='insertar-venta' />";
	$form.="<input type='hidden' value='insertarVentaDetalle' id='Transaccion' name='Transaccion' />";
	$form.="</form>";
		$form.="</div>";
		$form.="<div id='respuesta' name='respuesta'>";
		$form.="</div>";
	return printf($form);
}
function cargarDatosVenta($id){
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM cliente WHERE idCliente='$id'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	if($resultado = $con->query($sql)) {
		$fila=$resultado->fetch_assoc();
	$form = "<form id='editar-cliente' class='formulario' data-editar>";
	$form .="<fieldset>";
	$form .="<div>";
	$form .="<label form='nombre'> Nombre: </label>";
	$form.="<input type='text' id='nombre'  value='".$fila["nombre"]."' class='form-control' name='nombre_txt' required />";
	$form .=" <label form='apellidos'> Apellidos: </label>";
	$form.="<input type='text' id='apellidos' value='".$fila["apellidos"]."'class='form-control' name='apellidos_txt' required />";	
	$form .=" <label form='documentoIdentidad'> Documento Identidad: </label>";
	$form.="<input type='number' id='documentoIdentidad'  value='".$fila["documento_Identidad"]."' class='form-control' name='documentoIdentidad_txt' required />";
	$form .=" <label form='direccion'> Direccion: </label>";
	$form.="<input type='text' id='direccion' value='".$fila["direccion"]."'class='form-control' name='direccion_txt' required />";
	$form .=" <label form='telefono'> Telefono: </label>";
	$form.="<input type='number' id='telefono'  value='".$fila["telefono"]."' class='form-control' name='telefono_txt' required />";                      
     $form.="<br>";
	$form.="<input type='submit'class='btn btn-info' value='Editar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='editar' id='Transaccion' name='Transaccion' />";
	$form.="<input type='hidden'  value='".$fila["idCliente"]."' id='cod' name='cod' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	$form.="<hr>";
	}
	
	return printf($form);
}
 ?>


