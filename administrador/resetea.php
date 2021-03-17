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
	$prede="update control set opcion='0' where id='2';";
	$pre=mysql_query($prede,$conexion);
	
		
	if(!$pre)
	{
			print"
				<script languaje='JavaScript'>
				alert('¡Error al guardar!, contacte al PROGRAMADOR');
				window.location.href='periodo.php';
				</script>
				";
	}
	else
	{
			print"
				<script languaje='JavaScript'>
				alert('¡El contador ha sido reseteado!');
				window.location.href='periodo.php';
				</script>
				";
			
	}
		?>
	</header>
	
	
</div>
</body>
</html>