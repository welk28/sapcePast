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
	$fecha=$_GET[fecha];
	$idoc=strtoupper($_GET[idoc]);
	$area=strtoupper($_GET[area]);
	$idequipo=strtoupper($_GET[idequipo]);
	$status=$_GET[status];
	$observacion=strtoupper($_GET[observacion]);
	
	$mysql="select * from asigna where idequipo='$idequipo' and status='0' and fecha='$fecha';";
	$my=mysql_query($mysql,$conexion);
	$r=mysql_fetch_row($my);
	$m=mysql_fetch_object($my);
	if($r>=1)
	{
	
	 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altaasigna.php';
           </script>	                    
		              ";
	
	}
else {	
$alta="insert asigna values('$idequipo','$fecha','$idoc','$area','$observacion','$status','');";
$alt=mysql_query($alta,$conexion);
if(!$alt)
{
$accesorio="select * from asigna where clave='$idoc' and idequipo='$idequipo' and fecha='$fecha';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);
if($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO CON OTRO');
           window.location.href='altaasigna.php';
           </script>	                    
		              ";
 }
 
else
{

echo "ERROR AL  DAR DE ALTA";
exit();
 
 }

}
else
{	
     /* RESPETA  ESTA ALERTA*/
    print" 
           <script languaje='JavaScript'>
            alert('ALTA EXITOSA');
           window.location.href='asigna.php'; 
           </script>
	                     ";
	 }
}
?>

	?>
		
	</div>
</body>
</html>