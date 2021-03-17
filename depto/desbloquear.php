<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='../index.php';
				</script>
				";
}
$band=$_GET[band];
	

		$matricula=$_GET[matricula];
		$nom=$_GET[nom];
		$fecha=$_GET[fecha];
		
		$desbloquea="update adeuda set status='0' where matricula='$matricula' and iddepto='$usuario' and fecha='$fecha';";
		$desblo=mysql_query($desbloquea,$conexion);

		if($desblo)
		{
			print"
				<script languaje='JavaScript'>
				window.alert('Desbloqueo exitoso');
					window.location.href='bloqueados.php';
				</script>
				";	
				//echo"exitoso";
		}
		else
		{
			print"
				<script languaje='JavaScript'>
				window.alert('Error al desbloquear');
					window.location.href='bloqueados.php';
				</script>
				";
				//echo"error";	
		}


		?>
	</header>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>