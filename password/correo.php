<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="http://itiztapalapa2.edu.mx/sapce/css/proweb.css" rel="stylesheet" type="text/css">
<!-- JS para control de menu-->      
    	<script type="text/javascript" src="http://localhost/js/jquery-1.8.1.min.js"></script>   
        <script type="text/javascript" src="http://localhost/js/approot.js"></script>    
        <!-- FIN DEL JS-->
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
	include "../conexion.php";
		$conexion=conectar();
		$matricula=$_POST[matricula];
	
   $sqa="select nomal, email, idcar, fecnac, status from alumnos where matricula='$matricula'";
  $sa=mysql_query($sqa,$conexion);
  $a=mysql_fetch_object($sa);

		?>
	</header>
	
	
	<section id="seccion">
   <?php
   //$correo=$a->email;
   $correo="micorreo@hotmail.com";
   $asunto='TU PASSWORD SOLICITADO';
   if(mail($correo, "$asunto: itiztapalapa2.edu.mx", "Nombre: $a->nomal
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
