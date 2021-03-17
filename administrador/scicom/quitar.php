<?php  session_start();  ?>
<!DOCTYEPE html>
<head>
	<title>SAPCE:: SCICOM:: QUITAR COMPONENTE</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function validar()
{
	var confirma=confirm("¿ESTA SEGURO DE QUITAR EL COMPONENTE SELECCIONADO?");
	if(confirma==true)
	{
		document.quitar.submit();
	}
	else
	{ 
		document.location.href='equipo.php';
	}
}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";
		$idequipo=strtoupper($_GET[idequipo]);
		$idacce=strtoupper($_GET[idacce]);
		$descrip=strtoupper($_GET[descrip]);
		$fechalt=$_GET[fechalt];
		
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Quitar Componente:</div>
			</header>
			<div align="center">
			<article id="form">
				
				<form  name="quitar" id="quitar"action="quitar2.php" method="post">
				<table width="476" border="1">
  <tr>
    <td width="107">IDEQUIPO</td>
    <td width="353"><label>
      <input name="idequipox" type="text" disabled="disabled" id="idequipox" value="<?php echo"$idequipo";?>" size="25">
	   <input type="hidden" name="idequipo" id="idequipo" value="<?php echo"$idequipo";?>">
	   <input type="hidden" name="fechalt" id="fechalt" value="<?php echo"$fechalt";?>">
    </label></td>
  </tr>
  <tr>
    <td>IDACCESORIO</td>
    <td><label>
      <input name="idaccex" type="text" disabled="disabled" id="idaccex" value="<?php echo"$idacce";?>" size="25">
	  <input type="hidden" name="idacce" id="idacce" value="<?php echo"$idacce";?>">
    </label></td>
  </tr>
  <tr>
    <td>DESCRIPCION:</td>
    <td><label>
      <input name="descripx" type="text"  disabled="disabled" id="descripx" value="<?php echo"$descrip";?>" size="50">
	   <input type="hidden" name="descrip" id="descrip" value="<?php echo"$descrip";?>" >
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="quitar" value="QUITAR" onClick="validar()">
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