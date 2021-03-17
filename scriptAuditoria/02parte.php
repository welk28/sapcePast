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
	use $base; <br>

	--PARTE 2 <BR>
	";
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
	?>
</body>
</html>