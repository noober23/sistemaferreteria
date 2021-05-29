<?php 
require_once "..\app\coneccion.php";

function mostrarUnidad()
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM unidad WHERE estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	$contador=1;
	if($resultado = $con->query($sql)) {
		$table.="<table class='table table-striped table-condensed table-hover'>";
        	 $table.="<thead>";
        	 $table.="<tr>";
            $table.="<th width='300'>Numero</th>";
             $table.="<th width='300'>Descripcion</th>";
              $table.="<th></th>";
              $table.="</tr>";  
              $table.="</thead>"; 
               $table.="<tbody>";
               while($fila = $resultado->fetch_assoc())
               {
               	$table.="<tr>";
               	$table.="<td>".$contador."</td>";
               	$table.="<td>".$fila["descripcion"]."</td>";
               	$table.="<td><a class='btn icon-btn btn-success' href='javascript:editarUnidad(".$fila["idUnidad"].")'>Editar</a>";
               	$table.="   <a class='btn icon-btn btn-danger' href='javascript:eliminarUnidad(".$fila["idUnidad"].")'>Eliminar</a></td>";
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
function altaUnidad(){
	$form = "<form id='alta-unidad' class='formulario' data-insertarUnidad>";
	$form .="<fieldset>";
	$form .=" <div>";
	$form .=" <label form='descripcion'> Descripcion: </label>";
	$form.="<input type='text' id='descripcion' class='form-control' name='descripcion_txt' required />";
	$form.="<br>";	
	$form.="<input type='submit' class='btn btn-success' value='Registrar' id='insertar-btn' name='insertar_btn' />";
	$form.="<input type='hidden' value='insertarUnidad' id='Transaccion' name='Transaccion' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	return printf($form);
}
function cargarDatosUnidad($id){
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM unidad WHERE idUnidad='$id'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	if($resultado = $con->query($sql)) {
		$fila=$resultado->fetch_assoc();
	$form = "<form id='editar-unidad' class='formulario' data-editarUnidad>";
	$form .="<fieldset>";
	$form .=" <div>";
	$form .=" <label form='descripcion'> Descripcion: </label>";
	$form.="<input type='descripcion' id='descripcion'  value='".$fila["descripcion"]."' class='form-control' name='descripcion_txt' required />";                     
     $form.="<br>";
	$form.="<input type='submit'class='btn btn-info' value='Editar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='editarUnidad' id='Transaccion' name='Transaccion' />";
	$form.="<input type='hidden'  value='".$fila["idUnidad"]."' id='cod' name='cod' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	$form.="<hr>";
	}
	
	return printf($form);
}

 ?>


