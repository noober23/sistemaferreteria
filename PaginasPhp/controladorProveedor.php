<?php 
require "\Administrador\proveedoresVista.php";
require "modeloProveedor.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaProveedor();
	}elseif ($transaccion == "insertar") {
		insertarProveedor($_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"],$_POST["celular_txt"]);
		mostrarProveedor();
	}elseif ($transaccion == "cargarDatos") {
		cargarDatosProveedor($_POST["id"]);
		mostrarProveedor();
	}elseif ($transaccion == "editar") {
		editarProveedor($_POST["cod"],$_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"],$_POST["celular_txt"]);
		mostrarProveedor();
	}elseif ($transaccion == "listar") {
		mostrarProveedor();
	}elseif ($transaccion == "eliminar") {
		eliminarProveedor($_POST["id"]);
		mostrarProveedor();
	}

}
	ejecutarTransaccion($transaccion);
 ?>