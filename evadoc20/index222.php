<?php
session_start();
$usuario=$_SESSION['usuario'];
//echo"$usuario";
$bandera=0;
		if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "chrome") == false)
		{
			print"
			<script>
				window.alert('¡¡ÉSTA PÁGINA SE VISUALIZA MEJOR CON GOOGLE CHROME!!');
			</script>
			";
			$bandera++;
		} 
		else 
		{
			$bandera=0;
		}
?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="normalize.css">
<script type="text/javascript" src="modernizr.custom.59193.js"></script>
<script language="JavaScript" type="text/javascript">
	function validar()
	{
		var usuario = document.inicia.usuario.value;
		var clave = document.inicia.clave.value;
		
		if((usuario != "") && (clave!= "") )
		{
			document.inicia.enviar.disabled = "";
		}
		else
		{
			document.inicia.enviar.disabled = "disabled";
		}
	}
</script>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "cabeza.php";	?>
	</header>
	
	
	<section id="seccion" >
    	<div id="registros"  >
			<div id="titulo"><p>LA EVALUACIÓN DOCENTE HA FINALIZADO, <br> Cierre de aplicacion: Miércoles 10 de Diciembre de 2014</p></div>
        </div>
	</section>
	
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
