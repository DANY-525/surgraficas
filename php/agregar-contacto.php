<?php
//Asigno a variables de php los valores que vienen del formulario
$email = $_POST["email_txt"];
$descripcion = $_POST["descripcion_txa"];
$producto = $_POST["producto_rdo"];


foreach($_FILES["archivo_fls"] as $clave => $valor){
    /*echo "Propiedad: $clave --- valor: $valor<br/>";*/
  }

$archivo = $_FILES["archivo_fls"]["tmp_name"];
  $destino = "img/".$_FILES["archivo_fls"]["name"];
   move_uploaded_file($archivo,$destino);
/*echo "Archivo subido :)";*/





foreach($_FILES["archivo2_fls"] as $clave => $valor){
    /*echo "Propiedad: $clave --- valor: $valor<br/>";*/
  }

$archivo2 = $_FILES["archivo2_fls"]["tmp_name"];
$destino2 = "img/".$_FILES["archivo2_fls"]["name"];
move_uploaded_file($archivo2,$destino2);
/*echo "Archivo subido :)";*/



foreach($_FILES["archivo3_fls"] as $clave => $valor){
    /*echo "Propiedad: $clave --- valor: $valor<br/>";*/
  }

$archivo3 = $_FILES["archivo3_fls"]["tmp_name"];
$destino3 = "img/".$_FILES["archivo3_fls"]["name"];
move_uploaded_file($archivo3,$destino3);
/*echo "Archivo subido :)";*/





include("conexion2.php");
$consulta = "SELECT * FROM productos WHERE nombre='$email'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

//Si $num_regs es igual a 0, insertamoslos datos en la tabla, sino mandamos un mensaje que diga que el usuario existe
if($num_regs == 0)
{
  

  $consulta = "INSERT INTO productos (idpro,nombre,descripcion,tipoproductos,imagen,imagen2,imagen3) VALUES (0,'$email','$descripcion','$producto','$destino','$destino2','$destino3')";
  $ejecutar_consulta = $conexion->query(utf8_encode($consulta));

  if($ejecutar_consulta)
    $mensaje = "Se ha dado de alta al contacto con el email <b>$email</b> :)";
  else
    $mensaje = "No se pudo dar de alta al producto con el nombre <b>$email</b> :(";
}
else
{
  $mensaje = "No se pudo dar  de alta al contacto con el email <b>$email</b> por que ya existe :/";
}

$conexion->close();
header("Location: ../aplicacion.php?=api&mensaje=$mensaje");
?>