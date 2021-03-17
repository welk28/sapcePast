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
	$idpersonal=$_GET[idpersonal];
	$fechainicio=$_GET[fechainicio];
	$fechafin=$_GET[fechafin];
	$status=$_GET[status];
	
	/*echo"
	$idpersonal
	$fechainicio
	$status
	$fechafin
	";
	*/
	
	$modifica="update personal set  fechainicio='$fechainicio', status='$status', fechafin='$fechafin' where idpersonal='$idpersonal' ;";
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
           window.location.href='personal.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>