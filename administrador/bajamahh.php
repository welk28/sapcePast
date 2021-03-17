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
					
	$prede="delete from horario where idh='$idh';";
	$pre=mysql_query($prede,$conexion);
	
	$respuesta="delete from respuesta where idh='$idh';";
	$res=mysql_query($respuesta,$conexion);
		
	if(!$pre)
	{
			print"
				<script languaje='JavaScript'>
				alert('¡Error al BORRAR!, verifique que no tenga registros asignados, contacte al PROGRAMADOR');
				window.location.href='horario.php';
				</script>
				";
	}
	else
	{
			print"
				<script languaje='JavaScript'>
				alert('¡BORRADO exitoso!');
				window.location.href='horario.php';
				</script>
				";
			
	}
		?>
	</header>
	
	
</div>
</body>
</html>