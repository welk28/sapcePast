<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: MARCA ALTA 2</title>
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">

</head>
<body>
	<div id="cuerpo">
		<header>
 <?php 
    include "../../conexion.php";
	$conexion=conectar();
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
			</header>
			<article id="registros">
<?php
$idmarca=strtoupper($_POST[idmarca]);
$marca=strtoupper($_POST[marca]);

$consulta="insert marca values('$idmarca','$marca')";
$consulta1=mysql_query($consulta,$conexion);
if (!$consulta1) {
$marc="select * from marca where idmarca='$idmarca';";
$mar=mysql_query($marc,$conexion);
$n=mysql_num_rows($mar);

if ($n>=1) {
 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO CON OTRO');
           window.location.href='marcaalta.php';
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
     

       print" 
           <script languaje='JavaScript'>
            alert('ALTA EXITOSA');
           window.location.href='marca.php';
           </script>
	                     ";
	
						 
  }
?>
 
			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
		<?php  include "../../pie.php";?>
		</footer>
	</div>


</body>
</html>