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
		<p> 	</p>
		<?php
		/*echo"
		<a href='sge.rar' target='_blank'>ARCHIVOS DE REFERENCIA</a> <br>
		<a href='$ip/administrador/matarea.php' target='_blank'>Ver asig a areas</a> <br>
        <a href='$ip/administrador/reticulamat.php' target='_blank'>RETICULA: materias</a>";*/
        ?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
