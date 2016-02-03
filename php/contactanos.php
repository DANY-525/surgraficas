<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<style>
body{
 
  background-size: 100vw 100vh;
  background_attachment: fixed;
  margin: 0;
}
form{
  width: 450px;
  margin:auto;
  background: rgba(0,0,0,0.4);
  padding: 10px 20px;
  box-sizing:border-box;
  margin-top: 20px;
  border-radius: 7px;
}
h2{
  color: #fff;
  text-align: center;
  margin:0;
  font-size: 30pz;
  margin-bottom: 20px;
}
input,textarea{
  width: 100%;
  margin-bottom: 20px;
  padding: 7px;
  box-sizing:border-box;
  border: none;
}
textarea{
  min-height: 100px;
  max-height: 200px;
  max-width: 100%

 }
 #boton{
  background: #31384A;
  color:  #fff;
  padding:20px;
 }
 #boton:hover{
  cursor:pointer;
 }
@media (max-width:480px){
 form, iframe, p, h3
 {
  width: 100%;
 }
 }

</style>
<body>
  <section id="contenido">
    <section id="banner2">
      <img src="img/Plantilla8.png" >
      <div class="contenedor2">
      <h2></h2>
 </div>
    </section>
    <p>¿ Escribenos estamos felices de responder tus dudas tus cotizaciones y sugerencias?</p>
      <h3>Sur Graficas Popayan_Cauca</h3>

<?php
  error_reporting(E_ALL ^ E_NOTICE);
    if($_GET["enviado"]=="si"){
      "<span>MENSAJE ENVIADO</span>" ; 
    }
    else{
           echo"<h2>Introduce tus Datos</h2>";
    }
  ?>
<form action="enviar.php" method="POST">
  
  <h2>CONTACTO</h2>
  <input type="text" name="Nombre" Placeholder="Nombre" required>
  <input type="text" name="correo" Placeholder="correo" vulue="surgraficas@gmail.com" required>
  <input type="text" name="telefono" Placeholder="telefono" required>
  <textarea name="mensaje" placeholder="escriba aqui su mensaje" required></textarea>
  <input type="submit" value="ENVIAR" id="boton">
</form>


    
   
     
      
    
	<h4>Nuestra Ubicacion</h4>
	<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2s!4v1446488569568!6m8!1m7!1s6ILKXRXBNi-5Q3BWaLhHuw!2m2!1d2.441225791274381!2d-76.61124343767202!3f10.08444270693822!4f-5.122115399859808!5f0.4000000000000002" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </body>
</html>