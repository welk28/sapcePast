<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: ASIGNACION DE DEPARTAMENTO</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.altaencarga.idoc.value!=="")&&(document.altaencarga.iddepto.value!==0))
{
 document.altaencarga.alta.disabled="";

}
else {
 document.altaencarga.alta.disabled="disabled";
 }
}

</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altaencarga.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='dirige.php';  */ /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='altaencarga.php';
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
				<div class="subtitulo">Asignacion  De  Departamento  a Docente:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="altaencarga" id="altaencarga"action="altaencarga2.php" method="get">
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
	    <?php echo"<a href='buscadocenteencarga.php?idoc=$idoc'><img src='../imgsicom/buscar20x20.png' class='icono'></a>";?>
    </label></td>
  </tr>
  <tr>
    <td>DEPARTAMENTO</td>
    <td><label>
	 <?php
     echo"<select name='iddepto'  id='iddepto' onchange='habilitar()'>";
     $combo=" select * from depto where iddepto='$iddepto'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='0' selected>seleccione </option>";
     $combo1="select * from depto";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->iddepto'> $com1->nombre </option>";

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