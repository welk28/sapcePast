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
		print"
			<script>
				var confirma= confirm('REALMENTE DESEA ELIMINAR?');
				if(confirma==true)
					window.location.href='quitaequipo2.php?idoc=$idoc&noev=$noev';
				else
					window.location.href='programa.php';
			</script>
		";
		?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>