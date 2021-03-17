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
	  $iddepto=strtoupper($_GET[iddepto]);
	   $nombre=strtoupper($_GET[nombre]);
	  
	  
	$modifica="update depto  set nombre='$nombre' where iddepto='$iddepto' ;";
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
           window.location.href='departamento.php';
           </script>	                    
		              ";
	}
	?>
		
	</div>
</body>
</html>