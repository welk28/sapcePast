<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="css/proweb.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cuerpo">
	<?php
	
	include_once ("conexion.php");
	function quien()
	{	
		$usuario=$_SESSION['usuario'];
    	$conexion=conectar();
	
	
			$cliente="select * from alumnos where matricula='$usuario';";
			$reg=mysql_query($cliente,$conexion);
			$n=mysql_num_rows($reg);
			if($n>0)
			{
				return(1); //inicio sesion un CLIENTE
			}
			else
			{
				return(0); //intruso
			}
		
	}
	
	?>
	
	
	
	
</div>

</body>
</html>
