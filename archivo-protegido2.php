<?php include("sesion.php");?>
Bienvenido:
<?php echo $_SESSION ["usuario"];?>
<br /> <br/>
Estas en otra P&aacute;guna segura con sesiones en PHP
<br /> <br />
<a href="archivo-protegido.php">Ir A otra p&aacute;gina segura 1</a>
<br /> <br />
<a href="salir.php">salir</a>