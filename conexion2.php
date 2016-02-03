<?php 

define("SERVER","localhost");
define("USER","root");
define("PASS","");
define("DB","surgraficas");

 
 function conexionMySQL()
 {
     //echo"HOLA, por favor no usen echo's para inprimer en pantalla";
 	$conexion = new mysqli(SERVER,USER,PASS,DB);
 	if($conexion->connect_error)
 	{
         $error = "<div class='error'>";
         $error .= "Error de Conexion N <b>".$conexion->connect_errno."</b> mensaje del
         error: <mark>".$conexion->connect_error."</mark>";
         $error .="</div";

         die($error);
 	}
 	else
 	{
         //$formato = "<div class='mensaje'>conexion exitosa: <b>".$conexion->host_info." </b> </div>";
          //echo $formato;
          //echo $formato;
 		//$formato = "<div class='mensaje'>conexion exitosa: <b>%s</b> </div>";
 		//printf($formato,$conexion->host_info);
 	}
 	//$conexion->query("SET CHARARCTER SET UTF8");
 	return $conexion;
 }
 //conexionMySQL();

 ?>