<?php 
	require_once "coneccion.php";
		$mysql = conexionMysql();
		$usuario= $_POST["usuario"];
		$password= $_POST["password"];
		$sql = "SELECT * FROM usuarios where usuario='$usuario' and password='$password'";
		$consulta = $mysql->query($sql);
		if($consulta->num_rows>0)
		{
			echo "admin"
		}
		else{
			echo "ventas";
		}

 ?>