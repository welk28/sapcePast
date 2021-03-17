<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpos">
	<?php
	 include"../../conexion.php";
	 $conexion=conectar();
	 
	$fecha=strtoupper($_GET[fecha]);
	$idoc=strtoupper($_GET[idoc]);
	$idoficina=strtoupper($_GET[idoficina]);
	$fechafin=strtoupper($_GET[fechafin]);
	
	
	$desabilitar="update dirige set status='1', fechafin='$fechafin' where fecha='$fecha' &&  idoc='$idoc' && idoficina='$idoficina';";
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
           window.location.href='dirige.php';
           </script>	                    
		              ";
	
	
	}
	
	 
	?>
	</div>
</body>
</html>