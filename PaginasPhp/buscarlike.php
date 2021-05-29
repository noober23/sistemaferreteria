<?php 
require_once "..\app\coneccion.php";
$nombre=$_POST["nombre"];
	$cnn = new Conexion();
	$con = $cnn->conexionMysql();
	$estado="Activo";
	$sql="SELECT * FROM producto where nombre LIKE '%$nombre%' OR descripcion LIKE '%$nombre%' ORDER BY nombre ASC";
	mysqli_select_db($con,"sistemaferreteria");
	$table="";
	$contador=1;
					$table="<table class='table table-striped table-condensed table-hover'>";
        	  $table.="<thead>";
        	  $table.="<tr>";
              $table.="<th width='150'>Nombre</th>";
              $table.="<th width='150'>Descripcion</th>";
              $table.="<th width='100'>Precio Compra</th>";
              $table.="<th width='100'>Precio Venta</th>";
              $table.="<th width='100'>fecha</th>";
              $table.="<th width='100'>Stock</th>";
              $table.="</tr>";  
              $table.="</thead>"; 
               $table.="<tbody>";
	if($resultado = $con->query($sql)) {

               while($fila = $resultado->fetch_assoc())
               {
                $table.="<tr>";
               	$table.="<td>".$fila["nombre"]."</td>";
               	$table.="<td>".$fila["descripcion"]."</td>";
               	$table.="<td>".$fila["precio_compra"]."</td>";
               	$table.="<td>".$fila["precio_venta"]."</td>";
               	$table.="<td>".$fila["fecha"]."</td>";
               	$table.="<td>".$fila["stock"]."</td>";
                $table.="</tr>"; 
               }
               $resultado->free();
               $respuesta=$table;
	}
		return printf($respuesta);

 ?>