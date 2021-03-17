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
	$base="auditoria"; 
	echo"
	drop database if exists $base; <br>
	create database $base; <br>
	use $base; <br>

	--PARTE 1 <BR>";
	include "administrador.php";
	include "control.php";	
	include "alumnos.php";
	include "periodo.php";
	include "servicio.php";
	
echo"---PARTE 2 <BR>";
include "docente.php";
include "coordinaser.php";
include "horario.php";
include "imparte.php";
include "auditoria.php";
include "audita.php";
include "preguntaudita.php";
include "respondaudita.php";
include "respondcomenta.php";
include "puesto.php";

echo"---PARTE 3 <BR>";
	include "cursa.php";

	
//permisos
echo"<br><br>
grant all privileges on $base.* to tecnologico@localhost identified by 'PASSTEC';";
	?>
</body>
</html>