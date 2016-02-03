<?php 

require_once "conexion2.php";
//El parametro de $extension determina que tipo de imagen no se borrará por ejemplo si es jpg significa que la imagen con extensión .jpg se queda en el servidor y si existen imagenes con el mismo nombre pero con extension png o gif se eliminaran, con esta función evito tener imagenes duplicadas con distinta extensiones para cada perfil la funcion file_exists evalua si un archivo existe y la funcion unlink borra un archivo del servidor
function borrar_imagenes($ruta,$extension)
{
  switch($extension){
    case ".jpg":
      if(file_exists($ruta.".png"))
        unlink($ruta.".png");
      if(file_exists($ruta.".gif"))
        unlink($ruta.".gif");
      break;
    case ".gif":
      if(file_exists($ruta.".png"))
        unlink($ruta.".png");
      if(file_exists($ruta.".jpg"))
        unlink($ruta.".jpg");
      break;
    case ".png":
      if(file_exists($ruta.".jpg"))
        unlink($ruta.".jpg");
      if(file_exists($ruta.".gif"))
        unlink($ruta.".gif");
      break;
  }
}

//Función para subir la imagen del perfil del usuario


function insertarProducto($nombre,$descripcion,$tipoproducto,$foto)
{

//Si $num_regs es igual a 0, insertamoslos datos en la tabla, sino mandamos un mensaje que diga que el usuario existe

  //Se ejecuta la funcion para subir la imagen
    
    


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