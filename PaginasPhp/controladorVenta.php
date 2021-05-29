<?php 
require "/Administrador/wentasVista.php";
require "modeloVenta.php";
$transaccion = $_POST["Transaccion"];
function ejecutarTransaccion($transaccion)
{
	if($transaccion =="alta"){
		altaVentaDetalle();
	}elseif ($transaccion == "insertar") {
		insertarVentaDetalle($_POST["documentoIdentidad_txt"],$_POST["tipo_cbo"],$_POST["documento_txt"],$_POST["fecha_txt"],$_POST["total_txt"]);
		insertarDetalleVenta($_POST["documentoIdentidad_txt"],$_POST["tipo_cbo"],$_POST["documento_txt"],$_POST["fecha_txt"],$_POST["idProducto"],$_POST["cantidad"],$_POST["precio_venta"]);

	}elseif ($transaccion == "cargarDatos") {
		/*cargarDatosVenta($_POST["id"]);
		mostrarVenta();*/
	}elseif ($transaccion == "editar") {
		/*editarVenta($_POST["cod"],$_POST["direccion_txt"],$_POST["nombre_txt"],$_POST["apellidos_txt"],$_POST["documentoIdentidad_txt"],$_POST["telefono_txt"]);
	mostrarVenta();*/
	}elseif ($transaccion == "listar") {
		/*mostrarVenta();*/
	}elseif ($transaccion == "eliminar") {
		/*eliminarVenta($_POST["id"]);
		mostrarVenta();*/
	}elseif ($transaccion == "productos") {
		ya();
	}

}
	ejecutarTransaccion($transaccion);
 ?>