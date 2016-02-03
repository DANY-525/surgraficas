<?php
session_start();

if(!$_SESSION["autentificado"]){
	header("location: salir.php");

}

?>