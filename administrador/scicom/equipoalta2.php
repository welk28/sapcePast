<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
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
	
	/*CODIGO PARA SUBIR  UNA  IMAGEN:*/
	
	  $ruta="../../img/";
	  $archivo=$_FILES[imagen][tmp_name];
	  $nombrearchivo=$_FILES[imagen][name];
	  move_uploaded_file($archivo,$ruta."/".$nombrearchivo);
	  $ruta=$ruta."/".$nombrearchivo;
	
	if($archivo==""){
	print"
           <script languaje='JavaScript'>
            alert('POR FAVOR INSERTE UNA IMAGEN');
           window.location.href='equipoalta.php';
           </script>	                    
		              ";
	}
	else
	{
	
	
	$consulta="insert equipo values('$idequipo','$recumat','$fechalt','$descrip','$status','$fechbaja','$ruta','$obser');";
	$con=mysql_query($consulta,$conexion);
	if(!$con)
	{
	$equipo="select * from equipo where idequipo='$idequipo';";
	$eq=mysql_query($equipo,$conexion);
	$e=mysql_num_rows($eq);
	if($e>=1)
	{
	print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO CON OTRO');
           window.location.href='equipoalta.php';
           </script>	                    
		              ";	
	}
	else{
	echo"ERROR AL DAR DE ALTA";
	exit();
	
	}
	}
	else
	{
	print"
           <script languaje='JavaScript'>
            alert('ALTA DE EQUIPO EXITOSA');
           window.location.href='agregacomponente.php?idequipo=$idequipo && descrip=$descrip && fechalt=$fechalt';
           </script>	                    
		              ";	
	
	}
	}
	?>
	</div>
<footer>
<?php  include"../../pie.php";?>
</footer>
</body>
</html>