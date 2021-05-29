//constantes
var READY_STATE_COMPLETE = 4;
//variables
var ajax = null;
var lista = document.querySelector("#listaProducto");
var respuesta = document.querySelector("#respuesta");
var mensaje = document.querySelector("#mensaje");
var insertar = document.querySelector("#insertarProducto");


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
			if (ajax.responseText.indexOf("data-insertar")>-1)
			{
				document.querySelector("#alta-producto").addEventListener("submit",insertarProducto);
				ver();
			}
			if (ajax.responseText.indexOf("data-editar")>-1)
			{
				document.querySelector("#editar-producto").addEventListener("submit",modificarProducto);
				ver();
			}

		}else
		{
			console.log(ajax);
			alert("noo");
		}
	}
}
//funcion ejecutarAJAX para enviar al controlador
function ejecutarAJAX(datos){
	ajax=objetoAJAX();
	ajax.onreadystatechange=enviarDatos;
	ajax.open("POST","controladorProducto.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
//funcion ingresar
function ingresarProducto(evento)
{
	var datos = "Transaccion=alta";
	evento.preventDefault();
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
function listarProducto(evento)
{
	var datos = "Transaccion=listar";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function eliminarProducto(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el producto? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminar";
		ejecutarAJAX(datos);
	}
}
function editarProducto(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatos";
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
function cargar()
{
	lista.addEventListener("click",listarProducto);
	insertar.addEventListener("click",ingresarProducto);
}
function ver()
{
	$('#fecha').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
}

window.addEventListener("load",cargar);