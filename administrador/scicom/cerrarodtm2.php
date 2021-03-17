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
    $folio=strtoupper($_GET[folio]);
	$numcontrol=strtoupper($_GET[numcontrol]);
	$fechafin=$_GET[fechafin];
	$trabajo=strtoupper($_GET[trabajo]);
	/*echo"$folio
	$numcontrol
	$fechafin
	$trabajo";*/
	
    $consulta="update genera set status='3', fechafin='$fechafin' where folio='$folio' and numcontrol='$numcontrol' ;";
	$con=mysql_query($consulta,$conexion);
	
 $modifica="update odtm set status='3', fechafin='$fechafin', trabajo='$trabajo' where folio='$folio' and numcontrol='$numcontrol' ;";
	$mod=mysql_query($modifica,$conexion);
	if(!$mod)
	{
	echo" ERROR  AL  MODIFICAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('CERRADO ODTM');
           window.location.href='odtm3.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>