<?php 
	include("../app/coneccion.php");
		$cnn = new Conexion();
		$con = $cnn->conexionMysql();
		$usuario = $_POST['usuario'];
		$pass = $_POST['password'];
		mysqli_select_db($con,"sistemaferreteria");
		$estado="Activo";
		$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and password='$pass'";	
		if($consulta = $con->query($sql))
		{
					
					if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != "")
					{
						$fila = mysqli_num_rows($consulta);
						$registro=$consulta->fetch_assoc();
						if($fila>0){
							session_start();
						  	$_SESSION['usuario']= $_POST["usuario"];
						  	$_SESSION['password']= $_POST["password"];
						  	$_SESSION['tipoUsuario']= $registro["tipoUsuario"];
						  	switch ($registro["tipoUsuario"]) {
						  		case 'ADMINISTRADOR':
						  			echo "ADMINISTRADOR";
						  			header("Location:indexAdministrador.php");
						  			break;
						  		case 'VENDEDOR':
						  			echo "VENDEDOR";
						  			header("Location:indexVendedor.php");
						  			break;	
						  	}						  	
						}
						else
						{
							echo "USUARIO O PASSWORD INCORRECTO VERIFIQUE";
						}
						
					}
					else{
							if(trim($_POST["usuario"]) == "" && trim($_POST["password"]) == "")
							{
								echo "LOS CAMPOS USUARIO Y PASSWORD NO PUEDEN SER VACIOS";
							}
							else{
					    		if(trim($_POST["usuario"])=="")
					    		{
					    			echo "EL CAMPO DE USUARIO NO PUEDE SER VACIO";
						    	}
						    	else
						    	{
						    		if(trim($_POST["password"])=="") 
						    		{
						    			echo "EL CAMPO DE PASSWORD NO PUEDE SER VACIO";
						    		}
						    	}							
							}
					}

			/*	$mensaje= '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Bien!</strong> '.$fila.'Los datos fueron correctamente ingresados de la base de datos.
					</div>';*/
		}else
		{
				$mensaje= '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>¡Cuidado!</strong> Ocurrio un error vuelva a ingresar los datos correctamente.
					</div>';
		}
		//return echo
		/*$cnn = new Conexion();
		$con = $cnn->conexionMysql();

		mysqli_select_db($con,"sistemaferreteria");
		$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and password='$pass'";
		$consulta = mysqli_query($con,$sql);
		$fila = mysqli_num_rows($consulta);
		$fila2 = mysqli_fetch_row($consulta);
		if(isset($_POST["usuario"]) && isset($_POST["password"]))
		{

    		if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != ""){			         
					  if ($fila<0) {
					  	echo "USUARIO O PASSWORD INCORRECTO VERIFIQUE";
					  }
					  else
					  {
					  	session_start();
					  	$_SESSION["usuario"]= $_POST["usuario"];
					  	$_SESSION["password"]= $_POST["password"];
					  //	$_SESSION["tipoUsuario"]= $fila["tipoUsuario"];
					  }
		    }
		    else
		    {
		    	if(trim($_POST["usuario"]) == "" && trim($_POST["password"]) == "")
		    	{
    				echo "INGRESA USUARIO Y PASSWORD";
		    	}
		    	else
		    	{
		    		if(trim($_POST["usuario"])=="")
		    		{
		    		echo "EL CAMPO DE USUARIO NO PUEDE SER VACIO";
			    	}
			    	else
			    	{
			    		if(trim($_POST["password"])=="") 
			    		{
			    			echo "EL CAMPO DE PASSWORD NO PUEDE SER VACIO";
			    		}
			    	}
		    	}
		    }

		}
		else
		{
			echo "nada";
		}*/


 ?>