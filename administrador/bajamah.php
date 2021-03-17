<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>

	
<div id="cuerpo">
	<header>
		<?php 	include "../conexion.php";	
	$conexion=conectar();
	$idg=$_GET[idg];
	$idh=$_GET[idh];
	print"<script languaje='JavaScript'>
				var respuesta=confirm('¿Realmente desea BORRAR este horario?');
				if(respuesta==true)
				{
					window.location.href='bajamahh.php?idh=$idh';
				}
				else
				{
					window.location.href='horario.php';
				}
				</script>
				";	
		?>
	</header>
	
	
</div>
</body>
</html>