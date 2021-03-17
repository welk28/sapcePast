<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>


</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
		$idh=$_GET[idh];?>
        
        
	<section id="seccion">	
  		<?php
		print"
			<script languaje='JavaScript'>
				var respuesta=confirm('¿Realmente desea quitar la materia del horario?');
				if(respuesta==true)
				{
					window.location.href='quitamat2.php?matricula=$matricula&idh=$idh';
				}
				else
				{
					window.location.href='horalumnod.php?matricula=$matricula&idh=$idh';
				}
			</script>";
		?>
    </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>