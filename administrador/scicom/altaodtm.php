<?php  session_start();  ?>
<!DOCTYPE html>	
<head>
	<title>SAPCE:: SCICOM:: GENERAR ODTM</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
	function habilitar()
{
if((document.altaodtm.asignado.value==0)&&(document.altaodtm.fecha.value=="")&&(document.altaodtm.newstatus.value==0))
{
 document.altaodtm.alta.disabled="disabled";

}
else {
 document.altaodtm.alta.disabled="";
 }
}

</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altaodtm.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='dirige.php';  */ /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='solicita.php';
}


}

</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
		$folio=$_GET[folio];
		$numero=1;
		$subconsulta="select * from  controlmantenimiento where idcont='2'";
		$sub=mysql_query($subconsulta,$conexion);
        $n=mysql_fetch_object($sub);
        $nc=$n->valor + 1;
		$an=date(Y);
		$a="C";
		$def=$an[2].$an[3];
if($nc<10)
{
	$c="000";
}
else
{
	if(($nc>=10) && ($nc<100) )
	{
		$c="000";
	}
	else
	{
		if(($nc>=100) && ($nc<1000) )
		{
			$c="00";
		}
		else
		{
			$c="0";
		}
	}
}
$nnc=$a.$def.$c.$nc;
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Generar Orden de Trabajo de Mantenimiento:</div>
			</header>
			<article id="form">
				<div align="center">
				<form  name="altaodtm" id="altaodtm" action="altaodtm2.php" method="get">
				<table width="660" border="1">
  <tr>
    <td width="303">FOLIO</td>
    <td width="341">
	<input type="text" value="<?php echo"$folio";?>" disabled="disabled">
	<input type="hidden" id="folio" name="folio" value="<?php echo"$folio";?>" >
	</td>
  </tr>
  <tr>
  <tr>
    <td width="303">NUMERO DE CONTROL</td>
    <td width="341"> 
	<input type="text" value="<?php echo"$nnc";?>"  disabled="disabled">
	<input type="hidden" id="valor" name="valor" value="<?php echo"$nc";?>" >
	<input type="hidden" id="ncontrol" name="ncontrol" value="<?php echo"$nnc";?>">
	</td>
  </tr>
  <tr>
    <td width="303">FECHA:</td>
    <td width="341"> 
	<input name="fecha" type="date" id="fecha" value="<?php echo date ("Y-m-d"); ?>"  />
	</td>
  </tr>
  <tr>
    <td>TIPO DE SERVICIO</td>
    <td><label>
    <input type="text" value="<?php echo"MANTENIMIENTO";?>" disabled="disabled">
	 <input name="tiposervicio" id="tiposervicio" type="hidden" value="<?php echo"MANTENIMIENTO";?>">
    </label></td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><label>
    <select name="newstatus" id="newstatus" onChange="habilitar()">
	<option value="0">seleccione..</option>
      <option value="<?php echo"ABIERTO";?>">ABIERTO</option>
      <option value="<?php echo"CANCELAR";?>">CANCELAR</option>
    </select>
	  
    </label></td>
  </tr>
  <tr>
    <td>TIPO DE MANTENIMIENTO</td>
    <td>
	  <label>
	   <input type="text" value="<?php echo"INTERNO";?>" disabled="disabled">
	 <input name="tipomantenimiento" id="tipomantenimiento" type="hidden" value="<?php echo"INTERNO";?>">
	  </label>	</td>
  </tr>
  <tr>
    <td>ASIGNAR PERSONAL:</td>
    <td>
	<?php
     echo"<select name='asignado'  id='asignado' onchange='habilitar()'>";
     $combo=" select * from personal where idpersonal='$idpersonal' and status='0';";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='0' selected>seleccione </option>";
     $combo1="select * from personal where status='0'";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->idpersonal'> $com1->nompersonal </option>";

      } 
    
     echo "</select>";
    ?>
	</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="alta" id="alta" value="ACEPTAR" disabled="disabled" onClick="confirmacion()">
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