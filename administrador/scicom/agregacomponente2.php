<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div>
	<?php 
	 include"../../conexion.php";
	 $conexion=conectar();
	     $idequipo=$_GET[idequipo];
		 $descrip=$_GET[descrip];
		 $fechalt=$_GET[fechalt];
		 $idacce=$_GET[idacce];
		 $status=$_GET[status];
		 $fecha=$_GET[fecha];
		 $observacion=$_GET[observacion];
		 
		/* echo"
		 idequipo:$idequipo,
		 descrip:$descrip,
		 fechalt:$fechalt,
		 idacce:$idacce,
		 observacion:$observacion
		 ";*/
		 
	$consulta="insert tiene values('$idequipo','$idacce','$descrip','$status','$fecha','$observacion','');";
	$con=mysql_query($consulta,$conexion);
	if(!$con)
	{
	 
	  echo"ERROR AL DAR DE ALTA";
	  exit();
	 }
	
	else{
	
	$subconsulta="select * from accesorio where idacce='$idacce';";
	$sub=mysql_query($subconsulta,$conexion);
	$b=mysql_fetch_object($sub);
	$n=1;
	$resta=$b->exist-$n;
	
	$modi="update accesorio set exist='$resta' where idacce='$idacce';";
	 $mo=mysql_query($modi,$conexion);
	 if(!$mo)
	 {
	 echo"ERROR EN LA  CONSULTA";
	 } 
	  else 
	  {
	print"
           <script languaje='JavaScript'>
            alert('ALTA EXITOSA');
           window.location.href='agregacomponente.php?idequipo=$idequipo && descrip=$descrip && fechalt=$fechalt';
           </script>	                    
		              ";
					  }
	}
    ?>
	</div>
</body>
</html>