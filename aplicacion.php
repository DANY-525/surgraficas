<?php include("sesion.php");?>
<?php include"vistas2.php"; ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$op = $_GET["op"];
switch ($op) {
	
    case 'al':
	$contenido = "altaproductos.php";
	$titulo = "Alta Producto";
    break;
    case 'avisos':
	$contenido = "php/avisos.php";
	$titulo = "Avisos";
	case 'contactanos':
	$contenido = "php/contactanos.php";
	$titulo = "Contactanos";
    break;
    case 'sa':
	$contenido = "salir.php";
	$titulo = "salir";
    break;
     case 'api':
	$contenido = "aplicacion.php";
	$titulo = "aplicacion";
    break;


  
    

	default:
		$contenido = "php/home2.php";
		$titulo = "Aplicativo CRUD";
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

		<h1 class="icon-dog"> </h1>
		<input type="checkbox" id="menu-bar">
		<label class="icon-menu" for="menu-bar"></label>
		<nav class="menu">
			<a href="?op=api">CRUD</a>
			<a href="altaproductos.php">ALTA</a>
			<a href="#" id="insertar">Insertar</a>
			
			<a href="salir.php">cerrar Session</a>
			
        
		</nav>
	</header>
	<main>
		
		<header id="cabecera">
		<h3><?php echo $_SESSION ["usuario"];?></h3>


		
		
		
	</header>
	<div><?php printf($titulo); ?></div>
	<div id="precarga"></div>
	<section id="contenido">
		<!--<p>aqui va el contenido</p>-->
		
		<section id="contenido">
    <section id="banner">
      <img src="img/partada3.jpg" >
      <div class="contenedor">
      	<div id="respuesta"></div>
      	<div id="precarga"></div>
      <h2></h2>
      
      </div>

    </section>

			<?php include("php/mensajes.php"); ?>

		<?php productos(); ?>
		
		
	</section>
	<script src="js/despachador.js"></script>
	</main>
	<footer>
		<div class="contenedor">
			<p class="copy">SUR GRAFICAS  &copy; 2015</p>
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