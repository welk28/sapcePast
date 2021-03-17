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
				var respuesta=confirm('¿Realmente desea desasignar ésta materia a $idg');;
				if(respuesta==true)
				{
					window.location.href='desagg.php?idh=$idh&idg=$idg';
				}
				else
				{
					window.location.href='horario.php';
				}
				</script>
				";	
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