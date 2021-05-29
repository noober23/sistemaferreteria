<?php 
session_start();
if(isset($_SESSION["usuario"]) && isset($_SESSION["password"])){
       echo "hola bienvenido<br>".$_SESSION["usuario"]. " ". $_SESSION["password"];
      	session_destroy();
     // http_redirect("php/indexAfiliados.php");
       //header("Location:../index.php");
}else{
    echo "no estas registrado";
    echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
}
 ?>
