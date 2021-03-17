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

	--PARTE 4 <BR>
	";

	include "cursa2.php";
	
//permisos
echo"<br><br>
grant all privileges on $base.* to tecnologico@localhost identified by 'PASSTEC';";
	?>
</body>
</html>