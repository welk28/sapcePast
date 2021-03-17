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
		$usuario=$_SESSION['usuario'];
		$matricula=$_POST[matricula];
		$idh=$_POST[idh];
		$idmat=$_POST[idmat];
		$opor=$_POST[opor];
		$prom=$_POST[prom];
		$idcar=$_POST[idcar];
		$fecha=date('Y-m-d');

		if(($prom>100)||($prom<0))
		{
			print"
				<script languaje='JavaScript'>
				alert('¡PROMEDIO INCORRECTO');
				window.location.href='agregar_a_grupo1.php?matricula=$matricula&idh=$idh&idcar=$idcar';
				</script>
				";
				exit();
		}
	//echo"idh: $idh <br> matricula: $matricula <br> opor: $opor <br> fecing: $fecha <br>asigna: $usuario";
	$alta="update cursa set prom='$prom' where idh='$idh' and matricula='$matricula';";
	$al=mysql_query($alta,$conexion);		
	if(!$al)
	{
			print"
				<script languaje='JavaScript'>
				alert('¡Error al guardar!, contacte al PROGRAMADOR');
				window.location.href='horalumno.php?matricula=$matricula';
				</script>
				";
	}
	else
	{
		print"
				<script languaje='JavaScript'>
				alert('¡Alta de materia exitosa!');
				window.location.href='historial.php?matricula=$matricula&idh=$idh&idcar=$idcar';
				</script>
				";
	}
		?>
	</header>
	
	
</div>
</body>
</html>