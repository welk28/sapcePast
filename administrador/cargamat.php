<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>

	
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		
	$matricula=$_GET[matricula];
	
	$idmat=$_GET[idmat];
	$alumnosd="select * from alumnos where matricula='$matricula';";
	$alud=mysql_query($alumnosd,$conexion);
	$ad=mysql_fetch_object($alud);
	
	
		?>
	</header>
	<section id="seccion">
       
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>