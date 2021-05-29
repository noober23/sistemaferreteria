$(document).ready(ini);

function ini(){
	$("#login").click(Ingreso);
	}
function Ingreso()
{
	var url ='../PaginasPhp/validacionLogin.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
	success: function(registro){
		alert(registro);
		if(registro=="ADMINISTRADOR")
		{
				location.href="/PaginasPhp/indexAdministrador.php";
		}else{
			if(registro=="VENDEDOR")
				{
				location.href="/PaginasPhp/indexVendedor.php";
				}
				else
				{
					$('#resultado').html(registro);
				}
			}
			return false;
		}
	});
	return false;
}