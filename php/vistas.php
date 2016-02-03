<?php require_once"conexion.php";

function listaProductosEditada($id)
{
  $mysql = conexionMySQL();
  $sql = "SELECT * FROM tipoproductos";
  $resultado = $mysql->query($sql);
  $lista= "<select id='tipoproductos' name='tipoproductos_slc' require>";
    $lista .="<option value=''>---</option>";

  while($fila = $resultado->fetch_assoc())
  {

    //$lista .= "<option value='".$fila["id_editorial"]."'>".$fila["editorial"]."</option>";
     $selected = ($id == $fila["idtipoproductos"])?"selected":"";
     $lista .= sprintf(
      "<option value='%d'$selected>%s</option>",
      $fila["idtipoproductos"],
      $fila["tipoproductos"]
     );

  }
$lista .="</select>";

  $resultado->free();
  $mysql->close();
  return $lista;
}
function editarProducto($idPro)
{

 $mysql = conexionMySql();
 $sql ="SELECT * FROM productos WHERE idpro=$idPro ORDER BY idpro DESC";
 if($resultado = $mysql ->query($sql))
 {
    //mustro el form con los datos del registro
   $fila=$resultado->fetch_assoc();

  $form .= "<div id='muestrat'>";
   $form .=" <ul >";

         $form .="<li class='muestrat1'>";
               $form .= "<label for ='name'>".$fila["nombre"].":</label>";
         $form .="</li>";
           $form .="<li class='muestrat2'>";
                $form .= "<label for ='descripcion'>".$fila["descripcion"].":</label>";
                $form .="</li>";    
                  $form .="</ul>";    
               $form .= "</div>";

       



         $form .=" <ul class='slider5'>";

         $form .="<li>";
                $form .="<input type='radio' id='sbutton1' name='sradio' checked>";
                $form .= "<label for='sbutton1'></label>";
               $form .= "<td><img src='php/".$fila["imagen"]."'/></td>";
         $form .="</li>";
         $form .="<li>";
                $form .="<input type='radio' id='sbutton2' name='sradio' checked>";
                $form .= "<label for='sbutton2'></label>";
                $form .= "<td><img src='php/".$fila["imagen2"]."'/></td>";
          $form .="</li>";
          $form .="<li>";
                $form .="<input type='radio' id='sbutton3' name='sradio' checked>";
                $form .= "<label for='sbutton3'></label>";
                $form .=" <iframe width='1280' height='720' src='https://www.youtube-nocookie.com/embed/PPu_IlP1D70'  frameborder='0' aallowfullscreen></iframe>";
          $form .="</li>";
          $form .="<li>";
                $form .="<input type='radio' id='sbutton4' name='sradio' checked>";
                $form .= "<label for='sbutton4'></label>";
               $form .= "<td><img src='php/".$fila["imagen3"]."'/></td>";
          $form .="</li>";
    $form.="</ul>";

           
        













     $form .= "</fieldset>";
   $form .= "</form>";
 
                  
   $resultado->free();           
 
 }
 else
 {
  //muestro el mensaje del error
  $form = "<div class='error'>Error: No se ejecuto la consulta de la base de datos</div>";
 } 
$mysql->close();
 return printf($form);
}

