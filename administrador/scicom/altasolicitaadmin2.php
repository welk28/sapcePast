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
	     
		 $clave=strtoupper($_GET[clave]);
		 $area=strtoupper($_GET[area]);
		 $departamento=strtoupper($_GET[departamento]);
		 $fecha=strtoupper($_GET[fecha]); 
		 $descripcion=strtoupper($_GET[descripcion]);
		 $valor=$_GET[valor];
		 $folio=$_GET[folio];
		
		/*echo"$
	     clave=$clave;
		 area=$area;
		 departamento=$departamento;
		 fecha=$fecha; 
		 descripcion=$descripcion;
		 valor=$valor;
		 folio=$folio;
		 ";*/
    
	$control="update controlmantenimiento set valor='$valor' where idcont='1';";
    $con=mysql_query($control,$conexion);
			 
	$consulta="insert solicita values('$folio','$fecha','$clave','$area','$departamento','$descripcion');";
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
           window.location.href='solicita.php'; 
           </script>
	                     ";
	 }
	
    ?>
	</div>
</body>
</html>