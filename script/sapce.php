<?php 
	include "../conexion.php"; 
	$conexion=conectar();
	header("Content-Type: text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Script SAPCE</title>
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

	---PARTE 1 <BR>
	";

	include "predetermina.php";

	include "administrador.php";
	
	include "control.php";
	
	include "carrera.php";
	
	include "materias.php";
	
	include "posee.php";
	
	include "alumnos.php";

echo"---PARTE 2 <BR>";
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
	
	include "prerequi.php";
	
	include "listapre.php";

echo"---PARTE 3 <BR>";
	include "cursa.php";

echo"---PARTE 4 <BR>";
	include "cursa2.php";
	
//permisos
echo"<br><br>
grant all privileges on $base.* to tecnologico@localhost identified by 'PASSTEC';";
	?>
</body>
</html>