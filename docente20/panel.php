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
	
		include "../usuarios.php";	?>
	</header>
	
	
	<section id="seccion">
		<div id="registros">
			<table>
				<tr>
					<th><?php echo"<a href='$ip/evadoc151/horalumno.php'>Evaluación Docente</a>"; ?></th>
					<th><?php echo"<a href='$ip/auditoria/index.php'>Auditoria de Servicios"; ?></th>
				</tr>
			</table>
		</div>
		
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
