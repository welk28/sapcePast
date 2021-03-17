<?php 
	include "../conexion.php"; 
	$conexion=conectar();
	header("Content-Type: text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Script SAPCE</title>
	<link href="<?php echo"$ip/css/proweb.css"; ?>" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" href="bootstrap-reboot.min.css">
	<link rel="stylesheet" href="bootstrap.css">
	<link href="favicon.png" rel="icon">
</head>
<body class="container">
	<?php 
	$base="sapce"; 
	echo"
	use $base; <br>

	--PARTE 2 <BR>
	";

	//include "predetermina.php";

	//SI     include "administrador.php";
	
	//SI     include "control.php";
	
	//SI     include "carrera.php";
	
	
	//SI     include "materias.php";
	
	//SI     include "posee.php";
	
	//SI     include "alumnos.php";
	
	include "periodo.php";

	include "depto.php";
	
	include "adeuda.php";
	
	include "academico.php";
	
	include "aula.php";
	
	include "coordinador.php";
	
	include "coordina.php";
	
	include "servicio.php";
	
	include "docente.php";
	
	include "coordinaser.php";
	
	include "horario.php";
	
	include "division.php";
	
	include "grupo.php";
	
	include "hgrupo.php";
	
	include "imparte.php";
	
	include "encarre.php";
	
	include "encarga.php";
	
	include "oportuniad.php";
	
	//SI     include "cursa.php";
	
	include "prerequi.php";
	
	include "listapre.php";
	
	include "certificado.php";
	?>
</body>
</html>