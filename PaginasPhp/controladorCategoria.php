<?php 
require "\Administrador\categoriasVista.php";
require "modeloCategoria.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaCategoria();
	}elseif ($transaccion == "insertar") {
		insertarCategoria($_POST["descripcion_txt"]);
		mostrarCategoria();
	}elseif ($transaccion == "cargarDatos") {
		cargarDatosCategoria($_POST["id"]);
		mostrarCategoria();
	}elseif ($transaccion == "editar") {
		editarCategoria($_POST["cod"],$_POST["descripcion_txt"]);
		mostrarCategoria();
	}elseif ($transaccion == "listar") {
		mostrarCategoria();
	}elseif ($transaccion == "eliminar") {
		eliminarCategoria($_POST["id"]);
		mostrarCategoria();
	}

}
	ejecutarTransaccion($transaccion);
 ?>