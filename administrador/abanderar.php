<?php  session_start();  ?>

<!DOCTYPE html >

<html>

<head>



<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>



<meta charset="UTF-8">

</head>



<body>

<div id="cuerpo">

	<header>

		<?php 	
		$matricula=$_GET[matricula];
		$usuario=$_SESSION['usuario'];

		include "../usuarios.php";	
		$banderar="select * from alumnos where matricula='$matricula';";
		$banejec=mysql_query($banderar,$conexion);
		$ban=mysql_fetch_object($banejec);

		$bnew=0;
		$nb=$ban->bandera;

		$bnew=$nb +1;
		echo"
		<br> bandera: $bnew
		";
		if($ban->bandera<2)
		{
			$actban="update alumnos set bandera='$bnew' where matricula='$matricula';";
			$actualba=mysql_query($actban,$conexion);

			print"
					<script languaje='JavaScript'>
					window.location.href='horalumno.php?matricula=$matricula&a=1';
					</script>
					";
		}
		else
		{
			print"
					<script languaje='JavaScript'>
					window.location.href='horalumno.php?matricula=$matricula';
					</script>
					";
		}
		?>
	</header>

	

	

	<section id="seccion">

		<p> contenido textual dentro de la seccion	</p>

		

	</section>

	<div style="clear: both; width: 100%;"></div>

	<footer >

		<?php	include "../pie.php";	?>

	</footer>

</div>



</body>

</html>

