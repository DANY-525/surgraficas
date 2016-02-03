<?php
error_reporting(E_ALL ^ E_NOTICE);
$op = $_GET["op"];
switch ($op) {
	
    case 'Acerca':
	$contenido = "php/acerca_nosotros.php";
	$titulo = "Acerca De Nosotros";
    break;
 
	

	case 'contactanos':
	$contenido = "php/contactanos.php";
	$titulo = "Contactanos";
    break;
     case 'distribucion':
	$contenido = "php/distribucion_p.php";
	$titulo = "Volantes";
    break;
    case 'servicios':
	$contenido = "php/servicios.php";
	$titulo = "Servicios";
    break;

	   case 'productos':
	$contenido = "php/productos.php";
	$titulo = "Productos";
    break;
    case 'pendones':
	$contenido = "php/avisos5.php";
	$titulo = "avisoS";
	break;
    
   
    case 'digital':
	$contenido = "php/impresiondggf.php";
	$titulo = "impresion DGF";
    break;
    case 'digitalcolor':
	$contenido = "php/impresioncolor.php";
	$titulo = "Digital Color";
    break;
    case 'disenoweb':
	$contenido = "php/portafolio.php";
	$titulo = "Portafolioweb";
    break;
    case 'P':
	$contenido = "php/papeleria.php";
	$titulo = "papeleria ";
    break;
     case 'T':
	$contenido = "php/tarjetas.php";
	$titulo = "Tarjetas";
    break;
    case 'S':
	$contenido = "php/souvenirs.php";
	$titulo = "Souvenirs";
    break;
     case 'sellos':
	$contenido = "php/sellos.php";
	$titulo = "Sellos";
    break;
    case 'X':
	$contenido = "php/tecnologia_laser.php";
	$titulo = "laser";
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
	
        <script  src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	<header>

		<div class="contenedor"></div>

		<h1 class="icon-dog"><?php printf($titulo); ?></h1>
		<input type="checkbox" id="menu-bar">
		<label class="icon-menu" for="menu-bar"></label>
		<nav class="menu">
			<a href="index.php">Inicio</a>
			<a href="?op=Acerca">Acerca De Nosotros</a>
			<a href="?op=productos">Productos</a>
			<a href="?op=servicios">Servicios</a>
			<a href="?op=contactanos">Contactanos</a>
			

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
				<a id="uno"class="icon-facebook"href="login.php"></a>
				<a id="uno"class="icon-twitter"href="#"></a>
				<a id="uno"class="icon-instagram"href="#"></a>
				<a  id="uno"class="icon-googleplus"href="#"></a>
				
			</div>
		</div>
	</footer>
</body>
</html>