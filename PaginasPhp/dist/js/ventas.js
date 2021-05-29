//constantes
var READY_STATE_COMPLETE = 4;
//variables
var ajax = null;
var arreglo = Array();
var lista = document.querySelector("#listaVenta");
var respuesta = document.querySelector("#respuesta");
var mensaje = document.querySelector("#mensaje");
var insertar = document.querySelector("#insertarVenta");
var camposproductos = document.querySelector("#producto-btn");
var contador = 1;

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
				document.querySelector("#alta-venta").addEventListener("submit",insertarVenta);
				document.querySelector("#insertar-producto").addEventListener("click",cargarProducto);
				document.querySelector("#categoria").addEventListener("click",buscarProducto);
				document.querySelector("#listaPro").addEventListener("click",buscarCantidad);
				document.querySelector("#alta-venta").addEventListener("reset",sumarProducto);
				document.querySelector("#documentoIdentidad").addEventListener("dblclick",buscarCliente);
				ver();
			}
			if (ajax.responseText.indexOf("data-editar")>-1)
			{
				document.querySelector("#editar-venta").addEventListener("submit",modificarVenta);
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
	ajax.open("POST","controladorVenta.php");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(datos);
}
//funcion ingresar
function ingresarVenta(evento)
{
	var datos = "Transaccion=alta";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function insertarVenta(evento)
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
		console.log(nombre[i]+"="+valor[i]+"&");
	}
	alert("llego2");
}
function listarVenta(evento)
{
	var datos = "Transaccion=listar";
	evento.preventDefault();
	ejecutarAJAX(datos);
}
function eliminarVenta(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar la venta ? con el id : "+id);
	if(eliminar){
		var datos = "id="+id+"&Transaccion=eliminar";
		ejecutarAJAX(datos);
	}
}
function editarVenta(id)
{
	var datos = "id="+id+"&Transaccion=cargarDatos";
	ejecutarAJAX(datos);
}
function modificarVenta(evento)
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
	lista.addEventListener("click",listarVenta);
	insertar.addEventListener("click",ingresarVenta);
}
function ver()
{
	$('#fecha').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
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
				console.log(nombre[i]+"="+valor[i]+"&");
				suma = redondear2decimales(suma);

		$("#total").val(suma);
	}
	console.log(hijosForm.length);
	console.log(hijosForm[16].name);
}
function redondear2decimales(numero)
{
var original=parseFloat(numero);
var result=Math.round(original*100)/100 ;
return result;
}
function cargarProducto(evento)
{
	evento.preventDefault();
	for(var i in arreglo){
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
function borrar(t)
{
		var eliminar = confirm("¿Esta seguro de eliminar este producto de la lista ?");
	if(eliminar){
		var td = t.parentNode;
        var tr = td.parentNode;
        var table = tr.parentNode;
        alert(t);
        console.log(t);
        table.removeChild(tr);
	}

}
function buscarCantidad()
{
		for(var i in arreglo){
			if ($("#listaPro").val()==arreglo[i].nombre) {
      			console.log(arreglo[i].precio_venta);
      			$("#precio_venta").val(arreglo[i].precio_venta);
      			$("#stock").val(arreglo[i].stock);
			}

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
					alert(mensaje.length);
				}
				
			return false;
		}
	});
	return false;
}
function buscarProducto()
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
            console.log(jsonObj[i]);
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
window.addEventListener("load",cargar);