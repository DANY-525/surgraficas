<?php include("sesion.php");?>
Bienvenido:
<?php echo $_SESSION ["usuario"];?>
<br /> <br/>
Estas en una P&aacute;guna segura con sesiones en PHP
<br /> <br />
<a href="archivo-protegido2.php">Ir A otra p&aacute;gina segura 2</a>
<br /> <br />
<a href="salir.php">salir</a>