<?php
if(!$registro_contacto["producto"])
{
	include("conexion.php");

}

$consulta="SELECT * FROM tipoproductos ORDER BY tipoproductos";
$ejecutar_consulta = $conexion->query($consulta);

while($registro = $ejecutar_consulta->fetch_assoc())
{
	$nombre_pais = utf8_encode($registro["tipoproductos"]);
	echo "<option value='$nombre_pais'";

  if($nombre_pais==utf8_decode($registro_contacto["tipoproductos"]))
  {
  	echo "selected";
  }
	echo">$nombre_pais</option>";
}
?>