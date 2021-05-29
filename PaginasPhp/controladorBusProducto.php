<?php 
require "\Administrador\busquedaProductos.php";
require "modeloProducto.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		//altaProducto();
	}elseif ($transaccion == "buscarProductoNombre") {
		buscarProductoNombre();
	}elseif ($transaccion == "busquedaVentasFecha") {
		buscarFechas();
		//fechas($_POST["fechaInicial"],$_POST["fechaFinal"]);
	}elseif ($transaccion == "buscarVentasFechas") {
		
		fechas($_POST["fechaInicial"],$_POST["fechaFinal"]);
	}

}
	ejecutarTransaccion($transaccion);
 ?>