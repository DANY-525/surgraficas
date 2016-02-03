<?php
require("connect_db.php");
$usarname=$_POST['mail'];
$pass=$_POST['pass'];

$sql2=mysql_query("SELECT * FROM login WHERE email='$usarname'");
if ($f2=mysql_fetch_array($sql2)) {
echo' <script>alert("BIENVENIDO ADMINISTRADOR")</script> ';

echo "<script>location.href='admin.php'</script>";

}


$sql=mysql_query("SELECT * FROM login WHERE email='$usarname'");
if ($f=mysql_fetch_array($sql)) {
	if ($pass==$f['password']) {
		header("location: index2.php");
		
	}else{
		echo '<script>alert("contraseña incorrecta")</script>';
		echo "<script>locarion.href='index.php'</script>";
}

}
?>