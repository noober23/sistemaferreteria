<?php 
require "\Administrador\productosVista.php";
require "modeloProducto.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaProducto();
	}elseif ($transaccion == "insertar") {
		insertarProducto($_POST["categoria_cbo"],$_POST["unidad_cbo"],$_POST["nombre_txt"],$_POST["descripcion_txt"],$_POST["preciocompra_txt"],$_POST["precioventa_txt"],$_POST["fecha_txt"],$_POST["stock_txt"]);
		mostrarProducto();
	}elseif ($transaccion == "cargarDatos") {
		cargarDatosProducto($_POST["id"]);
		mostrarProducto();
	}elseif ($transaccion == "editar") {
		editarProducto($_POST["cod"],$_POST["categoria_cbo"],$_POST["unidad_cbo"],$_POST["nombre_txt"],$_POST["descripcion_txt"],$_POST["preciocompra_txt"],$_POST["precioventa_txt"],$_POST["fecha_txt"],$_POST["stock_txt"]);
		mostrarProducto();
	}elseif ($transaccion == "listar") {
		mostrarProducto();
	}elseif ($transaccion == "eliminar") {
		eliminarProducto($_POST["id"]);
		mostrarProducto();
	}

}
	ejecutarTransaccion($transaccion);
 ?>