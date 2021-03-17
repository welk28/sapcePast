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
	
	$clave=$_GET['clave'];
	$idequipo=$_GET['idequipo'];
	$fecha=$_GET['fecha'];
	$fechax=$_GET['fechax'];
	$fechafin=$_GET['fechafin'];
	$status=$_GET['status'];
	$observacion=strtoupper($_GET[observacion]);
	




 $modifica="update asigna set  fecha='$fecha', status='$status', fechafin='$fechafin', observacion='$observacion' where clave='$clave' and idequipo='$idequipo' and fecha='$fechax';";
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
           window.location.href='asigna.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>