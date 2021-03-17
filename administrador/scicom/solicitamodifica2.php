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
	
	$folio=$_POST[folio];
	$clave=strtoupper($_POST[clave]);
	$fecha=$_POST[fecha];
	$departamento=strtoupper($_POST[departamento]);
	$area=strtoupper($_POST[area]);
	$descripcion=strtoupper($_POST[descripcion]);



 $modifica="update solicita  set  fecha='$fecha',departamento='$departamento',area='$area',descripcion='$descripcion' where folio='$folio' and clave='$clave' ;";
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
           window.location.href='solicita.php';
           </script>	                    
		              ";
	}
	?>
	</div>
</body>
</html>