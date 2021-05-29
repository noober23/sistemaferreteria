<?php
require_once "..\app\coneccion.php";
$id = $_POST["id"];

//OBTENEMOS LOS VALORES DEL PRODUCTO

 	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
      $sql="SELECT * FROM venta INNER JOIN detalle_venta where venta.idVenta=detalle_venta.idVenta and venta.idVenta='$id' and detalle_venta.estado='$estado'";
	mysqli_select_db($con,"sistemaferreteria");
	$resultado=$con->query($sql);
      $datos = array();
      $i=0;
      while($fila = $resultado->fetch_assoc()){
      $idProducto=$fila['idProducto'];
      $sql2 = "SELECT * FROM producto WHERE idProducto='$idProducto' and estado='$estado'";
      $resultado2 = $con->query($sql2); 
      $fila2 = $resultado2->fetch_assoc();
      $descripcion= $fila2["descripcion"];
      $idCategoria=$fila2['idCategoria'];
      $sql3 = "SELECT * FROM categoria WHERE idCategoria='$idCategoria' and estado='$estado'";
      $resultado3 = $con->query($sql3); 
      $fila3 = $resultado3->fetch_assoc();
      $categoria= $fila3["descripcion"];
      $datos[$i] = array();
      $datos[$i]['idDetalle_Venta'] = $fila['idDetalle_Venta'];
      $datos[$i]['idProducto'] = $fila['idProducto'];
      $datos[$i]['descripcion'] = $descripcion;
      $datos[$i]['idCategoria'] = $categoria;
      $datos[$i]['cantidad'] = $fila['cantidad'];
      $datos[$i]['precio_Unitario'] = $fila['precio_Unitario'];
      $datos[$i]['estado'] = $fila['estado'];
      $i++ ;
}


echo json_encode($datos);
?>