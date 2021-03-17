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
	$iddepto=strtoupper($_GET[idoficina]);
	$fechafin=strtoupper($_GET[fechafin]);
	
	
	$desabilitar="update encarga set status='1', fechafin='$fechafin' where fecha='$fecha' &&  idoc='$idoc' && iddepto='$iddepto';";
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
           window.location.href='encarga.php';
           </script>	                    
		              ";
	
	
	}
	
	 
	?>
	</div>
</body>
</html>