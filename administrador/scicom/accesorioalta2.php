<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: ACCESORIO ALTA 2</title>
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
$idacce=strtoupper($_POST[idacce]);
$descrip=strtoupper($_POST[descrip]);
$modelo=strtoupper($_POST[modelo]);
$exist=strtoupper($_POST[exist]);
$idmarca=strtoupper($_POST[idmarca]);
$precio=strtoupper($_POST[precio]);


$alta="insert accesorio values('$idacce','$descrip','$modelo','$exist','$idmarca','$precio');";
$alt=mysql_query($alta,$conexion);
if(!$alt)
{
$accesorio="select * from accesorio where idacce='$idacce';";
$acc=mysql_query($accesorio,$conexion);
$n=mysql_num_rows($acc);

if ($n>=1) 
{
/*   IDENTIFICA SI EL ID  YA ESTA  REGISTRADO, SI ES VERDADERO  EJECUTA ESTA ALERTA ,
 AUN SI EN LA CONFIRMACION DE ALTA SE LE DE ACEPTAR O CANCELAR */
 print"
           <script languaje='JavaScript'>
            alert('YA ESTA REGISTRADO INTENTELO CON OTRO');
           window.location.href='accesorioalta.php';
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
           window.location.href='accesorio.php'; 
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