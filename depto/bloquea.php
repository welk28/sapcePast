<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
	$matricula=$_GET[matricula];
	
		?>

	</header>
	<section id="seccion">
		<div id="registros" >
		<?php  
			$matricula=$_GET[matricula];
			$descrip=$_GET[descrip];
			$fecha= date("Ymd");
			//echo" 	$matricula <br> $fecha ";
			if(!empty($descrip))
			{
				$bloquea="insert adeuda values ('$matricula', '$usuario', '$fecha', '$descrip', '$periodo', '1');";
				$blo=mysql_query($bloquea,$conexion);

				if($blo)
				{
					print"
						<script languaje='JavaScript'>
						window.alert('Bloqueo exitoso');
							window.location.href='bloqueados.php';
						</script>
						";	
						//echo"exitoso";
				}
				else
				{
					print"
						<script languaje='JavaScript'>
						window.alert('Error al bloquear');
							window.location.href='bloqueados.php';
						</script>
						";
						//echo"error";	
				}
			}
			else
			{
				echo "<div class='subtitulo'> Agregue el motivo del bloqueo </div>
				<form action='bloquea.php'>
				<table>
					<tr>
						<td align='center'> <input type='hidden' name='matricula' value='$matricula'>
							<textarea name='descrip' cols='45' rows='5' placeholder='Indique motivo de bloqueo'  align='center'></textarea>
						</td>
					</tr>
					<tr>						
						<td align='center'> 
							<input type='submit' value='Bloquear'> 
						</td>
					</td>
				</table>
		</form>
				";
			}
			
		?>

        
		</div>
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>