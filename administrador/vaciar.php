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
		$fecha=date('d/m/Y');?>
        
	<section id="seccion">	
  		<?php
		print"
			<script languaje='JavaScript'>
				var respuesta=confirm('¿Realmente desea vaciar el horario?');
				if(respuesta==false)
				{
					window.location.href='horalumno.php?matricula=$matricula';
				}
			</script>";
			
			
			$grupos="select c.idh from cursa as c, horario as h where c.idh=h.idh and matricula='$matricula' and h.periodo='$periodo';";
			$gru=mysql_query($grupos,$conexion);
			while($g=mysql_fetch_object($gru))
			{
				$borra="delete from cursa where matricula='$matricula' and idh='$g->idh';";
				$bo=mysql_query($borra,$conexion);
			}
			if($bo)
			{
				print"
					<script languaje='JavaScript'>
					window.alert('¡Borrado exitoso!, VER HORARIO');
					window.location.href='horalumno.php?matricula=$matricula';
					</script>";			
			}
			else
			{
				print"
					<script languaje='JavaScript'>
					window.alert('ERROR, VERIFIQUE CON EL PROGRAMADOR');
					window.location.href='horalumno.php?matricula=$matricula';
					</script>";
			}
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