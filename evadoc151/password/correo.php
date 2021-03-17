<?php  session_start();  ?>
<?php 	
	include "../../conexion.php";
		$conexion=conectar();
		$matricula=$_POST[matricula];
		$mail=$_POST[mail];
   $sqa="select nom, email, idcar, fecnac, status from alumnos where matricula='$matricula'";
  $sa=mysql_query($sqa,$conexion);
  $a=mysql_fetch_object($sa);

$direccion="select des from control where id='6';";
$dire=mysql_query($direccion,$conexion);
$di=mysql_fetch_object($dire);
$ip=$di->des;
		?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="<?php echo"$ip/css/proweb.css"; ?>" rel="stylesheet" type="text/css" >

</head>

<body>
<div id="cuerpo">
	<header>
		
	</header>
	
	
	<section id="seccion">
   <?php
   
   $asunto='TU PASSWORD SOLICITADO';
   if(mail($mail, "$asunto: itiztapalapa2.edu.mx", "Nombre: $a->nomal
	TE RECORDAMOS TU CONTRASEÑA, ESPERAMOS CONTAR CON TU PRONTA EVALUACION. Saludos
	Tu usuario: $matricula  
	$asunto: $a->fecnac", "<FROM: itiztapalapa2 >"))
	{
		print"
		<script languaje='JavaScript'>
		window.alert('Envío exitoso, revise su bandeja de entrada y La Bandeja de Correos no deseados');
		window.location.href='../index.php';
		</script>";
	}
	else
	{
		print"
		<script languaje='JavaScript'>
		window.alert('Error al enviar, consulte al webmaster');
		window.location.href='../index.php';
		</script>";
	}

	mail("welckarea@hotmail.com", "$asunto: itiztapalapa2.edu.mx", "Nombre: $a->nomal
	TE RECORDAMOS TU CONTRASEÑA, ESPERAMOS CONTAR CON TU PRONTA EVALUACION. Saludos
	Tu usuario: $matricula
	$asunto: $a->fecnac", "<FROM: itiztapalapa2 >");
	
   ?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
