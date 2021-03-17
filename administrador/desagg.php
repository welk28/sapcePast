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
				
	$prede="delete from hgrupo where idh='$idh' and idg='$idg'";
	$pre=mysql_query($prede,$conexion);
	
		
	if(!$pre)
	{
			print"
				<script languaje='JavaScript'>
				alert('¡Error al desasignar!, contacte al PROGRAMADOR');
				window.location.href='horario.php';
				</script>
				";
	}
	else
	{
			print"
				<script languaje='JavaScript'>
				alert('¡ha sido desasignado!');
				window.location.href='horario.php';
				</script>
				";
	}
		?>
	</header>
	
	
</div>
</body>
</html>