<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		include "../conexion.php";
		$conexion=conectar();
		$idh=$_GET[idh];
		$datos="select * from cursa where idh='$idh';";
		$dat=mysql_query($datos,$conexion);
		while($d=mysql_fetch_object($dat))
		{
			echo"update cursa set  
			po1='$d->po1', 
			so1='$d->so1', 
			po2='$d->po2', 
			so2='$d->so2', 
			po3='$d->po3', 
			so3='$d->so3', 
			po4='$d->po4', 
			so4='$d->so4', 
			po5='$d->po5', 
			so5='$d->so5', 
			po6='$d->po6', 
			so6='$d->so6', 
			po7='$d->po7', 
			so7='$d->so7', 
			po8='$d->po8', 
			so8='$d->so8', 
			po9='$d->po9', 
			so9='$d->so9', 
			deser='$d->deser', 
			prom='$d->prom'
			 where $d->matricula <br>";
		}
	?>
</body>
</html>