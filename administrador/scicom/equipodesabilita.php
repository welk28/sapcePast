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
	$idequipo=strtoupper($_GET[idequipo]);
	$fechafin=date("Y-m-d");
	/*echo"
	$fecha
	$idequipo
	$fechafin
	";*/
	
	
	$desabilitar=" update equipo set status='1', fechbaja='$fechafin' where  idequipo='$idequipo'; ";
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
           window.location.href='equipo.php';
           </script>	                    
		              ";
	
	
	}
	
	?>
	</div>
</body>
</html>