<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Actualización de password</title>
</head>
<body>
	<?php
		include "../conexion.php";
		$conexion=conectar();
		
		echo"use sapce; <br>";
		$horarios="select idh from horario where periodo='2018-1' order by idh asc;";
		$hora=mysql_query($horarios,$conexion);
		echo"insert into respuesta (idh,nop) values ";
		while($h=mysql_fetch_object($hora))
		{
			
			for($j=1; $j<=48; $j++ )
			{
				echo" ($h->idh,$j), <br>";
			}	
		}
		echo";";
		/*for($i=694; $i<=815; $i++ )
		{
			for($j=1; $j<=48; $j++ )
			{
				echo"insert into respuesta (idh,nop) values ($i,$j); <br>";		
			}	
		}*/

		
	?>
</body>
</html>