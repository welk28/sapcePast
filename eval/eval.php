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

		include "conexion.php";	
		$conexion=conectar();?>
	</header>
	<?php 
$periodo='2018-1';
$evalcursa="select c.matricula, c.idh, c.eval from cursa as c, horario as h where h.idh=c.idh and h.periodo='2018-1';";
$evalc=mysql_query($evalcursa,$conexion);
		while($e=mysql_fetch_object($evalc))
		{
			echo"update cursa set eval='$e->eval' where matricula='$e->matricula' and idh='$e->idh'; <br>";	
		}
		 ?>
	
	<section id="seccion">
	

		
	
	
		
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
