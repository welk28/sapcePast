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
				$sem2="update alumnos set status='1' where status='2';";
				$s2=mysql_query($sem2,$conexion);

				$sem3="update alumnos set status='2' where status='3';";
				$s3=mysql_query($sem3,$conexion);

				$sem4="update alumnos set status='3' where status='4';";
				$s4=mysql_query($sem4,$conexion);

				$sem5="update alumnos set status='4' where status='5';";
				$s5=mysql_query($sem5,$conexion);

				$sem6="update alumnos set status='5' where status='6';";
				$s6=mysql_query($sem6,$conexion);

				$sem7="update alumnos set status='6' where status='7';";
				$s7=mysql_query($sem7,$conexion);

				$sem8="update alumnos set status='7' where status='8';";
				$s8=mysql_query($sem8,$conexion);

				$sem9="update alumnos set status='8' where status='9';";
				$s9=mysql_query($sem9,$conexion);

				$sem10="update alumnos set status='9' where status='10';";
				$s10=mysql_query($sem10,$conexion);

				$sem11="update alumnos set status='10' where status='11';";
				$s11=mysql_query($sem11,$conexion);

				$sem12="update alumnos set status='11' where status='12';";
				$s12=mysql_query($sem12,$conexion);

				//de 13 a 12
				$sem13="update alumnos set status='12' where status='13';";
				$s13=mysql_query($sem13,$conexion);

				
				print"
						<script language='JavaScript'>

							window.alert('ACTUALIZACION EXITOSA');
							window.location='alumnos.php';

						</script>";			
		
		?>
	</header>
</div>
</body>
</html>