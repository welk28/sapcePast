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
	$base="auditoria"; 
	echo"
	drop database if exists $base; <br>
	create database $base; <br>
	use $base; <br>

	--PARTE 1 <BR>
	";
	include "administrador.php";
	include "control.php";	
	include "alumnos.php";
	include "periodo.php";
	include "servicio.php";
	?>
</body>
</html>