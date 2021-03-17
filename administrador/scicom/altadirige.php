<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: ASIGNACION DE  OFICINA</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.altadirige.idoc.value!=="")&&(document.altadirige.idoficina.value!==0))
{
 document.altadirige.alta.disabled="";

}
else {
 document.altadirige.alta.disabled="disabled";
 }
}

</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altadirige.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='dirige.php';  */ /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='altadirige.php';
}


}

</script>

</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
		$idoc=$_GET[idoc];
		$consulta="select * from docente where idoc='$idoc';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Asignacion  De  Oficina  a Docente:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="altadirige" id="altadirige"action="altadirige2.php" method="get">
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
	    <?php echo"<a href='buscadocentedirige.php?idoc=$idoc'><img src='../imgsicom/buscar20x20.png' class='icono'></a>";?>
    </label></td>
  </tr>
  <tr>
    <td>OFICINA</td>
    <td><label>
	 <?php
     echo"<select name='idoficina'  id='idoficina' onchange='habilitar()'>";
     $combo=" select * from oficina where idoficina='$idoficina'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='0' selected>seleccione </option>";
     $combo1="select * from oficina";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->idoficina'> $com1->nombre </option>";

      } 
    
     echo "</select>";
    ?>
    </label></td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><label>
      <select name="status" id="status" disabled="disabled">
        <option value="0">habilitado</option>
      </select>
    </label></td>
  </tr>
    <td colspan="2"><div align="center">
      <input type="button" name="alta" value="ACEPTAR" id="alta" disabled="disabled" onClick="confirmacion()">
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