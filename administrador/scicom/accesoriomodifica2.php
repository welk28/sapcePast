<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpo">
	<?php
	include "../../conexion.php";
   $conexion=conectar();
   $idacce=strtoupper($_POST[idacce]);
   $descrip=strtoupper($_POST[descrip]);
   $modelo=strtoupper($_POST[modelo]);
   $exist=strtoupper($_POST[exist]);
   $idmarca=strtoupper($_POST[idmarca]);
   $precio=strtoupper($_POST[precio]);
   
   echo"
   idacce:$idacce
   descrip:$descrip
   modelo:$modelo
   exist:$exist
   precio:$precio
   idmarca:$idmarca
   ";
   
   $modifica="update accesorio set descrip='$descrip', modelo='$modelo', exist='$exist', idmarca='$idmarca', precio='$precio' where idacce='$idacce';";
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
           window.location.href='accesorio.php';
           </script>	                    
		              ";
	}
   
	?>
	</div>
</body>
</html>