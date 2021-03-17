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
include "../conexion.php";
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

<script language="JavaScript" type="text/javascript">
	function validar()
	{
		var usuario = document.inicia.user.value;
		
		if(usuario != "")
		{
			document.inicia.enviar.disabled = "";
		}
		else
		{
			document.inicia.enviar.disabled = "disabled";
		}
	}
</script>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../cabeza.php";	?>
	</header>
	
	
	<section id="seccion" >
    	<div id="registros"  >
        <?php 
		    
      echo" <form name='inicia' id='inicia' method='post' action='autenticacion.php'>
		    <table width='960' border='1'>
              <tr>
                <th colspan='2' scope='col' class='titulotabla'>VERIFIQUE SU SEMESTRE Y DATOS DE REINSCRIPCION </th>
              </tr>
             <input type='hidden' value='alumno' name='tipo'>
               
                 <tr>
                <th scope='row'><div align='right'>No Control</div></th>
                <td><label>
                  <input name='user' type='text' id='usuario' required placeholder='No Control'>
                </label></td>
              </tr>
              <tr>
                <td colspan='2' scope='row' align='center'><label>
                  <input name='enviar' type='submit' id='enviar' value='Verificar' >
                </label></td>
              </tr>
            </table>
		</form>
    ";
    ?>
       <br>
        <!--<a href="password/index.php" target="_self"> No recuerdo mi contraseña</a>-->
        </div>
	</section>
	
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
