<?php
	require_once "app/coneccion.php";

	$cnn= new Conexion();
	$con = $cnn->conexionMysql();

	if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

	//seleccionar por stock

	mysqli_select_db($con,"sistemaferreteria");
	$query = "SELECT nombre,stock FROM producto WHERE stock>100";
	

	if($resulta = $con->query($query))
	{	

		$rows = array();
		$col =array();
		while($r = $resulta->fetch_assoc())
		{
	    	$nombre = $r["nombre"];
	    	$stock = $r["stock"];

	    	$col[]=array('nombre'=> $nombre,'stock'=>$stock);
		}

		$rows['col'] = $col;

		$json_array = json_encode($rows);
		echo $json_array;
	}
	else{
		echo "ERROR".mysqli_error($con);
	}

//$filename = fopen('sampleData.json', 'w');
//$post = fwrite($filename, $json_array);
//
//$string = file_get_contents("sampleData.json");
//echo $string;

	
?>