<?php require "vistas.php"; ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$op = $_GET["op"];
switch ($op) {
	
    case 'Acerca':
	$contenido = "php/acerca_nosotros.php";
	$titulo = "Acerca De Nosotros";
    break;
    case 'avisos':
	$contenido = "php/avisos.php";
	$titulo = "Avisos";
	case 'contactanos':
	$contenido = "php/contactanos.php";
	$titulo = "Contactanos";
    break;
  
    

	default:
		$contenido = "php/home.php";
		$titulo = "Sur Graficas";
		break;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php printf($titulo); ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1,minumun scale=1">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header>

		<div class="contenedor"></div>

		<h1 class="icon-dog"><?php printf($titulo); ?></h1>
		<input type="checkbox" id="menu-bar">
		<label class="icon-menu" for="menu-bar"></label>
		<nav class="menu">
			<a href="aplicacion.php">Inicio</a>
			<a href="?op=Acerca">Subir Archivos</a>
			<a href="?op=productos">Eliminar Archivos</a>
			<a href="?op=servicios">Actualizar Datos</a>
			<a href="?op=contactanos">Volver a SUR GRAFICAS</a>
			

		</nav>
	</header>
	<main>
		
		<section id="Bienvenidos">
		<?php include($contenido); ?>
	</section>
	</main>
	<footer>
		<div class="contenedor">
			<p class="copy">Sur Graficas &copy; 2015</p>
			<div class="sociales">
				<a class="icon-facebook"href="#"></a>
				<a class="icon-twitter"href="#"></a>
				<a class="icon-instagram"href="#"></a>
				<a  class="icon-googleplus"href="#"></a>
				
			</div>
		</div>
	</footer>
</body>
</html>