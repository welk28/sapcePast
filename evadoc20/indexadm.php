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
		var clave = document.inicia.clave.value;
		
		if((usuario != "") && (clave!= "") )
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
          echo" <form name='inicia' id='inicia' method='post' action='autenticadmin.php'>";
       

		  echo"<table width='960' border='1'>
              <tr>
                <th colspan='2' scope='col' class='titulotabla'>COMPLETE LOS SIGUIENTES CAMPOS PARA INICIAR SESION. </th>
              </tr>

                
                <tr>
                <th scope='row'><div align='right'> Usuario:</div></th>
                <td><label>
                  <input name='user' type='text' onKeyUp='validar()'>
                </label></td>
              </tr>
                <tr>
                <th scope='row'> <div align='right'>Contraseña: </div></th>
                <td><label>
                  <input name='clave' type='password' id='clave' onKeyUp='validar()'>
                </label></td>
                </tr>";
              
              echo"<tr>
                <td colspan='2' scope='row' align='center'><label>
                  <input name='enviar' type='submit' id='enviar' value='enviar' disabled='disabled'>
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
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
