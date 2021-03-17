<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: ALTA PERSONAL</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.personalalta.idpersonal.value=="")&&(document.personalalta.nompersonal.value==""))
{
 document.personalalta.alta.disabled="disabled";

}
else {
 document.personalalta.alta.disabled="";
 }
}

</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.personalalta.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='dirige.php';  */ /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='personalalta.php';
}


}
</script>
</head>
<body>
<div id="cuerpo">
	<header>
	<?php include"../../usuarios.php";	?>
	
	</header>
	<section id="seccion">
		<header id="header">
			<div class="subtitulo"> Alta de  Personal de Mantenimiento:</div>
		</header>
		<article id="form">
			<div align="center">
			<form id="personalalta" name="personalalta" action="personalalta2.php" method="post">
			<table width="341" height="163" border="1" align="center">
  <tr>
    <td width="117">*IdPersonal </td>
    <td width="200"><label>
      <input type="text" name="idpersonal" id="idpersonal" size="15" onKeyUp="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td>*Nombre:</td>
    <td><label>
      <input type="text" name="nompersonal" id="nompersonal" size="50" onKeyUp="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td>Status:</td>
    <td><label>
      <input type="text" name="status" id="status" value="<?php echo"HABILITADO";?>" disabled="disabled" size="15">
    </label></td>
  </tr>
  <tr>
    <td>Fecha:</td>
    <td><label>
       <input name="fechax" type="text" id="fechax" value="<?php date; setlocale(LC_TIME, 'spanish'); print strftime("%A,%d de %B de %Y"); ?>" size="30"  disabled="disabled"/>
        <input name="fecha" type="hidden" id="fecha" value="<?php echo date ("Y-m-d"); ?>"  />
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="alta" id="alta" value="Aceptar" disabled="disabled" onClick="confirmacion()">
    </div>
      <label></label></td>
    </tr>
</table>

			
			</form>	
			</div>
		</article>
	</section>
	<footer>
	<?php include"../../pie.php"; ?>
	</footer>
</div>
</body>
</html>