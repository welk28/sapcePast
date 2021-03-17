<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: DESABILITAR DOCENTE DE  OFICINA</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DESABILITAR")

if (pregunta==true)
{
document.personaldesabilita.submit();
		/*alert('DESABILITADO');*/
		/* window.location.href='encargadesabilita.php';*/   
}
else
{

		document.location.href='personal.php';
}


}
</script>
</head>
<body>
	<div id="cuerpo">
	<header>
	<?php  include "../../usuarios.php";
	$idpersonal=$_GET[idpersonal];
	$nompersonal=$_GET[nompersonal];
	$fechafin=date('Y-m-d');
	/*echo"$fechafin
	$idpersonal
	$nompersonal
	";*/
	?>
	</header>
	<section id="seccion">
		<header id="header">
			<div class="subtitulo">Desabilita Personal:</div>
		</header>
		<article id="form">
			<div align="center">
			<form id="personaldesabilita" name="personaldesabilita" action="personaldesabilita2.php" method="get">
			<table width="235" border="1">
  <tr>
    <td width="83">Idpersonal:</td>
    <td width="197"><label>
      <input type="text"  value="<?php echo"$idpersonal";?>" disabled="disabled">
	   <input type="hidden" name="idpersonal" id="idpersonal" value="<?php echo"$idpersonal"; ?>" >
    </label></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><label>
      <input type="text"  value="<?php echo"$nompersonal"; ?>" disabled="disabled" size="50">
	   <input type="hidden" name="nompersonal" id="nompersonal" value="<?php echo"$nompersonal";?>" >
    </label></td>
  </tr>
  <tr>
    <td>Fecha fin</td>
    <td><label>
      <input type="text" value="<?php echo"$fechafin"; ?>" disabled="disabled">
	   <input type="hidden" name="fechafin" id="fechafin" value="<?php echo"$fechafin"; ?>">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="desabilita" value="Aceptar" onClick="confirmacion()">
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
	<?php  include"../../pie.php";?>
	</footer>
	</div>
</body>
</html>