function catalogoProductos()
{
  //echo "funciona";
    $productos = Array();

    $mysql = conexionMySQL();
    $sql = "SELECT * FROM tipoproductos ";
    if($resultado = $mysql->query($sql))
   {
      while ($fila = $resultado->fetch_assoc()) 
      {
         $productos[$fila["idtipoproductos"]] = $fila["tipoproductos"];
      }
      $resultado->free();
    }
     $mysql->close();
  // print_r($editoriales);
     return $productos;
}
function mostrarProductos()
{
$productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=2 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 4;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?op=p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?op=p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?op=p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
  
    
    
    
    

  


    $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }

 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos1()
{
$productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=3 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
  $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }

 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos2()
{
$productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=4 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
   $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos4()
{
$productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=1 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
    $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}

function mostrarProductos5()
{
 $productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=5 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
   $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos6()
{
$productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=6 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
  $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos7()
{
 $productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=7 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
   $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos10()
{
 $productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=10 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
 $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
function mostrarProductos9()
{
 $productos = catalogoProductos();
 $mysql = conexionMySQL();

 $sql ="SELECT * FROM productos WHERE tipoproductos=9 ORDER BY idpro DESC";
 if ($resultado = $mysql->query($sql)) 
 {
  //echo"wiii";
  //si no hay hay registro en la base de datos
  //compruebo que el query me devuelva registros
  $totalRegistros = mysqli_num_rows($resultado);
  if($totalRegistros==0)
    {
      $respuesta ="<div class'error'>La base de datos Esta Vacia No Existe
      registros de super heroes. la base de datos esta vacia </div>";
    }
  
  else
  {
    /* INICIA PAGINACION */

  //LIMITAR MI CONSULTA
    $regXpag = 6;
    $pagina = false;

    //Examinar la pagina a mostrar y el inicio del registro a mostrar

    if(isset($_GET["p"]))
    {
      $pagina = $_GET["p"];
    }
    if(!$pagina)
    {
      $inicio = 0;
      $pagina = 1;
    }
    else
    {
      $inicio = ($pagina -1) * $regXpag;
    }
    //calculo el total de paginas
    $totalPaginas = ceil($totalRegistros/$regXpag);
    
    
    $sql = $sql." LIMIT ".$inicio.",".$regXpag;
   
    $resultado = $mysql->query($sql);
    //despliegue de la paginacion
    $paginacion = "<div class='paginacion'>";
        $paginacion .="<p>";
           $paginacion .= "Numero de Resultados: <b>$totalRegistros</b>.";
           $paginacion .="Mostrando <b>$regXpag</b> resultados por pagina. ";
           $paginacion .= "Pagina <b>$pagina</b> de <b>$totalPaginas</b>";
        $paginacion .="</p>";
        if($totalPaginas>1)
        {
            $paginacion .="<p>";

                 $enlace2 ="<a href='?p=".($pagina-1)."'>&laquo</a>"; 
                 $paginacion .= ($pagina!=1)?$enlace2:"";
                 for($i=1;$i<=$totalPaginas;$i++)
                 {
                  //su muestro el indice de la pagina actual, no coloco enlace
                  $actual = "<span class='actual'>$pagina</span>";
                  //si el indice no corresponde a la pagina anterior
                  $enlace = "<a href='?p=$i'>$i</a>";
                  $paginacion .=($pagina == $i)?$actual:$enlace;

                 }
                 $enlace3 ="<a href='?p=".($pagina+1)."'>&raquo</a>";
                 $paginacion .=($pagina!=$totalPaginas)?$enlace3:"";

            $paginacion .="</p>";

        }
    $paginacion .= "</div>";
    //echo $sql."<br />".$totalPaginas;
    

    /*  TERMINA PAGINACION*/
  $tabla = "<table id='tablita' class='tablilla'>";

    $tabla .= "<tbody>";
    while($fila = $resultado->fetch_assoc())
    {
      $tabla .="<tr class='conteneedor'>";
        $tabla .= "<td id='uno'class='item'><img src='php/".$fila["imagen"]."'/></td>";
       
        
      
       
        $tabla .= "<td =''class='itemdos'>  <a href='#' class='editar' data-id='".$fila["idpro"]."'>".$fila["nombre"]."</a></td>";
        $tabla .= "<td class='itemtres'>  <a href='#' class='eliminar' data-id='".$fila["idpro"]."'><img src='php/img/like.jpg'/></a></td>";
        

      $tabla .="</tr>";

    }
    $resultado->free();
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    $respuesta = $tabla.$paginacion;

  }
 }
 else
 {
  //echo "NOO";
  $respuesta ="<div class='error'>Error: No se ejecuto la consulta
  a la base de datos</div>";
 }
 $mysql->close();
 return printf($respuesta);
}
 ?>