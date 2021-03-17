<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: DESABILITAR  DOCENTE DE EQUIPO ASIGNADO</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DESABILITAR")

if (pregunta==true)
{
document.asignadesabilita.submit();
		/*alert('DESABILITADO');*/
		/* window.location.href='encargadesabilita.php';*/   
}
else
{

		document.location.href='asigna.php';
}


}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
	$fecha=strtoupper($_GET[fecha]);
	$clave=strtoupper($_GET[clave]);
	$idequipo=strtoupper($_GET[idequipo]);
	$fechafin= date("Y-m-d");
		 
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Desabilitar al Docente de su Equipo:</div>
			</header>
			<article id="form">
			<div align="center">
			<form action="asignadesabilita2.php" id="asignadesabilita" name="asignadesabilita" method="post">
	<table width="252" border="1" align="center">
  <tr>
    <td colspan="2"><div align="center">DESABILITA</div></td>
    </tr>
  <tr>
    <td width="74">FECHA</td>
    <td width="162"><label>
	 <input type="hidden" name="fecha" id="fecha" value="<?php  echo "$fecha";?>">
      <input type="text" name="fechax" id="fechax" value="<?php  echo "$fecha";?>" disabled="disabled">
    </label></td>
  </tr>
  <tr>
    <td>CLAVE</td>
    <td><label>
	<input type="hidden" name="clave" id="clave" value="<?php  echo"$clave";?>">
      <input type="text" name="clavex" id="clavex" value="<?php  echo"$clave";?>" disabled="disabled">
    </label></td>
  </tr>
  <tr>
    <td>IDEQUIPO</td>
    <td><label>
	<input type="hidden" name="idequipo" id="idequipo" value="<?php echo"$idequipo";?>">
      <input type="text" name="idequipox" id="idequipox" value="<?php echo"$idequipo";?>" disabled="disabled">
    </label></td>
  </tr>
  <tr>
    <td>FECHA FIN </td>
    <td><label>
      <input type="date" name="fechafinx"  id="fechafinx" value="<?php echo"$fechafin";?>" disabled="disabled">
	  <input type="hidden" name="fechafin"  id="fechafin" value="<?php echo"$fechafin";?>" disabled="disabled">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="ACEPTAR" id="ACEPTAR" value="ACEPTAR" onClick="confirmacion()">
    </div>
      <label></label></td>
    </tr>
</table>
	</form>
			
			</div>
			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
		<?php include"../../pie.php"; ?>
		</footer>
	</div>

</body>
</html>