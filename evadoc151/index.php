<?php
session_start();
$usuario=$_SESSION['usuario'];
//echo"$usuario";
if($usuario)
{
	print"
		<script language='JavaScript'>
			window.location='horalumno.php';
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

    ///echo"direccion: $ip";
?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">

<script language="JavaScript" type="text/javascript">
	function validar()
	{
	
		var usuario = document.inicia.usuario.value;
	
		
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
		<?php 	include "cabeza.php";	?>
	</header>
	
	
	<section id="seccion" >
    	<div id="registros"  >
		<form name="inicia" id="inicia" method="post" action="autenticacion.php">
		  <table width="960" border="1">
              <tr>
                <th colspan="2" scope="col" class="titulotabla">COMPLETE LOS SIGUIENTES CAMPOS PARA INICIAR SESION. </th>
              </tr>
              <tr>
                <th width="451" scope="row"><div align="right">Tipo:</div></th>
                <td width="513"><label>
            <select name="tipo" size="1" id="tipo" >
                        
              <option value="alumno" >Alumno</option>
              
            </select>
          </label></td>
              </tr>
              <tr>
                <th scope="row"><div align="right"><!--No Control--> No control:</div></th>
                <td><label>
                  <input name="usuario" type="text" id="usuario" >
                </label></td>
              </tr>
              <tr>
                <th scope="row"><div align="right">Fecha/Nacimiento (dd-mm-aaaa):<!--CURP:--></div></th>
                <td><label>
                  <input name="clave" type="date" id="clave" >
                </label></td>
              </tr>
              <tr>
                <td colspan="2" scope="row" align="center"><label>
                  <input name="enviar" type="submit" id="enviar" value="enviar" >
                </label></td>
              </tr>
            </table>
		</form>
       <br>
        <!--<a href="password/index.php" target="_self"> No recuerdo mi contraseña/curp</a>
        </div>
	</section>
	
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
