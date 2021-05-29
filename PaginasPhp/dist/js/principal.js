var READY_STATE_COMPLETE = 4;
//variables
var ajax = null;
var contador = 1;
var arreglo = Array();
var listaClientes = document.querySelector("#listaCliente");
var insertarClientes = document.querySelector("#insertarCliente");
var listaCategorias = document.querySelector("#listaCategoria");
var insertarCategorias = document.querySelector("#insertarCategoria");
var insertarUnidades = document.querySelector("#insertarUnidad");
var listaUnidades = document.querySelector("#listaUnidad");
var listaUsuarios = document.querySelector("#listaUsuario");
var insertarUsuarios = document.querySelector("#insertarUsuario");
var listaProveedores = document.querySelector("#listaProveedor");
var insertarProveedores = document.querySelector("#insertarProveedor");
var listaProductos = document.querySelector("#listaProducto");
var insertarProductos = document.querySelector("#insertarProducto");
var insertarProductos = document.querySelector("#insertarProducto");
var buscarProductos = document.querySelector("#buscarProducto");
var buscarVentasAdministrador = document.querySelector("#buscarVentaFechasAdministrador");
var insertarVentasAdministrador = document.querySelector("#insertarVentaAdministrador");
var respuesta = document.querySelector("#respuesta");
var mensaje = document.querySelector("#mensaje");

function cargar()
{
	listaClientes.addEventListener("click",listarCliente);
	insertarClientes.addEventListener("click",ingresarCliente);
	listaCategorias.addEventListener("click",listarCategoria);
	insertarCategorias.addEventListener("click",ingresarCategoria);
	listaUnidades.addEventListener("click",listarUnidad);
	insertarUnidades.addEventListener("click",ingresarUnidad);
	listaUsuarios.addEventListener("click",listarUsuarios);
	insertarUsuarios.addEventListener("click",ingresarUsuarios);
	listaProveedores.addEventListener("click",listarProveedor);
	insertarProveedores.addEventListener("click",ingresarProveedor);
	listaProductos.addEventListener("click",listarProducto);
	insertarProductos.addEventListener("click",ingresarProducto);
	buscarProductos.addEventListener("click",buscarProducto);
	buscarVentasAdministrador.addEventListener("click",buscarVentasFecha);
	insertarVentasAdministrador.addEventListener("click",ingresarVenta);
	///////////////////
}
/////////   AJAX

