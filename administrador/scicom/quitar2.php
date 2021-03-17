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
$idequipo=$_POST[idequipo];
$idacce=$_POST[idacce];
$descrip=$_POST[descrip];
$fechalt=$_POST[fechalt];
/*echo"idequipo: $idequipo <br> idacce: $idacce descrip: $descrip";*/


$consulta="delete from tiene where idequipo='$idequipo' and idacce='$idacce' and fecha='$fechalt';";
$con=mysql_query($consulta,$conexion);
if(!$con)
{
	echo"error al borrar";
	exit();
}
else{
$subconsulta="select * from accesorio where idacce='$idacce';";
	$sub=mysql_query($subconsulta,$conexion);
	$b=mysql_fetch_object($sub);
	$n=1;
	$suma=$b->exist+$n;
	
	$modi="update accesorio set exist='$suma' where idacce='$idacce';";
	 $mo=mysql_query($modi,$conexion);
	 if(!$mo)
	 {
	 echo"ERROR EN LA  CONSULTA";
	 } 
	 else{
 print"
 
 
           <script languaje='JavaScript'>
            alert('REGISTRO BORRADO');
           window.location.href='agregacomponente.php?idequipo=$idequipo&&descrip=$descrip && fechalt=$fechalt';
           </script>	                    
		              ";
}
}
?>
	
	</div>
</body>
</html>