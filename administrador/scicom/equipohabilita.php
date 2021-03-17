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
	$fecha=date("Y-m-d");
	$idequipo=strtoupper($_GET[idequipo]);
	$fechafin=strtoupper($_GET[fechafin]);
	/*echo"
	$fecha
	$idequipo
	$fechafin
	";*/
	
	
	$habilita=" update equipo set status='0', fechbaja='$fechafin',fechalt='$fecha' where  idequipo='$idequipo'; ";
	$habi=mysql_query($habilita,$conexion);
	if(!$habi)
	{
	echo" ERROR  AL  HABILITAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('HABILITADO');
           window.location.href='equipo.php';
           </script>	                    
		              ";
	
	
	}
	
	?>
	</div>
</body>
</html>