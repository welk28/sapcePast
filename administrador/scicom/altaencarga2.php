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
	$iddepto=strtoupper($_GET[iddepto]);
	$status=$_GET[status];
	
	$mysql="select * from encarga where idoc='$idoc' and status='0' and fecha='$fecha';";
	$my=mysql_query($mysql,$conexion);
	$r=mysql_fetch_row($my);
	$m=mysql_fetch_object($my);
	if($r>=1)
	{
	
	 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altaencarga.php';
           </script>	                    
		              ";
	
	}
	else{
$accesorio="select * from encarga where iddepto='$iddepto' and status='0' and fecha='$fecha';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);

if ($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
  print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altaencarga.php';
           </script>	                    
		              ";



 }
 
else
{
$accesorio="select * from encarga where iddepto='$iddepto' and idoc='$idoc' and fecha='$fecha';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);

if ($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
  print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO DE NUEVO');
           window.location.href='altaencarga.php';
           </script>	                    
		              ";



 }
 else{
$alta="insert encarga values('$iddepto','$idoc','$fecha','$status','');";
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
           window.location.href='encarga.php'; 
           </script>
	                     ";
	 }

   }
  }
}
?>

	?>
		
	</div>
</body>
</html>