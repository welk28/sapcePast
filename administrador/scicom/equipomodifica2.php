<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpo">
	<?php 
	include "../../conexion.php";
	$conexion=conectar();
	$idequipo=strtoupper($_POST[idequipo]);
	$recumat=strtoupper($_POST[recumat]);
	$descrip=strtoupper($_POST[descrip]);
	$fechalt=strtoupper($_POST[fechalt]);
	$status=strtoupper($_POST[status]);
	$fechbaja=strtoupper($_POST[fechbaja]);
	$obser=strtoupper($_POST[obser]);
	$imagen=$_POST[imagen];
	  /*CODIGO PARA SUBIR  UNA  IMAGEN:*/
	  $ruta="../../img/";
	  $archivo=$_FILES[nuevaimagen][tmp_name];
	  $nombrearchivo=$_FILES[nuevaimagen][name];
	  move_uploaded_file($archivo,$ruta."/".$nombrearchivo);
	  $ruta=$ruta."/".$nombrearchivo;
	  
	/*echo"
	idequipo:$idequipo,
	recumat:$recumat
	descrip:$descrip
	fechalt:$fechalt,
	status:	$status,
    fechbaja:$fechbaja,
	obser:$obser,
	imagen:$imagen,
	archivo(nuevaimagen):$ruta
	<br><br><br>$nombrearchivo
	";*/
	  
	  if($archivo=="" ){	   
   $modifica="update equipo set descrip='$descrip',recumat='$recumat', fechalt='$fechalt', status='$status',fechbaja='$fechbaja', obser='$obser',imagen='$imagen' where idequipo='$idequipo';";
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
           window.location.href='equipo.php';
           </script>	                    
		              ";
	}
   	  
	  
	  
	  }
	  else
	  {
	  $modifica="update equipo set descrip='$descrip',recumat='$recumat', fechalt='$fechalt', status='$status',fechbaja='$fechbaja', obser='$obser',imagen='$ruta' where idequipo='$idequipo';";
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
           window.location.href='equipo.php';
           </script>	                    
		              ";
	}
	  
	  }
	  
	  
	  

	  
	?>
	</div>
</body>
</html>