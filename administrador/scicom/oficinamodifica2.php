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
	  $idoficina=$_GET[idoficina];
	  $nombre=strtoupper($_GET[nombre]);
	  $iddepto=strtoupper($_GET[iddepto]);
	  
	  $modifica="update oficina set iddepto='$iddepto', nombre='$nombre' where idoficina='$idoficina' ;";
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
           window.location.href='oficina.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>