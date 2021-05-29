<?php 
require "\Administrador\unidadesVista.php";
require "modeloUnidad.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaUnidad();
	}elseif ($transaccion == "insertar") {
		insertarUnidad($_POST["descripcion_txt"]);
		mostrarUnidad();
	}elseif ($transaccion == "cargarDatos") {
		cargarDatosUnidad($_POST["id"]);
		mostrarUnidad();
	}elseif ($transaccion == "editar") {
		editarUnidad($_POST["cod"],$_POST["descripcion_txt"]);
		mostrarUnidad();
	}elseif ($transaccion == "listar") {
		mostrarUnidad();
	}elseif ($transaccion == "eliminar") {
		eliminarUnidad($_POST["id"]);
		mostrarUnidad();
	}

}
	ejecutarTransaccion($transaccion);
 ?>