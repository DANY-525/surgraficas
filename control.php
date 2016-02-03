<?php include("conexion2.php");?>
<?php
$user= $_POST["usuario_txt"];
$contraseña= $_POST["password_txt"];

 $mysql = conexionMySQL();
    $sql = "SELECT * FROM usuario WHERE nombre='".$user."' AND identificacion='".$contraseña."' ";
    if($resultado = $mysql->query($sql))
    	 while($fila = $resultado->fetch_assoc())
    {
      
      $usuario=$fila['nombre'];
      $clave=$fila['identificacion'];
    }
if($user == $usuario && $contraseña== $clave){
//iniciar secion
	session_start();

	//Declaro mis variables de sesión
	$_SESSION["autentificado"] = true;
	$_SESSION["usuario"] = $_POST["usuario_txt"];
	header("location: aplicacion.php");
}else{
	header("location: login.php?error=si");
}
?>