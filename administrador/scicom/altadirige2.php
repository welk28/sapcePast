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
	$idoficina=strtoupper($_GET[idoficina]);
	$status=$_GET[status];
	
    $mysql="select * from dirige where  idoc='$idoc' and status='0'  and fecha='$fecha';";
	$my=mysql_query($mysql,$conexion);
	$n=mysql_num_rows($my);
	$m=mysql_fetch_object($my);
	if($n>=2)
	{
	
	 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altadirige.php';
           </script>	                    
		              ";
	
					  
					  }	
					else{
$accesorio="select * from dirige where idoficina='$idoficina' and status='0' and fecha='$fecha';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);

if ($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
  print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altadirige.php';
           </script>	                    
		              ";



 }  
					
					
					
					
else{	
$accesorio="select * from dirige where idoc='$idoc' and idoficina='$idoficina' and fecha='$fecha';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);
$f=mysql_fetch_object($acc);

if ($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
  print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altadirige.php';
           </script>	                    
		              ";



 }
 
else
{
$alta="insert dirige values('$idoficina','$idoc','$fecha','$status','');";
$alt=mysql_query($alta,$conexion);
if(!$alt)
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
           window.location.href='dirige.php'; 
           </script>
	                     ";
	 }
  }
 }
}
?>
		
	</div>
</body>
</html>