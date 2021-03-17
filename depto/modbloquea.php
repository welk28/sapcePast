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
			$fecha= $_GET[fecha];
			$band=$_GET[band]; 
$app=$_GET[app];
$apm=$_GET[apm];
$nom=$_GET[nom];

			//echo" 	$matricula <br> $fecha ";
			if($band==1)
			{
				$modbloquea="update adeuda set descrip='$descrip' where matricula='$matricula' and iddepto='$usuario' and fecha='$fecha';";
				$modb=mysql_query($modbloquea,$conexion);

				if($modb)
				{
					print"
						<script languaje='JavaScript'>
						window.alert('Modificacion exitosa');
							window.location.href='bloqueados.php';
						</script>
						";	
						//echo"exitoso";
				}
				else
				{
					print"
						<script languaje='JavaScript'>
						window.alert('Error al modificar');
							window.location.href='bloqueados.php';
						</script>
						";
						//echo"error";	
				}
			}
			else
			{
				echo "<div class='subtitulo'> Agregue el motivo del bloqueo de $app $apm $nom </div>
				<form action='modbloquea.php'>
				<table>
					<tr>
						<td align='center'> <input type='hidden' name='matricula' value='$matricula'>
							<textarea name='descrip' cols='45' rows='5'   align='center'>$descrip</textarea>
							<input type='hidden' name='fecha' value='$fecha'>
						</td><input type='hidden' name='band' value='1'>
					</tr>
					<tr>						
						<td align='center'> 
							<input type='submit' value='Modificar'> 
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