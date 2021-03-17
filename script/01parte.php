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
	drop database if exists $base; <br>
	create database $base; <br>
	use $base; <br>

	--PARTE 1 <BR>
	";

	include "predetermina.php";

	include "administrador.php";
	
	include "control.php";
	
	include "carrera.php";
	
	include "materias.php";
	
	include "posee.php";
	
	include "alumnos.php";
	
	include "especialidad.php";
	
	//SI     include "adeuda.php";
	
	//SI     include "academico.php";
	
	//SI     include "aula.php";
	
	//SI     include "coordinador.php";
	
	//SI     include "coordina.php";
	
	//SI     include "servicio.php";
	
	//SI     include "docente.php";
	
	//SI     include "coordinaser.php";
	
	//SI     include "horario.php";
	
	//SI     include "division.php";
	
	//SI     include "grupo.php";
	
	//SI     include "hgrupo.php";
	
	//SI     include "imparte.php";
	
	//SI     include "encarre.php";
	
	//SI     include "depto.php";
	
	//SI     include "encarga.php";
	
	//SI     include "oportuniad.php";
	
	//SI     include "cursa.php";
	
	//SI     include "prerequi.php";
	
	//SI     include "listapre.php";
	

	?>
</body>
</html>