function ejecutarAJAX(datos){
	ajax=objetoAJAX();
	ajax.onreadystatechange=enviarDatos;
	ajax.open("POST","controladorCliente.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
function enviarDatos(){
	if(ajax.readyState == READY_STATE_COMPLETE)
	{
		if(ajax.status == 200){
			respuesta.innerHTML = ajax.responseText;
			if (ajax.responseText.indexOf("data-insertarClientes")>-1)
			{
				document.querySelector("#alta-cliente").addEventListener("submit",insertarCliente);
			}
			if (ajax.responseText.indexOf("data-editarClientes")>-1)
			{
				document.querySelector("#editar-cliente").addEventListener("submit",modificarCliente);
			}
			if (ajax.responseText.indexOf("data-insertarCategoria")>-1)
			{
				document.querySelector("#alta-categoria").addEventListener("submit",insertarCategoria);
			}
			if (ajax.responseText.indexOf("data-editarCategoria")>-1)
			{
				document.querySelector("#editar-categoria").addEventListener("submit",modificarCategoria);
			}			
			if (ajax.responseText.indexOf("data-insertarUnidad")>-1)
			{
				document.querySelector("#alta-unidad").addEventListener("submit",insertarUnidad);
			}
			if (ajax.responseText.indexOf("data-editarUnidad")>-1)
			{
				document.querySelector("#editar-unidad").addEventListener("submit",modificarUnidad);
			}
			if (ajax.responseText.indexOf("data-insertarUsuario")>-1)
			{
				document.querySelector("#alta-usuarios").addEventListener("submit",insertarUsuario);
			}
			if (ajax.responseText.indexOf("data-editarUsuario")>-1)
			{
				document.querySelector("#editar-usuarios").addEventListener("submit",modificarUsuario);
			}
			if (ajax.responseText.indexOf("data-insertarProveedor")>-1)
			{
				document.querySelector("#alta-proveedor").addEventListener("submit",insertarProveedor);
			}
			if (ajax.responseText.indexOf("data-editarProveedor")>-1)
			{
				document.querySelector("#editar-proveedor").addEventListener("submit",modificarProveedor);
			}
			if (ajax.responseText.indexOf("data-insertarProducto")>-1)
			{
				document.querySelector("#alta-producto").addEventListener("submit",insertarProducto);
				fechas();
			}
			if (ajax.responseText.indexOf("data-editarProducto")>-1)
			{
				document.querySelector("#editar-producto").addEventListener("submit",modificarProducto);
				fechas();
			}
			if (ajax.responseText.indexOf("data-busquedaProducto")>-1)
			{
				document.querySelector("#alta-busquedaProducto").addEventListener("submit",buscarProducto);
				document.querySelector("#nombre").addEventListener("keyup",buscarProductoNombreLike);
			}
			if (ajax.responseText.indexOf("data-busquedaVentaFechas")>-1)
			{
				document.querySelector("#editar-busquedaVentaFechas").addEventListener("submit",reporteVentasFechas);
				fechas();
			}
			if (ajax.responseText.indexOf("data-insertarVentaDetalles")>-1)
			{
				document.querySelector("#alta-VentaDetalle").addEventListener("submit",insertarVentaDetalle);
				document.querySelector("#insertar-producto").addEventListener("click",cargarDetalleProducto);
				document.querySelector("#categoria").addEventListener("click",buscarProductoSelector);
				document.querySelector("#listaPro").addEventListener("click",buscarStockProducto);
				document.querySelector("#alta-VentaDetalle").addEventListener("reset",sumarProducto);
				document.querySelector("#documentoIdentidad").addEventListener("dblclick",buscarCliente);
				fechas();
			}			
			
		}else
		{
			console.log(ajax);
			alert("noo");
		}
	}
}
function ejecutarAJAX(datos){
	ajax=objetoAJAX();
	ajax.onreadystatechange=enviarDatos;
	ajax.open("POST","controladorPrincipal.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
function objetoAJAX(){
	if (window.XMLHttpRequest) 
	{
		return new XMLHttpRequest();
	}else if(window.ActiveXObject) 
		{
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
}
function fechas()
{
	$('#fecha').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
	$('#fechaInicial').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
	$('#fechaFinal').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
}
/////         CLIENTES
function listarCliente(evento)
{
	var datos = "Transaccion=listarClientes";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ingresarCliente(evento)
{
	var datos = "Transaccion=altaClientes";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function insertarCliente(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function editarCliente(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatosCliente";
	ejecutarAJAX(datos);
}
function modificarCliente(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function eliminarCliente(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el cliente? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminarCliente";
		ejecutarAJAX(datos);
	}
}
function buscarCliente()
{
	var url = '../PaginasPhp/buscar_Cliente.php';
	var id=$('#documentoIdentidad').val();
	$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				var mensaje = datos.join("")
				if(mensaje.length>0)
				{
					$('#nombre').val(datos[0]);
					$('#apellidos').val(datos[1]);
					$('#direccion').val(datos[2]);
					$('#telefono').val(datos[3]);
					$('#documentoIdentidad').attr('disabled','disabled');
					
				}else{
					alert("No existe el cliente con el numero de carnet ingresado");
				}
				
			return false;
		}
	});
	return false;
}
///   	CATEGORIA
function listarCategoria(evento)
{
	var datos = "Transaccion=listarCategorias";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ingresarCategoria(evento)
{
	var datos = "Transaccion=altaCategorias";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function eliminarCategoria(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar la categoria? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminarCategoria";
		ejecutarAJAX(datos);
	}
}
function insertarCategoria(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
		console.log(nombre[i]+"="+valor[i]+"&");
	}
	ejecutarAJAX(datos);
}
function editarCategoria(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatosCategoria";
	ejecutarAJAX(datos);
}
function modificarCategoria(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
/////////  UNIDADES
function listarUnidad(evento)
{
	var datos = "Transaccion=listarUnidad";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ingresarUnidad(evento)
{
	var datos = "Transaccion=altaUnidad";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function editarUnidad(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatosUnidad";
	ejecutarAJAX(datos);
}
function insertarUnidad(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
		console.log(nombre[i]+"="+valor[i]+"&");
	}
	ejecutarAJAX(datos);
}
function modificarUnidad(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function eliminarUnidad(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar la unidad? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminarUnidad";
		ejecutarAJAX(datos);
	}
}
/////////  USUARIOS
function listarUsuarios(evento)
{
	var datos = "Transaccion=listarUsuarios";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ingresarUsuarios(evento)
{
	var datos = "Transaccion=altaUsuarios";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function editarUsuario(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatosUsuario";
	ejecutarAJAX(datos);
}
function insertarUsuario(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function modificarUsuario(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function eliminarUsuario(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el usuario con el id :? "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminarUsuario";
		ejecutarAJAX(datos);
	}
}
///// PROVEEDORES
function listarProveedor(evento)
{
	var datos = "Transaccion=listarProveedores";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ingresarProveedor(evento)
{
	var datos = "Transaccion=altaProveedores";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function editarProveedor(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatosProveedor";
	ejecutarAJAX(datos);
}
function insertarProveedor(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function modificarProveedor(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function eliminarProveedor(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el proveedor? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminarProveedor";
		ejecutarAJAX(datos);
	}
}
/////////    PRODUCTO
function listarProducto(evento)
{
	var datos = "Transaccion=listarProductos";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ingresarProducto(evento)
{
	var datos = "Transaccion=altaProductos";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function editarProducto(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatosProducto";
	ejecutarAJAX(datos);
}
function insertarProducto(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function modificarProducto(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
	}
	ejecutarAJAX(datos);
}
function eliminarProducto(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el producto? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminarProducto";
		ejecutarAJAX(datos);
	}
}
function buscarProducto(evento)
{
	var datos = "Transaccion=buscarProductoNombre";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function buscarVentasFecha(evento)
{
	var datos = "Transaccion=busquedaVentasFecha";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function buscarProductoNombreLike()
{
	var datos =$("#nombre").val();
	var url = '../PaginasPhp/buscarlike.php';
	$('#tablas').empty();
	$.ajax({
		type:'POST',
		url:url,
		data:'nombre='+datos,
		success: function(valores){
			console.log(valores);
			$('#tablas').html(valores);
		return false;
		}
	});
	return false;
}
function sumarProducto(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	var suma=0;
	var total=0;
	var precio=0;
	var cantidad=0;
	var banderaprecio=0;
	var banderacantidad =0;
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
			if(hijosForm[i].name=="precio_venta[]"){
				precio=hijosForm[i].value;
				banderaprecio=1;
			}
				if(hijosForm[i].name=="cantidad[]"){
				cantidad=hijosForm[i].value;
				banderacantidad=1;
			}
			if ((banderacantidad==1)&&(banderaprecio==1)) {
				total = parseFloat(precio)*parseFloat(cantidad);
				banderaprecio=0;
				banderacantidad=0;
				suma=parseFloat(suma)+parseFloat(total);
			}
				suma = redondear2decimales(suma);

		$("#total").val(suma);
	}
}
function redondear2decimales(numero)
{
var original=parseFloat(numero);
var result=Math.round(original*100)/100 ;
return result;
}
function buscarStockProducto()
{
		for(var i in arreglo)
		{
			if ($("#listaPro").val()==arreglo[i].nombre) {
      			$("#precio_venta").val(arreglo[i].precio_venta);
      			$("#stock").val(arreglo[i].stock);
			}
      }
}
function buscarProductoSelector()
{
	var url = '../PaginasPhp/buscar_Producto.php';
	var id=$('#categoria').val();
	$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
		var jsonObj = JSON.parse( valores);
		$("#listaPro").empty();
		arreglo=jsonObj;
		for(var i in jsonObj){
           $("#listaPro").append('<option value="'+jsonObj[i].nombre+'">'+jsonObj[i].nombre+'</option>');
           $("#precio_venta").val("");
           $("#stock").val("");
           $('#precio_venta').attr('disabled','disabled');
		   $('#stock').attr('disabled','disabled');
        }
			return false;
		}
	});
	return false;
}
////////////////////// VENTAS
function reporteVentasFechas(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
		console.log(datos);
	}
	ejecutarAJAX(datos);
}
function ingresarVenta(evento)
{
	var datos = "Transaccion=altaVentas";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function cargarDetalleProducto(evento)
{
	evento.preventDefault();
	if($("#nombre").val()==""){
		alert("Los campos del cliente estan vacios verifique que exista el cliente");
	}else
	{
		if(parseInt($("#cantidad").val())<parseInt($("#stock").val()))
		{
			for(var i in arreglo)
			{
				if($("#listaPro").val()==arreglo[i].nombre)
				{
					var fila='<tr>'+
				'<td>'+contador+'</td>'+
				'<td><input type="text" value='+arreglo[i].idCategoria+' class="form-control" name="categoria[]"></td>'+
				'<td><input type="text" value='+arreglo[i].descripcion+' class="form-control" name="descripcion[]"></td>'+
				'<td><input type="text" value='+arreglo[i].precio_venta+' class="form-control" name="precio_venta[]"></td>'+
				'<td><input type="text" value='+$("#cantidad").val()+' class="form-control" name="cantidad[]"></td>'+
				'<td><input  value="quitar" class="btn btn-danger" onclick="borrar(this)"/></td>'+
				'<td><input type="hidden" value='+arreglo[i].idProducto+' class="form-control" name="idProducto[]"></td></tr>';
					contador=contador+1;
				}
			}
			$('#tablas').append(fila);
		}
		else
		{
			alert("La cantidad no puede superar el stock del producto");
		}
	}

}
function insertarVentaDetalle(evento)
{
	evento.preventDefault();
	var nombre = new Array();
	var valor = new Array();
	var hijosForm = evento.target;
	var datos = "";
	for(var i=1; i<hijosForm.length;i++)
	{
		nombre[i] = hijosForm[i].name;
		valor[i] = hijosForm[i].value;
		datos+=nombre[i]+"="+valor[i]+"&";
		console.log(nombre[i]+"="+valor[i]+"&");
	}
	ejecutarAJAX(datos);
}

window.addEventListener("load",cargar);