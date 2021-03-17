<?php  session_start();  ?>
<html>
<head>
	<title>SAPCE:: SCICOM:: CANCELAR ODTM</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion()
{
if((document.cancelarodtm.trabajo.value!=="")&&(document.cancelarodtm.fechafin.value!==""))
{
var pregunta= confirm("ESTAS SEGURO DE CANCELAR ODTM ")

if (pregunta==true)
{
document.cancelarodtm.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='../../panel.php';
}

}
else{
alert(" ALGUNOS CAMPOS NO PUEDEN QUEDAR  VACIOS");
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
	$fechafin= date("Y-m-d");
	$numero=3;
	
	$consulta="select * from odtm  where folio='$folio' and numcontrol='$numcontrol';";
	$con=mysql_query($consulta,$conexion);
	$c=mysql_fetch_object($con);
	
	$subconsulta="select * from personal where idpersonal='$c->asignado';";
	$sub=mysql_query($subconsulta,$conexion);
	$s=mysql_fetch_object($sub);
	
		 
		?>
	</header>
	<section id="seccion">
		<header id="header">
			<div class="subtitulo">Cancelar Orden De Mantenimiento:</div>
		</header>
		<article id="form">
			<div align="center">
			<form  name="cancelarodtm" id="cancelarodtm" action="cancelarodtm2.php" method="get">
				<table width="660" border="1">
  <tr>
    <td width="303">FOLIO</td>
    <td width="341">
	<input type="text" value="<?php echo"$folio";?>" disabled="disabled">
	<input type="hidden" id="folio" name="folio" value="<?php echo"$folio";?>" >	</td>
  </tr>
  <tr>
  <tr>
    <td width="303">NUMERO DE CONTROL</td>
    <td width="341"> 
	<input type="text" value="<?php echo"$numcontrol";?>"  disabled="disabled">
	<input type="hidden" id="numcontrol" name="numcontrol" value="<?php echo"$numcontrol";?>" >	</td>
  </tr>
  <tr>
    <td>TIPO DE SERVICIO</td>
    <td><label>
    <input type="text" value="<?php echo"$c->tiposervicio";?>" disabled="disabled">
    </label></td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><label>
	  <input type="text" value="<?php echo"CANCELADO"; ?>" disabled="disabled">
	  
    </label></td>
  </tr>
  <tr>
    <td>TIPO DE MANTENIMIENTO</td>
    <td>
	  <label>
	   <input type="text" value="<?php echo"$c->tipomantenimiento";?>" disabled="disabled">
	  </label>	</td>
  </tr>
  <tr>
    <td>ASIGNAR PERSONAL:</td>
    <td>
	<input  type="text" value="<?php echo"$s->nompersonal"; ?>"  disabled="disabled">
		</td>
  </tr>
  <tr>
    <td>*FECHA FIN</td>
    <td>
	  <label>
	 <input name="fechafin" id="fechafin" type="date" value="<?php echo"$fechafin";?>">
	  </label>	</td>
  </tr>
  <tr>
    <td>*TRABAJO REALIZADO:</td>
    <td>
	  <label>
	  <textarea name="trabajo" id="trabajo" cols="40" rows="7" id="trabajo"> <?php echo"CANCELADO";?> </textarea>
	  </label>	</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button"  value="ACEPTAR"  onClick="confirmacion()">
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