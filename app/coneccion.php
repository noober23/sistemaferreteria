<?php 
// require("config.php");
class Conexion{
	public function conexionMysql()
	{
		return mysqli_connect("localhost","root","");
		session_save_path("temp" ); 
		session_start();
	}
}
 ?>