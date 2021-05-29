<?php 
require_once "..\app\coneccion.php";

function mostrar()
{
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM usuarios WHERE Estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$consulta = mysqli_query($con,$sql);
	$table="";
	if($resultado = $con->query($sql)) {
		$table.="<table class='table table-striped table-condensed table-hover'>";
        	 $table.="<thead>";
        	 $table.="<tr>";
            $table.="<th width='300'>usuario</th>";
             $table.="<th width='300'>Email</th>";
              $table.="<th width='300'>Tipo</th>";
              $table.="<th></th>";
              $table.="</tr>";  
              $table.="</thead>"; 
               $table.="<tbody>";
               while($fila = $consulta->fetch_assoc())
               {
               	$table.="<tr>";
               	$table.="<td>".$fila["usuario"]."</td>";
               	$table.="<td>".$fila["password"]."</td>";
               	$table.="<td>".$fila["tipoUsuario"]."</td>";
               	$table.="<td><a class='btn icon-btn btn-success' href='javascript:editarUsuario(".$fila["id"].")'>Editar</a>";
               	$table.="   <a class='btn icon-btn btn-danger' href='javascript:eliminarUsuario(".$fila["id"].")'>Eliminar</a></td>";
               	 $table.="</tr>"; 
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
function altaUsuario(){
	$form = "<form id='alta-usuarios' class='formulario' data-insertarUsuario>";
	$form .="<fieldset>";
	$form .=" <div>";
	$form .=" <label form='email'> Email: </label>";
	$form.="<input type='email' id='email' class='form-control' name='email_txt' required />";
	$form .=" <label form='nombre'> Password: </label>";
	$form.="<input type='text' id='password' class='form-control' name='password_txt' required />";	
	$form .=" <label form='tipoUsuario'> Tipo: </label>";
	$form.="<select class='form-control' name='tipo_cbo'>
                                <option value='ADMINISTRADOR'>ADMINISTRADOR</option>
                                <option value='VENDEDOR'>VENDEDOR</option>
                            </select>";
                            $form.="<br>";
	$form.="<input type='submit' class='btn btn-success' value='Registrar' id='insertar-btn' name='insertar_btn' />";
	$form.="<input type='hidden' value='insertarUsuario' id='Transaccion' name='Transaccion' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	return printf($form);
}
function cargarDatos($id){
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM usuarios WHERE id='$id'";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	if($resultado = $con->query($sql)) {
		$fila=$resultado->fetch_assoc();
	$form = "<form id='editar-usuarios' class='formulario' data-editarUsuario>";
	$form .="<fieldset>";
	$form .=" <div>";
	$form .=" <label form='email'> Email: </label>";
	$form.="<input type='email' id='email'  value='".$fila["usuario"]."' class='form-control' name='email_txt' required />";
	$form .=" <label form='nombre'> Password: </label>";
	$form.="<input type='text' id='password' value='".$fila["password"]."'class='form-control' name='password_txt' required />";	
	$form .=" <label form='tipoUsuario'> Tipo: </label>";
	$valor=$fila["tipoUsuario"];
	 $variable="";
                  if($valor=="ADMINISTRADOR")
                   {
                      $variable="<option selected='selected' value='ADMINISTRADOR'>ADMINISTRADOR</option>
                       <option value='VENDEDOR'>VENDEDOR</option>";
                    }else{
                            	$variable="<option value='ADMINISTRADOR'>ADMINISTRADOR</option>
                                <option selected='selected' value='VENDEDOR'>VENDEDOR</option>";
                            }
	$form.="<select class='form-control' name='tipo_cbo'>".$variable."
                                
                            </select>";
                           
     $form.="<br>";
	$form.="<input type='submit'class='btn btn-info' value='Editar' id='editar-btn' name='editar_btn' />";
	$form.="<input type='hidden' value='editarUsuario' id='Transaccion' name='Transaccion' />";
	$form.="<input type='hidden'  value='".$fila["id"]."' id='cod' name='cod' />";
	$form.="</div>";
	$form.="</fieldset>";
	$form.="</form>";
	$form.="<hr>";
	}
	
	return printf($form);
}
 ?>


