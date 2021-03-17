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
		$periodo=$_SESSION['periodo'];
		$perio=$_POST[perio];
		$descper=$_POST[descper];
		$reporte=$_POST[reporte];
		$predet=1;
		
		$cons="select predet from periodo;";
		$con=mysql_query($cons,$conexion);
		$cn=mysql_num_rows($con);
		$noper=$cn+1;
		
	//echo"idh: $idh <br> matricula: $matricula <br> opor: $opor <br> fecing: $fecha <br>asigna: $usuario";
	//$prede="update periodo set predet='0' where periodo='$periodo';";
	//$pre=mysql_query($prede,$conexion);
	
	//$_SESSION['periodo']=$perio;
	echo"perio $perio <br> descper $descper <br> reporte $reporte <br> predet $predet <br> noper $noper <br>";
	//$alta="insert into periodo values ('$perio','$noper', '$descper', '$reporte', '$predet')";
	
	/*$al=mysql_query($alta,$conexion);		
	if(!$al)
	{
			print"
				<script languaje='JavaScript'>
				alert('¡Error al guardar!, contacte al PROGRAMADOR');
				window.location.href='periodo.php';
				</script>
				";
	}
	else
	{*/
			
			$status="select matricula, status from alumnos where status>=1 and status<12;";
			$sta=mysql_query($status,$conexion);
			while($st=mysql_fetch_object($sta))
			{
				$nsta=$st->status+1;
				$actualiza="update alumnos set status='$nsta' where matricula='$st->matricula';";
				$act=mysql_query($actualiza);
			}
			
			print"
				<script languaje='JavaScript'>
				var respuesta=confirm('¡Alta exitosa! ¿Desea resetear el contador de números de control? Pulse ACEPTAR, o CANCELAR para regresar a PERIODO');
				if(respuesta==true)
				{
					window.location.href='resetea.php';
				}
				else
				{
					window.location.href='periodo.php';
				}
				</script>
				";	
	//}
		?>
	</header>
	
	
</div>
</body>
</html>