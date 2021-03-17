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
	$clave=strtoupper($_POST[clave]);
    $folio=strtoupper($_POST[folio]);
	$numcontrol=strtoupper($_POST[numcontrol]);
	
	
	
?>
	<section>
	<?php
	$consulta="update genera set status='2' where folio='$folio' and numcontrol='$numcontrol'; ";
	$con=mysql_query($consulta,$conexion);
	
	$guardar="update odtm set status='2' where folio='$folio'and numcontrol='$numcontrol'; ";
	$gu=mysql_query($guardar,$conexion);
	if(!$gu)
	{
	echo" ERROR  AL  GUARDAR";
	exit();
	}
	else {
	
	 print"
           <script languaje='JavaScript'>
            alert('GUARDAR ODTM');
           window.location.href='generadocente.php?clave=$clave';
           </script>	                    
		              ";
	
	
	}
	?>
	</div>
</body>
</html>