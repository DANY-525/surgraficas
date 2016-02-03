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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php printf($titulo); ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1,minumun scale=1">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="js/vista.js"> </script>
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
      
      <div class="contenedor">
      
      	<div id="precarga"></div>
      <h2></h2>
      
      </div>

    </section>

<form id="alta-contacto" name="alta_frm" action="php/agregar-contacto.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>subir Producto</legend>
		<div>
			<label for="email">Nombre: </label>
			<input type="text" id="email" class="cambio" name="email_txt" placeholder="Escribe nombre producto" title="Tu email" required />
		</div>
		<div>
			<label for="descripcion">descripcion: </label>
			<div class="descripcion">
				<textarea id="descripcion" name="descripcion_txa"  /> </textarea>
			</div>
		</div>
		<div>
			<label for="1">tipoproductos: </label>
			<input type="radio" id="1" name="producto_rdo" title="tipo" value="1" required  />&nbsp;<label for="1">sellos</label>
			&nbsp;&nbsp;&nbsp;
			<input type="radio" id="2" name="producto_rdo" title="Tipo" value="2" required />&nbsp;<label for="2">papeleria comercial</label>
			&nbsp;&nbsp;&nbsp;
			<input type="radio" id="3" name="producto_rdo" title="Tipo" value="3" required />&nbsp;<label for="3">tarjetas para toda ocacion</label>
			&nbsp;&nbsp;&nbsp;
			<input type="radio" id="4" name="producto_rdo" title="Tipo" value="4" required />&nbsp;<label for="4">souvenirs</label>
			<input type="radio" id="5" name="producto_rdo" title="Tipo" value="5" required />&nbsp;<label for="5">tecnologia laser</label>
			<input type="radio" id="5" name="producto_rdo" title="Tipo" value="6" required />&nbsp;<label for="6">impresion digital a color</label>
			<input type="radio" id="7" name="producto_rdo" title="Tipo" value="7" required />&nbsp;<label for="7">impresion gran formato</label>
			<input type="radio" id="8" name="producto_rdo" title="Tipo" value="8" required />&nbsp;<label for="8">diseño web</label>
			<input type="radio" id="9" name="producto_rdo" title="Tipo" value="9" required />&nbsp;<label for="9">instalacion de avisos</label>
			<input type="radio" id="10" name="producto_rdo" title="Tipo" value="10" required />&nbsp;<label for="10">distribucion publicitaria para su empresa</label>
			
			
		
		<div>
			<label for="foto">Foto: </label>
			<div class="adjuntar-archivo cambio">
				<input type="file" id="foto" name="archivo_fls" title="Sube tu foto" />
			</div>
			<div id="vista-previa"></div>
		</div>
		<div>
			<label for="foto2">Foto2: </label>
			<div class="adjuntar-archivo cambio">
				<input type="file" id="foto2" name="archivo2_fls" title="Sube tu foto" />
			</div>
			<div id="vista-previa2"></div>
		</div>
		<div>
				<label for="foto2">Foto3: </label>
			<div class="adjuntar-archivo cambio">
				<input type="file" id="foto3" name="archivo3_fls" title="Sube tu foto" />
			</div>
			<div id="vista-previa3"></div>
		</div>
		<div>
			<input type="submit" id="enviar-alta" class="cambio" name="enviar_btn" value="agregar" />
		</div>
		<?php include("php/mensajes.php"); ?>
	</fieldset>
</form>

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
