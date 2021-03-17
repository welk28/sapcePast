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
    $nompersonal=$_GET[nompersonal];
	$fechafin=$_GET[fechafin];
	
	/*echo"
	$idpersonal
	$nompersonal
	$fechafin
	";*/
	$desabilitar="update personal set status='1',fechafin='$fechafin'where idpersonal='$idpersonal';";
	$desa=mysql_query($desabilitar,$conexion);
	if(!$desa)
	{
	echo" ERROR  AL  DESABILITAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('DESABILITADO');
           window.location.href='personal.php';
           </script>	                    
		              ";
	
	
	}
	
	 
	
	?>
	</div>
</body>
</html>