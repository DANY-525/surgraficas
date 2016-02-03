<?php
if (isset($_POST['submit'])) {
$fp = fopen("db.js","a");

fwrite($fp,  "add(" . '"' . "<a href=" . "'" . $_POST['link'] . "'" . ">" . $_POST['titulo'] . "</a>" . '"' . "," . '"' . $_POST['palabra'] . '"' . "," . '"' . $_POST['desc'] . '"' . ")" . PHP_EOL);

fclose($fp);
$titulo = $_POST['titulo'];
echo "<center><img src='http://www.michaelasher.com/ok.png'><br><br>";
echo "Has añadido a <font color='darkblue'>$titulo</font> al buscador!<br><a href='agregar.php' title='volver'>Volver</a> | <a href='buscar.html' title='buscar'>Ir al buscador</a>"; 
die; 
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" />
Link:<input type="text" name="link" required="required" /><br>
Titulo:<input type="text" name="titulo" required="required" /><br>
palabra clave: <input type="text" name="palabra" required="required" /><br>
Descripci&oacute;n:<input type="text" name="desc" required="required" /><br>

    <input name="submit" type="submit" value="Agregar">
    
</form>