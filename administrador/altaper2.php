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


	$prede="update periodo set predet='0' where periodo='$periodo';";


	$pre=mysql_query($prede,$conexion);


	


	$_SESSION['periodo']=$perio;


	echo"perio $perio <br> descper $descper <br> reporte $reporte <br> predet $predet <br> noper $noper <br>";


	$alta="insert into periodo values ('$perio','$noper', '$descper', '$reporte', '$predet')";


	


	$al=mysql_query($alta,$conexion);		


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


	{


			


			/*$status="select matricula, status from alumnos where status>=1 and status<12;";


			$sta=mysql_query($status,$conexion);


			while($st=mysql_fetch_object($sta))


			{


				$nsta=$st->status+1;


				$actualiza="update alumnos set status='$nsta' where matricula='$st->matricula';";


				$act=mysql_query($actualiza,$conexion);


			}*/


			


							


				$sem13="update alumnos set status='13' where status='12';";


				$s13=mysql_query($sem13,$conexion);





				$sem12="update alumnos set status='12' where status='11';";


				$s12=mysql_query($sem12,$conexion);





				$sem11="update alumnos set status='11' where status='10';";


				$s11=mysql_query($sem11,$conexion);





				$sem10="update alumnos set status='10' where status='9';";


				$s10=mysql_query($sem10,$conexion);





				$sem9="update alumnos set status='9' where status='8';";


				$s9=mysql_query($sem9,$conexion);





				$sem8="update alumnos set status='8' where status='7';";


				$s8=mysql_query($sem8,$conexion);





				$sem7="update alumnos set status='7' where status='6';";


				$s7=mysql_query($sem7,$conexion);





				$sem6="update alumnos set status='6' where status='5';";


				$s6=mysql_query($sem6,$conexion);





				$sem5="update alumnos set status='5' where status='4';";


				$s5=mysql_query($sem5,$conexion);





				$sem4="update alumnos set status='4' where status='3';";


				$s4=mysql_query($sem4,$conexion);


				


				$sem3="update alumnos set status='3' where status='2';";


				$s3=mysql_query($sem3,$conexion);





				$sem2="update alumnos set status='2' where status='1';";


				$s2=mysql_query($sem2,$conexion);


				


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


	}


		?>


	</header>


	


	


</div>


</body>


</html>