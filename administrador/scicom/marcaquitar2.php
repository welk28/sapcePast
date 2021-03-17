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
$idmarca=strtoupper($_POST[idmarca]);
echo"$idmarca";

$consulta="delete from marca where idmarca='$idmarca';";
$con=mysql_query($consulta,$conexion);
if(!$con){
echo"ERROR AL  BORRAR REGISTRO";
exit();
}
else{
print"
 
 
           <script languaje='JavaScript'>
            alert('REGISTRO BORRADO');
           window.location.href='marca.php';
           </script>	                    
		              ";


}
	?>
	</div>
</body>
</html>