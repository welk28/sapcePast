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
	$iddepto=strtoupper($_POST[iddepto]);
	$nombre=strtoupper($_POST[nombre]);
	
	$alta="insert depto values('$iddepto','$nombre');";
$alt=mysql_query($alta,$conexion);
if(!$alt)
{
$accesorio="select * from depto where iddepto='$iddepto' and nombre='$nombre';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);

if ($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO CON OTRO');
           window.location.href='altadepto.php';
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
           window.location.href='departamento.php'; 
           </script>
	                     ";
	 }
	
	
	?>
	</div>
</body>
</html>