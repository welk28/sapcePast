<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: GUARDAR ODTM</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA GUARDAR ODTM")

if (pregunta==true)
{
document.guardarodtm.submit();
		/*alert('DESABILITADO');*/
		/* window.location.href='encargadesabilita.php';*/   
}
else
{

		document.location.href='odtm.php';
}


}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
	$folio=strtoupper($_GET[folio]);
	$numcontrol=strtoupper($_GET[numcontrol]);
		 
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Guardar Orden de Trabajo de Mantenimiento:</div>
			</header>
			<article id="form">
			<div align="center">
			<form action="guardarodtmadmin2.php" id="guardarodtm" name="guardarodtm" method="post">
	<table width="252" border="1" align="center">
  <tr>
    <td width="74">FOLIO</td>
    <td width="162"><label>
	 <input type="hidden" name="folio" id="folio" value="<?php  echo "$folio";?>">
      <input type="text"  value="<?php  echo "$folio";?>" disabled="disabled">
    </label></td>
  </tr>
  <tr>
    <td>N.CONTROL</td>
    <td><label>
	<input type="hidden" name="numcontrol" id="numcontrol" value="<?php  echo"$numcontrol";?>">
      <input type="text"  value="<?php  echo"$numcontrol";?>" disabled="disabled">
    </label></td>
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