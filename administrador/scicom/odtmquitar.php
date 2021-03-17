<?php  session_start();  ?>
<!DOCTYEPE html>
<head>
	<title>SAPCE:: SCICOM:: QUITAR ODTM</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function validar()
{
	var confirma=confirm("�ESTA SEGURO DE QUITAR ODTM?");
	if(confirma==true)
	{
		document.odtmquitar.submit();
	}
	else
	{
		document.location.href='../../panel.php';
	}
}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";
		$folio=$_GET[folio];
		$numcontrol=$_GET[numcontrol];
		
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Quitar Orden de Trabajo de Mantenimiento:</div>
			</header>
			<div align="center">
			<article id="form">
		<form name="odtmquitar" id="odtmquitar" action="odtmquitar2.php" method="get">
		<table width="280" border="1">
  <tr>
    <td width="94">FOLIO:</td>
    <td width="170"><label>
      <input type="text" name="textfield" value="<?php echo"$folio";?>" disabled="disabled" />
	     <input type="hidden" name="folio" id="folio" value="<?php echo"$folio";?>" />
    </label></td>
  </tr>
  <tr>
    <td>N.CONTROL:</td>
    <td><label>
      <input type="text" name="textfield2" value="<?php echo"$numcontrol";?>" disabled="disabled" />
	   <input type="hidden" name="numcontrol" id="numcontrol" value="<?php echo"$numcontrol";?>" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="Submit" value="QUITAR" onClick="validar()" />
    </div>
      <label></label></td>
    </tr>
</table>

		</form>		
			</article>
			</div>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
			<?php include "../../pie.php";?>
		</footer>
	</div>
</body>
</html>