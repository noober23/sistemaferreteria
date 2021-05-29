//constantes
var READY_STATE_COMPLETE = 4;
//variables
var ajax = null;
var lista = document.querySelector("#listaCategoria");
var respuesta = document.querySelector("#respuesta");
var mensaje = document.querySelector("#mensaje");
var insertar = document.querySelector("#insertarCategoria");

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
				document.querySelector("#alta-categoria").addEventListener("submit",insertarCategoria);
			}
			if (ajax.responseText.indexOf("data-editar")>-1)
			{
				document.querySelector("#editar-categoria").addEventListener("submit",modificarCategoria);
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
	ajax.open("POST","controladorCategoria.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
//funcion ingresarUnidad
function ingresarCategoria(evento)
{
	var datos = "Transaccion=alta";
	evento.preventDefault();
	ejecutarAJAX(datos);
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
function listarCategoria(evento)
{
	var datos = "Transaccion=listar";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function eliminarCategoria(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar la categoria? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminar";
		ejecutarAJAX(datos);
	}
}
function editarCategoria(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatos";
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
function cargar()
{
	lista.addEventListener("click",listarCategoria);
	insertar.addEventListener("click",ingresarCategoria);

}
window.addEventListener("load",cargar);