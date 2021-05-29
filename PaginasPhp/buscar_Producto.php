<?php
require_once "..\app\coneccion.php";
$id = $_POST["id"];

//OBTENEMOS LOS VALORES DEL PRODUCTO

 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql = "SELECT * FROM producto  where idCategoria='$id' and estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
		$resultado=$con->query($sql);
		$lista="<select id='categoria' class='form-control' name='categoria_cbo' required>";
$datos = array();
$i=0;
			while($fila = $resultado->fetch_assoc()){
      $datos[$i] = array();
      $datos[$i]['idProducto'] = $fila['idProducto'];
      $datos[$i]['idCategoria'] = $fila['idCategoria'];
      $datos[$i]['idUnidad'] = $fila['idUnidad'];
      $datos[$i]['nombre'] = $fila['nombre'];
      $datos[$i]['descripcion'] = $fila['descripcion'];
      $datos[$i]['precio_compra'] = $fila['precio_compra'];     
      $datos[$i]['precio_venta'] = $fila['precio_venta'];
      $datos[$i]['stock'] = $fila['stock'];
 
      $i++ ;
}


echo json_encode($datos);
?>