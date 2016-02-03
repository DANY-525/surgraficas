<?php 
$destino = "surgraficas@gmail.com";
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST ["telefono"];
$mensaje= $_POST ["mensaje"];
$contenido = "Nombre: " .$nombre. "\ncorreoM" . $correo . "\ntelefono:"." \nmensaje: " .$mensaje;

mail($destino,"contacto",$contenido);
header("location:index.php?op=contactanos?enviado")

?>