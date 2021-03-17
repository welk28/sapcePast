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
	  $idmarca=$_GET[idmarca];
	  $nombre=strtoupper($_GET[nombre]);
	  
	  $modifica="update marca set nombre='$nombre' where idmarca='$idmarca' ;";
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
           window.location.href='marca.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>