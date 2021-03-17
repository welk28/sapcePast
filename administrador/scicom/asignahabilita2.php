<?php  session_start();  ?>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
	<?php
	include"../../conexion.php";
	$conexion=conectar();
    $fecha=strtoupper($_POST[fecha]);
	$clave=strtoupper($_POST[clave]);
	$idequipo=strtoupper($_POST[idequipo]);
	$fechafin=="";
	$status=0;
	/*echo"
	$fecha
	$clave
	$idequipo
	$fechafin
	";*/
?>
	<section>
	<?php
	$desabilitar="update asigna set status='$status', fechafin='$fechafin' where fecha='$fecha' &&  clave='$clave' && idequipo='$idequipo'; ";
	$desa=mysql_query($desabilitar,$conexion);
	if(!$desa)
	{
	echo" ERROR  AL  DESABILITAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('HABILITADO');
           window.location.href='asigna.php';
           </script>	                    
		              ";
	
	
	}
	?>
	</div>
</body>
</html>