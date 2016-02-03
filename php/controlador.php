<?php 
require"vistas.php";
require"modelo.php";

$transaccion = $_POST["transaccion"];
//echo $transaccion;
function ejecutarTransaccion($transaccion)
{
if($transaccion=="alta")
{
   altaProducto();
}
else if($transaccion=="insertar")
{
	insertarProducto($_POST["nombre_txt"], $_POST["descripcion_txa"] , $_POST["productos_slc"], $_POST["foto_fls"]);

}
else if($transaccion=="eliminar")
{
	eliminarProducto($_POST["idHeroe"]);

}
elseif ($transaccion=="editar") 
{
	editarProducto($_POST["idPro"]);
}
elseif ($transaccion=="actualizar") 
{
	ActualizarProducto($_POST["idPro"],$_POST["nombre_txt"], $_POST["descripcion_txa"] , $_POST["tipoproductos_slc"], $_POST["imagen_txt"]);

}
}
ejecutarTransaccion($transaccion);
 ?>