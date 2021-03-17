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
	     $ncontrol=$_GET[ncontrol];
		 $valor=$_GET[valor];
		 $folio=$_GET[folio];
		 $fecha=$_GET[fecha];
		 $tiposervicio=$_GET[tiposervicio];
		 $newstatus=$_GET[newstatus];
		 $status=1;
		 $tipomantenimiento=$_GET[tipomantenimiento];
		 $asignado=$_GET[asignado];
		
		/*echo"$ncontrol=ncontrol,
		 $valor=valor,
		 $folio=folio,
		 $fecha=fecha,
		 $tiposervicio=tiposervicio,
		 $status=status,
		 $newstatus=newstatus,
		 $tipomantenimiento=tipomantenimiento,
		 $asignado=asignado";*/
		
    if($newstatus=='ABIERTO'){
	$control="update controlmantenimiento set valor='$valor' where idcont='2';";
    $con=mysql_query($control,$conexion);
	
	$genera="insert genera values('$folio','$ncontrol','$fecha','$status','','$asignado');";
	$ge=mysql_query($genera,$conexion);
			 
	$consulta="insert odtm values('$ncontrol','$folio','$fecha','$tiposervicio','$tipomantenimiento','','$status','','$asignado');";
	$con=mysql_query($consulta,$conexion);
	if(!$con)
	{

echo "ERROR AL  DAR DE ALTA";
exit();
 
 

}
else
{	
     /* RESPETA  ESTA ALERTA*/
    print" 
           <script languaje='JavaScript'>
            alert('ALTA EXITOSA');
           window.location.href='odtm.php'; 
           </script>
	                     ";
	 }
	
	}
	else{
	 if($newstatus=='CANCELAR'){
	 $control="update controlmantenimiento set valor='$valor' where idcont='2';";
    $con=mysql_query($control,$conexion);
	
	$genera="insert genera values('$folio','$ncontrol','$fecha','$status','','$asignado');";
	$ge=mysql_query($genera,$conexion);
			 
	$consulta="insert odtm values('$ncontrol','$folio','$fecha','$tiposervicio','$tipomantenimiento','','$status','','$asignado');";
	$con=mysql_query($consulta,$conexion);
	if(!$con)
	{

echo "ERROR AL  DAR DE ALTA";
exit();
 
 

}
else
{	
     /* RESPETA  ESTA ALERTA*/
    print" 
           <script languaje='JavaScript'>
            alert('CANCELACION');
           window.location.href='cancelarodtm.php?folio=$folio&&numcontrol=$ncontrol'; 
           </script>
	                     ";
	 }
	 
	 
	 
	 }
	}
    ?>
	</div>
</body>
</html>