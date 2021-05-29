<?php 
require "\Administrador\clientesVista.php";
require "modeloCliente.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaCliente();
	}elseif ($transaccion == "insertar") {
		insertarCliente($_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"]);
		mostrarCliente();
	}elseif ($transaccion == "cargarDatos") {
		cargarDatosCliente($_POST["id"]);
		mostrarCliente();
	}elseif ($transaccion == "editar") {
		editarCliente($_POST["cod"],$_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"]);
	mostrarCliente();
	}elseif ($transaccion == "listar") {
		mostrarCliente();
	}elseif ($transaccion == "eliminar") {
		eliminarCliente($_POST["id"]);
		mostrarCliente();
	}

}
	ejecutarTransaccion($transaccion);
 ?>