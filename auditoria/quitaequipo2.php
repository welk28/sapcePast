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
		$noev=$_GET[noev];
		$idoc=$_GET[idoc];
		
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
		?>
	</header>
	<section id="seccion">
		<?php
		$eliminar="delete from audita where noev='$noev' and idoc='$idoc';";
		$eli=mysql_query($eliminar,$conexion);
		if($eli)
		{
			print"
			<script>
				window.alert('Borrado exitoso');
				window.location.href='programa.php';
			</script>
			";
		}
		else
		{
			print"
			<script>
				window.alert('ERROR AL BORRAR');
				window.location.href='programa.php';
			</script>
			";
		}
		
		?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>