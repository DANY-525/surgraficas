<?php 

require_once "conexion.php";

function insertarProducto($nombre,$descripcion,$tipoproducto,$imagen)
{

//Si $num_regs es igual a 0, insertamoslos datos en la tabla, sino mandamos un mensaje que diga que el usuario existe

  //Se ejecuta la funcion para subir la imagen
  include("funciones.php");
  $tipo = $_FILES["foto_fls"]["type"];
  $archivo = $_FILES["foto_fls"]["tmp_name"];
  $se_subio_imagen = subir_imagen($tipo,$archivo,$imagen);

  //Si la foto en el formulario viene vacia, entonces le asigno el valor de la imagen genérica, sino entonces el nombre de la foto que se subio.
  $imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;

     $sql = "INSERT INTO productos (idpro,nombre,descripcion,tipoproductos,imagen) values (0,'$nombre','$descripcion','$tipoproducto','$imagen')";

     $mysql = conexionMySQL();

     if($resultado =$mysql->query($sql))
     {
       $respuesta= "<div class='exito' data-recargar>Se inserto conexito el 
       registro del superheroe:<b>$nombre</b></div>";
     }
     else
     {
	   $respuesta = "<div class='error'>Ocurrio un error 
	   no se inserto el producto con el nombre del Producto::<b>$nombre</b></div>";

     }
     
     $mysql->close();
     return printf($respuesta);
}
function eliminarProducto($id)
{
    $sql = "DELETE FROM productos WHERE idpro=$id";

    $mysql = conexionMySQL();

    if($resultado =$mysql->query($sql))
    {
       $respuesta = "<div class='exito' data-recargar>Se Elimino
       con exito el registro del Superheroe con id: <b>$id</b></div>";
    }
    else
    {
	$repuesta ="<div class='error' >Ocurrio un error 
	no se pudo elminar el super heroe con numero de id::<b>$id</b></div>";
    }
    
    $mysql->close();
    return printf($respuesta);
}


function ActualizarProducto($idPro,$nombre,$descripcion,$tipoproducto,$imagen)
{
     $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', tipoproductos='$tipoproducto',
      imagen='$imagen' WHERE idpro=$idPro";
     $mysql = conexionMySQL();

     if($resultado =$mysql->query($sql))
     {
       $respuesta= "<div class='exito' data-recargar>Se actualizo conexito el 
       registro del superheroe:<b>$nombre</b></div>";
     }
     else
     {
       $respuesta = "<div class='error'>Ocurrio un error 
       no se actualizo  el registro con el nombre del Superheroe::<b>$nombre</b></div>";

     }
     
     $mysql->close();
     return printf($respuesta);
}
?>