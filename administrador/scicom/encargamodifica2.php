<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpo">
	<?php 
	include"../../conexion.php";
	$conexion=conectar();
	
	$idoc=$_GET['idoc'];
	$iddepto=$_GET['iddepto'];
	$fecha=$_GET['fecha'];
	$fechax=$_GET['fechax'];
	$fechafin=$_GET['fechafin'];
	$status=$_GET['status'];




 $modifica="update encarga set  fecha='$fecha', status='$status', fechafin='$fechafin' where idoc='$idoc' and iddepto='$iddepto' and fecha='$fechax' ;";
	$mod=mysql_query($modifica,$conexion);
	if(!$mod)
	{
	echo" ERROR  AL  MODIFICAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('MODIFICACION EXITOSA');
           window.location.href='encarga.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>