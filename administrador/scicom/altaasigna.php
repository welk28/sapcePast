<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: ASIGNACION DE  EQUIPO</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
<script language="JavaScript" type="text/javascript">
function validar()
{
if((document.altaasigna.idoc.value!=="")&&(document.altaasigna.idequipo.value!==""))
{
var pregunta= confirm("ESTA SEGURO DE LA ASIGNACION ")

if (pregunta==true)
{
document.altaasigna.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='altaasigna.php';
}

}
else{
alert(" LOS CAMPOS: EQUIPO Y/O DOCENTE ,NO PUEDEN QUEDAR  VACIOS");
}

}

</script>

</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
		$idoc=$_GET[idoc];
		$idequipo=$_GET[idequipo];
		$area=$_GET[area];
		
		$consulta="select * from docente where idoc='$idoc';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		
		
		$subconsulta="select * from equipo where idequipo='$idequipo';";
		$sub=mysql_query($subconsulta,$conexion);
		$s=mysql_fetch_object($sub);
			
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Asignacion  Equipo  a Docente:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="altaasigna" id="altaasigna"action="altaasigna2.php" method="get">
			<table width="424" border="1" align="center">
  <tr>
    <td width="74">FECHA</td>
    <td width="334"><label>
     <input name="fechax" type="text" id="fechax" value="<?php date; setlocale(LC_TIME, 'spanish'); print strftime("%A,%d de %B de %Y"); ?>" size="30"  disabled="disabled"/>
        <input name="fecha" type="hidden" id="fecha" value="<?php echo date ("Y-m-d"); ?>"  />
    </label></td>
  </tr>
  <tr>
    <td>DOCENTE</td>
    <td><label>
      <input name="nomdoc" type="text"  disabled="disabled" id="nomdoc" value="<?php echo"$c->nomdoc";?>" size="40">
	  <input type="hidden" name="idoc" id="idoc" value="<?php echo"$idoc";?>">
	   <input type="hidden" name="area" id="area" value="<?php echo"$area";?>">
	  
	    <?php echo"<a href='buscadocenteasigna.php?idoc=$idoc && area=$area && idequipo=$idequipo'><img src='../imgsicom/buscar20x20.png' class='icono'></a>";?>
    </label></td>
  </tr>
  <tr>
    <td>EQUIPO</td>
    <td><label>
      <input name="idequipox" type="text"  disabled="disabled" id="idequipox" value="<?php echo"$idequipo";?>" size="40">
	  <input type="hidden" name="idequipo" id="idequipo" value="<?php echo"$idequipo";?>">
	    <?php echo"<a href='buscarequipo.php?idoc=$idoc && area=$area && idequipo=$idequipo'><img src='../imgsicom/buscar20x20.png' class='icono'></a>";?>
    </label></td>
  </tr>
  <tr>
  <tr>
    <td>STATUS</td>
    <td><label>
      <select name="status" id="status" disabled="disabled">
        <option value="0">habilitado</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>OBSERVACION</td>
    <td><label>
	<input name="observacion" id="observacion" type="text">
      
    </label></td>
  </tr>
    <td colspan="2"><div align="center">
      <input type="button" name="alta" value="ACEPTAR" id="alta"  onClick="validar()">
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