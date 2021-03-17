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
	$fechalt=$_GET[fechalt];
	$descrip=strtoupper($_GET[descrip]);
    $fecha=strtoupper($_GET[fecha]);
	$idacce=strtoupper($_GET[idacce]);
	$idequipo=strtoupper($_GET[idequipo]);
	$fechafin=$fechafin= date("Y-m-d");
	/*echo" fechalt= $fechalt";
	echo"
	$fecha
	$clave
	$idequipo
	$fechafin
	";*/
?>
	<section>
	<?php
	$desabilitar="update tiene set status='1', fechafin='$fechafin' where fecha='$fecha' &&  idacce='$idacce' && idequipo='$idequipo'; ";
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
           window.location.href='agregacomponente.php?idequipo=$idequipo && fechalt=$fechalt && descrip=$descrip';
           </script>	                    
		              ";
	
	
	}
	?>
	</div>
</body>
</html>