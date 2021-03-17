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
$folio=$_GET[folio];
$numcontrol=$_GET[numcontrol];

$otra="select * from controlmantenimiento where idcont='2';";
$ot=mysql_query($otra,$conexion);
$r=mysql_fetch_object($ot);
$n=1;
	$resta=$r->valor-$n;


$control="update control set valor='$resta' where idcont='2';";
$co=mysql_query($control,$conexion);

$subconsulta="delete from genera where folio='$folio' and numcontrol='$numcontrol';";
$sub=mysql_query($subconsulta,$conexion);


$consulta="delete from odtm where folio='$folio' and numcontrol='$numcontrol';";
$con=mysql_query($consulta,$conexion);
if(!$con)
{
	echo"error al borrar";
	exit();
}
	 else{
 print"
 
 
           <script languaje='JavaScript'>
            alert('REGISTRO BORRADO');
           window.location.href='odtm.php';
           </script>	                    
		              ";
}

?>
	
	</div>
</body>
</html>