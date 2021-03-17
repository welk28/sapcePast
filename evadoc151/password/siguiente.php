<?php  session_start();  ?>
<?php   
  include "../../conexion.php";
    $conexion=conectar();
    $matricula=$_POST[matricula];
    $mail=$_POST[mail];
   $sqa="select nom, email, idcar, fecnac, status from alumnos where matricula='$matricula'";
  $sa=mysql_query($sqa,$conexion);
  $a=mysql_fetch_object($sa);

$matricula=$_POST[matricula];
  
  
   $sqa="select email, idcar, status from alumnos where matricula='$matricula'";
  $sa=mysql_query($sqa,$conexion);
  $a=mysql_fetch_object($sa);
 $n=mysql_num_rows($sa);

$direccion="select des from control where id='6';";
$dire=mysql_query($direccion,$conexion);
$di=mysql_fetch_object($dire);
$ip=$di->des;
    ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="http://itiztapalapa2.edu.mx/sapce171/css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
		
		
 if($n>=1)
 {
		?>
	</header>
	
	
	<section id="seccion">
    <div id="registros" >
    <?php
	
$cadenita=substr($a->email,0,6); 
	?>
    <form action="correo.php" method="post" name="buscar">
    <table>
    	<tr>
        	<th>La contraseña se enviará al siguiente correo:</th>
            <td><label>
                  <input name="corr" type="text" id="corr" value="<?php echo"$cadenita *******"; ?>" size="40" readonly>
                </label>
                <label>
                  <input name="mail" type="hidden" id="mail" value="<?php echo"$a->email"; ?>" size="40" readonly>
                  
                </label>
                <label>
                <input name="matricula" type="hidden" id="matricula" value="<?php echo"$matricula"; ?>" size="40" readonly>
                 </label>
            </td>
            <td>Revise su bandeja de correos NO DESEADOS</td>
        </tr>
        <tr>
        	<th colspan="2" scope="row" align="center"><label>
                  <input name="enviar" type="submit" id="enviar" value="enviar" >
                </label></th>
        </tr>
    </table>
    </form>
	</div>
    <?php 
 }
 else
 {
	 print"
		<script languaje='JavaScript'>
		window.alert('El número de control no existe, vuelva a intentarlo');
		window.location.href='../index.php';
		</script>";
	 }
	?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
