//constantes
var READY_STATE_COMPLETE = 4;
//variables
var ajax = null;
var listaBusquedaProducto = document.querySelector("#listaBusProducto");
var listaBusquedaFechas = document.querySelector("#busquedaVenta");
var respuesta = document.querySelector("#respuesta");
var mensaje = document.querySelector("#mensaje");


//funcion objeto AJAX
function objetoAJAX(){
	if (window.XMLHttpRequest) 
	{
		return new XMLHttpRequest();
	}else if(window.ActiveXObject) 
		{
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
}
//funcion para enviar los datos de insertar y modificar
function enviarDatos(){
	if(ajax.readyState == READY_STATE_COMPLETE)
	{
		if(ajax.status == 200){
			respuesta.innerHTML = ajax.responseText;

			if (ajax.responseText.indexOf("data-busquedaProducto")>-1)
			{
				document.querySelector("#alta-busquedaProducto").addEventListener("submit",buscarProducto);
				document.querySelector("#nombre").addEventListener("keyup",buscarProductoNombreLike);
			}
			if (ajax.responseText.indexOf("data-busquedaVentaFechas")>-1)
			{
				document.querySelector("#editar-busquedaVentaFechas").addEventListener("submit",reporteVentasFechas);
				ver();
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
	ajax.open("POST","controladorBusProducto.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
function buscarProducto(evento)
{
	var datos = "Transaccion=buscarProductoNombre";
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
function buscarVentasFecha(evento)
{
	var datos = "Transaccion=busquedaVentasFecha";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function ver()
{
	$('#fechaInicial').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
	$('#fechaFinal').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
}

function cargarBusqueda()
{
	listaBusquedaProducto.addEventListener("click",buscarProducto);
	listaBusquedaFechas.addEventListener("click",buscarVentasFecha);
}

window.addEventListener("load",cargarBusqueda);