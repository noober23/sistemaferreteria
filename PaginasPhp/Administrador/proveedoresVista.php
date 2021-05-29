<?php 
require_once "..\app\coneccion.php";

function mostrarProveedor()
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM proveedor WHERE estado='$estado'";
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
              $table.="<th width='150'>Celular</th>";
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
               	$table.="<td>".$fila["celular"]."</td>";
               	$table.="<td><a class='btn icon-btn btn-success' href='javascript:editarProveedor(".$fila["idProveedor"].")'>Editar</a>";
               	$table.="   <a class='btn icon-btn btn-danger' href='javascript:eliminarProveedor(".$fila["idProveedor"].")'>Eliminar</a></td>";
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
function altaProveedor(){
	$form = "<form id='alta-proveedor' class='formulario' data-insertarProveedor>";
	$form .="<fieldset>";
	$form .="<div>";
	$form .="<label form='nombre'> Nombre: </label>";
	$form.="<input type='text' id='nombre' class='form-control' name='nombre_txt' required />";
	$form .="<label form='apellidos'> Apellidos: </label>";
	$form.="<input type='text' id='apellidos' class='form-control' name='apellidos_txt' required />";	
	$form .="<label form='documentoIdentidad'> Documento Identidad: </label>";
	$form.="<input type='number' id='documentoIdentidad' class='form-control' name='documentoIdentidad_txt' required />";
	$form .="<label form='direccion'> Direccion: </label>";
	$form.="<input type='text' id='direccion' class='form-control' name='direccion_txt' required />";
	$form .="<label form='telefono'> Telefono: </label>";
	$form.="<input type='number' id='telefono' class='form-control' name='telefono_txt' />";
	$form .="<label form='celular'> Celular: </label>";
	$form.="<input type='number' id='celular' class='form-control' name='celular_txt'  />";
	$form.="<br>";
	$form.="<input type='submit' class='btn btn-success' value='Registrar' id='insertar-btn' name='insertar_btn' />";
	$form.="<input type='hidden' value='insertarProveedor' id='Transaccion' name='Transaccion' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	return printf($form);
}
function cargarDatosProveedor($id){
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM proveedor WHERE idProveedor='$id'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	if($resultado = $con->query($sql)) {
		$fila=$resultado->fetch_assoc();
	$form = "<form id='editar-proveedor' class='formulario' data-editarProveedor>";
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
	$form.="<input type='number' id='telefono'  value='".$fila["telefono"]."' class='form-control' name='telefono_txt'  />";  
	$form .=" <label form='celular'> Celular: </label>";
	$form.="<input type='number' id='celular'  value='".$fila["celular"]."' class='form-control' name='celular_txt'  />";                     
     $form.="<br>";
	$form.="<input type='submit'class='btn btn-info' value='Editar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='editarProveedor' id='Transaccion' name='Transaccion' />";
	$form.="<input type='hidden'  value='".$fila["idProveedor"]."' id='cod' name='cod' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	$form.="<hr>";
	}
	
	return printf($form);
}
 ?>



