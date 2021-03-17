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
	$fechafin="0";
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
	$desabilitar="update tiene set status='0', fechafin='$fechafin' where fecha='$fecha' &&  idacce='$idacce' && idequipo='$idequipo'; ";
	$desa=mysql_query($desabilitar,$conexion);
	if(!$desa)
	{
	echo" ERROR  AL  HABILITAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('HABILITADO');
           window.location.href='agregacomponente.php?idequipo=$idequipo && fechalt=$fechalt && descrip=$descrip';
           </script>	                    
		              ";
	
	
	}
	?>
	</div>
</body>
</html>