//constantes
var READY_STATE_COMPLETE = 4;
//variables
var ajax = null;
var lista = document.querySelector("#listaUsuario");
var respuesta = document.querySelector("#respuesta");
var mensaje = document.querySelector("#mensaje");
var insertar = document.querySelector("#insertarUsuario");

function objetoAJAX(){
	if (window.XMLHttpRequest) 
	{
		return new XMLHttpRequest();
	}else if(window.ActiveXObject) 
		{
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
}
function enviarDatos(){
	if(ajax.readyState == READY_STATE_COMPLETE)
	{
		if(ajax.status == 200){
			respuesta.innerHTML = ajax.responseText;
			if (ajax.responseText.indexOf("data-insertar")>-1)
			{
				document.querySelector("#alta-usuarios").addEventListener("submit",insertarUsuario);
			}
			if (ajax.responseText.indexOf("data-editar")>-1)
			{
				document.querySelector("#editar-usuarios").addEventListener("submit",modificarUsuario);
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
	ajax.open("POST","controladorUsuarios.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
function ingresarUsuarios(evento)
{
	var datos = "Transaccion=alta";
	evento.preventDefault();
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
function listarUsuarios(evento)
{
	var datos = "Transaccion=listar";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function eliminarUsuario(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el usuario con el id :? "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminar";
		ejecutarAJAX(datos);
	}
}
function editarUsuario(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatos";
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
function cargar()
{
	lista.addEventListener("click",listarUsuarios);
	insertar.addEventListener("click",ingresarUsuarios);

}
window.addEventListener("load",cargar);