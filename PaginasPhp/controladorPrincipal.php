<?php 
require "Administrador\clientesVista.php";
require "Administrador\categoriasVista.php";
require "Administrador\unidadesVista.php";
require "Administrador\usuariosVista.php";
require "Administrador\proveedoresVista.php";
require "Administrador\productosVista.php";
require "Administrador\busquedaProductos.php";
require "Administrador\wentasVista.php";
require "modeloPrincipal.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="altaClientes"){
		altaCliente();
	}elseif ($transaccion == "insertarCliente") {
		insertarCliente($_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"]);
		mostrarCliente();
	}elseif ($transaccion == "cargarDatosCliente") {
		cargarDatosCliente($_POST["id"]);
		mostrarCliente();
	}elseif ($transaccion == "editarCliente") {
		editarCliente($_POST["cod"],$_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"]);
	mostrarCliente();
	}elseif ($transaccion == "listarClientes") {
		mostrarCliente();
	}elseif ($transaccion == "eliminarCliente") {
		eliminarCliente($_POST["id"]);
		mostrarCliente();
	}else if ($transaccion =="altaCategorias") {
		altaCategoria();
	}elseif ($transaccion == "insertarCategoria") {
		insertarCategoria($_POST["descripcion_txt"]);
		mostrarCategoria();
	}elseif ($transaccion == "cargarDatosCategoria") {
		cargarDatosCategoria($_POST["id"]);
		mostrarCategoria();
	}elseif ($transaccion == "editarCategoria") {
		editarCategoria($_POST["cod"],$_POST["descripcion_txt"]);
		mostrarCategoria();
	}elseif ($transaccion == "listarCategorias") {
		mostrarCategoria();
	}elseif ($transaccion == "eliminarCategoria") {
		eliminarCategoria($_POST["id"]);
		mostrarCategoria();
	}else if ($transaccion == "altaUnidad") {
		altaUnidad();
	}elseif ($transaccion == "insertarUnidad") {
		insertarUnidad($_POST["descripcion_txt"]);
		mostrarUnidad();
	}elseif ($transaccion == "cargarDatosUnidad") {
		cargarDatosUnidad($_POST["id"]);
		mostrarUnidad();
	}elseif ($transaccion == "editarUnidad") {
		editarUnidad($_POST["cod"],$_POST["descripcion_txt"]);
		mostrarUnidad();
	}elseif ($transaccion == "listarUnidad") {
		mostrarUnidad();
	}elseif ($transaccion == "eliminarUnidad") {
		eliminarUnidad($_POST["id"]);
		mostrarUnidad();
	}elseif($transaccion =="altaUsuarios"){
		altaUsuario();
	}elseif ($transaccion == "insertarUsuario") {
		insertarUsuario($_POST["email_txt"],$_POST["password_txt"],$_POST["tipo_cbo"]);
		mostrar();
	}elseif ($transaccion == "cargarDatosUsuario") {
		cargarDatos($_POST["id"]);
		mostrar();
	}elseif ($transaccion == "editarUsuario") {
		editarUsuario($_POST["cod"],$_POST["email_txt"],$_POST["password_txt"],$_POST["tipo_cbo"]);
		mostrar();
	}elseif ($transaccion == "listarUsuarios") {
		mostrar();
	}elseif ($transaccion == "eliminarUsuario") {
		eliminarUsuario($_POST["id"]);
		mostrar();
	}elseif($transaccion =="altaProveedores"){
		altaProveedor();
	}elseif ($transaccion == "insertarProveedor") {
		insertarProveedor($_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"],$_POST["celular_txt"]);
		mostrarProveedor();
	}elseif ($transaccion == "cargarDatosProveedor") {
		cargarDatosProveedor($_POST["id"]);
		mostrarProveedor();
	}elseif ($transaccion == "editarProveedor") {
		editarProveedor($_POST["cod"],$_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"],$_POST["celular_txt"]);
		mostrarProveedor();
	}elseif ($transaccion == "listarProveedores") {
		mostrarProveedor();
	}elseif ($transaccion == "eliminarProveedor") {
		eliminarProveedor($_POST["id"]);
		mostrarProveedor();
	}elseif($transaccion =="altaProductos"){
		altaProducto();
	}elseif ($transaccion == "insertarProducto") {
		insertarProducto($_POST["categoria_cbo"],$_POST["unidad_cbo"],$_POST["nombre_txt"],$_POST["descripcion_txt"],$_POST["preciocompra_txt"],$_POST["precioventa_txt"],$_POST["fecha_txt"],$_POST["stock_txt"]);
		mostrarProducto();
	}elseif ($transaccion == "cargarDatosProducto") {
		cargarDatosProducto($_POST["id"]);
		mostrarProducto();
	}elseif ($transaccion == "editarProducto") {
		editarProducto($_POST["cod"],$_POST["categoria_cbo"],$_POST["unidad_cbo"],$_POST["nombre_txt"],$_POST["descripcion_txt"],$_POST["preciocompra_txt"],$_POST["precioventa_txt"],$_POST["fecha_txt"],$_POST["stock_txt"]);
		mostrarProducto();
	}elseif ($transaccion == "listarProductos") {
		mostrarProducto();
	}elseif ($transaccion == "eliminarProducto") {
		eliminarProducto($_POST["id"]);
		mostrarProducto();
	}elseif ($transaccion == "buscarProductoNombre") {
		buscarProductoNombre();
	}elseif ($transaccion == "busquedaVentasFecha") {
		buscarFechas();
		//fechas($_POST["fechaInicial"],$_POST["fechaFinal"]);
	}elseif ($transaccion == "buscarVentasFechas") {
		
		fechas($_POST["fechaInicial"],$_POST["fechaFinal"]);
	}elseif($transaccion =="altaVentas"){
		altaVentaDetalle();
	}elseif ($transaccion == "insertarVentaDetalle") {
		insertarVentaDetalle($_POST["documentoIdentidad_txt"],$_POST["tipo_cbo"],$_POST["documento_txt"],$_POST["fecha_txt"],$_POST["total_txt"]);
		insertarDetalleVenta($_POST["documentoIdentidad_txt"],$_POST["tipo_cbo"],$_POST["documento_txt"],$_POST["fecha_txt"],$_POST["idProducto"],$_POST["cantidad"],$_POST["precio_venta"]);
	}elseif ($transaccion == "listarProductosVendedor") {
		mostrarProductoVendedor();
	}elseif ($transaccion == "listarClientesVendedor") {
		mostrarClienteVendedor();
	}

}
	ejecutarTransaccion($transaccion);
 ?>