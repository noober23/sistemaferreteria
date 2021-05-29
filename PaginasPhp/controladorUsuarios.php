<?php 
require "\Administrador\usuariosVista.php";
require "modeloUsuarios.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaUsuario();
	}elseif ($transaccion == "insertar") {
		insertarUsuario($_POST["email_txt"],$_POST["password_txt"],$_POST["tipo_cbo"]);
		mostrar();
	}elseif ($transaccion == "cargarDatos") {
		cargarDatos($_POST["id"]);
		mostrar();
	}elseif ($transaccion == "editar") {
		editarUsuario($_POST["cod"],$_POST["email_txt"],$_POST["password_txt"],$_POST["tipo_cbo"]);
		mostrar();
	}elseif ($transaccion == "listar") {
		mostrar();
	}elseif ($transaccion == "eliminar") {
		eliminarUsuario($_POST["id"]);
		mostrar();
	}

}
	ejecutarTransaccion($transaccion);
 ?>