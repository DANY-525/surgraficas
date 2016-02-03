<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seciones con PHP</title>
	<style>
	*{
        margin: 0;
        padding: : 0;
        font-family: sans-serif;
        box-sizing: border-box;
  	 }
  	 body {
  	 	background: #DEDEDE;
  	 	display: flex;
  	 	min-height: 100vh;
  	 }
       form{
        margin: auto;
        width: 50%;
        max-width: 500px;
        background: #F3F3F3;
        padding: 30px;
        border: 1px solid rgba(0,0,0,0.2);       
              }
       h2 {
            text-align: center;
            margin-bottom: 28px;
            color:rgba(0,0,0,0.5);

       }

       input{
       	display: block;
       	padding: 10px;
       	width: 100%;
       	margin:30px 0;
       	font-size: 20px;
       }
       input[type="submit"]{
       	background: linear-gradient(#FFDA63, #FFB940);
       	border: 0;
       	color: brown;
       	opacity: 0.8;
       	cursor: pointer;
       	border-radius:20px;
       	margin-bottom: 0;

       }
       input[type="submit"]:hover{
         opacity: 1;

       }
        input[type="submit"]:active{
         transform: scale(0.95);

       }

       @media (max-width: 768px){
       	form{
       		width: 75%;
       	}
       	@media (max-width: 480px){
       	form{
       		width: 95%;
       	}
       	span{
       	color: red;
       	font-size: 4em;
       }
	</style>
</head>
<body>
	<form name"autencificacion_frm" action="control.php" method="post" enctype="application/x-www-urlencoded">
	<?php
	error_reporting(E_ALL ^ E_NOTICE);
    if($_GET["error"]=="si"){
      "<span> verifica tu datos</span>" ; 
    }
    else{
           echo"<h2>Introduce tus Datos</h2>";
    }
	?>

	 <input type="text" placeholder="&#128272;usuario" name="usuario_txt"required/> 
	<input type="password" placeholder="&#128272; Contraseña" name="password_txt"required/>
	<input type="submit" name="entrar_btn" value="Entrar"/>
	</form>
	 
</body>
</html>