<?php
session_start();
$usuario=$_SESSION['usuario'];
$tipo=$_GET[tipo];
$user=$_GET[user];
//echo"$usuario";
//echo"tipo $tipo user $user";
if($usuario)
{
	print"
		<script language='JavaScript'>
			window.location='panel.php';
		</script>";
}
include "conexion.php";
$conexion=conectar();
$direccion="select des from control where id='6';";
$dire=mysql_query($direccion,$conexion);
$di=mysql_fetch_object($dire);
$ip=$di->des;
if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "chrome") == false)
    {
      print"
      <script>
        window.alert('¡¡Éste sistema funciona mejor con  GOOGLE CHROME!!');
      </script>
      ";
      $bandera++;
    } 
?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">



<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="css/proweb.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "cabeza.php";	?>
	</header>
	
	
	<section id="seccion" >
    	<div id="registros"  >
        <?php 
		   

		  echo"<table width='960' border='1'>
              <tr>
                <th  scope='col' class='titulotabla'>LA CAPTURA ESTARÁ ABIERTA A PARTIR DE 14 DE DICIEMBRE 2016 </th>
              </tr>
              

            
            
              
            </table>
		</form>
    ";
    ?>
      
	</section>
	
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
