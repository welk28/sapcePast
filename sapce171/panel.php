<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

<meta charset="UTF-8">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
		$usuario=$_SESSION['usuario'];
		include "usuarios.php";	?>
	</header>
	
	
	<section id="seccion">
		<p> contenido textual dentro de la seccion	</p>
		
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
