<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: EQUIPO ALTA:</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.equipoalta.idequipo.value=="") && (document.equipoalta.descrip.value==""))
{
  document.equipoalta.agregar.disabled="disabled";
}
else
{
 document.equipoalta.agregar.disabled="";
}
}
</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.equipoalta.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='equipoalta.php';
}
}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; ?>
		
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo"> Alta de Equipo de Computo</div>
			</header>
			<article id="form">
				<div align="center">
				<form  name="equipoalta" id="equipoalta" action="equipoalta2.php" method="post" enctype="multipart/form-data">
				<table width="427" border="1">
  <tr>
    <td width="130">*ID EQUIPO </td>
    <td width="173"><label>
       <input name="idequipo" type="text" id="idequipo" size="15" onKeyDown="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td>RECU.MAT</td>
    <td><label>
      <input name="recumat" id="recumat" type="text" size="15">
    </label></td>
  </tr>
  <tr>
    <td>*DESCRIPCION</td>
    <td><label>
      <textarea name="descrip"  id="descrip" cols="40" rows="6" onKeyDown="habilitar()"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>FECHA ALTA </td>
    <td><label>
      <input name="fechaltx"type="text"  id="fechaltx"  value="<?php date; setlocale(LC_TIME, 'spanish'); print strftime("%A,%d de %B de %Y"); ?>" size="30" disabled="disabled">
	  <input name="fechalt"  id="idequipo"type="hidden" size="15" value="<?php echo date ("Y-m-d"); ?>">
    </label></td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><select name="status" id="status">
	  <option value="0">habilitado</option>
	  <option value="1">desabilitado</option>
	  
    </select></td>
  </tr>
  <tr>
    <td>FECHA BAJA </td>
    <td><label>
      <input type="date" name="fechbaja" id="fechbaja">
    </label></td>
  </tr>
  <tr>
    <td>*IMAGEN </td>
    <td><label>
      <input type="file" name="imagen" id="imagen">
    </label></td>
  </tr>
  <tr>
    <td>OBSERVACIONES</td>
    <td><label>
      <textarea name="obser"  id="obser" cols="40" rows="5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="agregar" id="agregar" value="AGREGAR" disabled="disabled" onClick="confirmacion()">
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