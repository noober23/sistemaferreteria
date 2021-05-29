<?php
	require("coneccion");

	mysqli_select_db();

	error_reporting(E_PARSE);

	const BACKUP_PATH;
function backup(){
	$fecha = date("h-m-s_d-m-y");
		$ruta ="backup/($fecha)";
		if(is_writable("backup")){
			if(file_exists($ruta)){
				unlink($ruta);
			}
			else{
				$comando = "mysqldump -u";
				return system($comando);
			}
		}
		else
		{
 			return "El directorio no tiene permisos de escritura"
		}
	
}



?>