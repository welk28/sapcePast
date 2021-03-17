<?php  session_start();  ?>
<!DOCTYPE html>	
<head>
	<title>SAPCE:: SCICOM:: GENERAR SOLICITUD</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
	<script language="JavaScript" type="text/javascript">
	function habilitar()
{
if((document.altasolicita.departamento.value!==0)&&(document.altasolicita.area.value!==0)&&(document.altasolicita.descripcion.value!==""))
{
 document.altasolicita.alta.disabled="";

}
else {
 document.altasolicita.alta.disabled="disabled";
 }
}

</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altasolicita.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='dirige.php';  */ /*IGNORA ESTA ALERTA*/
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
		<?php include"../../usuarios.php"; 
		$clave=strtoupper($_GET[clave]);
		$consulta="select * from docente where idoc='$clave';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		
		$subconsulta="select * from  controlmantenimiento where idcont='1'";
		$sub=mysql_query($subconsulta,$conexion);
        $n=mysql_fetch_object($sub);
        $fol=$n->valor + 1;
		$an=date(Y);
		$a="F";
		$def=$an[2].$an[3];
if($fol<10)
{
	$f="000";
}
else
{
	if(($fol>=10) && ($fol<100) )
	{
		$f="000";
	}
	else
	{
		if(($fol>=100) && ($fol<1000) )
		{
			$f="00";
		}
		else
		{
			$f="0";
		}
	}
}
$nfol=$a.$def.$f.$fol;
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Generar Solicitud de Mantenimiento Correctivo</div>
			</header>
			<article id="form">
				<div align="center">
				<form  name="altasolicita" id="altasolicita" action="altasolicitaadmin2.php" method="get">

				<table width="660" border="1">
  <tr>
    <td width="303">FOLIO</td>
    <td width="341">
	<input type="text" value="<?php echo"$nfol";?>" disabled="disabled">
	<input type="hidden" id="valor" name="valor" value="<?php echo"$fol";?>" >
	<input type="hidden" id="folio" name="folio" value="<?php echo"$nfol";?>" >
	</td>
  </tr>
  <tr>
  <tr>
    <td width="303">DOCENTE</td>
    <td width="341"> 
	<input name="nomdoc" type="text"  disabled="disabled" id="nomdoc" value="<?php echo"$c->nomdoc";?>" size="40">
	  <input type="hidden" name="clave" id="clave" value="<?php echo"$clave";?>">
	    <?php echo"<a href='buscadocentesolicita.php?clave=$clave'><img src='../imgsicom/buscar20x20.png' class='icono'></a>";?>
	</td>
  </tr>
  <tr>
    <td>�DEPARTAMENTO AQUIEN LO DIRIGE?</td>
    <td><label>
      <?php
     echo"<select name='departamento' id='departamento' onchange='habilitar()'>";
     $combo=" select * from areas where idarea='$idarea'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='0' selected>seleccione </option>";
     $combo1="select * from areas";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->idarea'> $com1->nombrearea </option>";

      } 
    
     echo "</select>";
    ?>
    </label></td>
  </tr>
  <tr>
    <td>�AREA A LA QUE PERTENECE? </td>
    <td>
	 <?php
     echo"<select name='area'  id='area' onchange='habilitar()'>";
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
	</td>
  </tr>
  <tr>
    <td>FECHA SOLICITUD</td>
    <td>
	<input name="fechax" type="text" id="fechax" value="<?php date; setlocale(LC_TIME, 'spanish'); print strftime("%A,%d de %B de %Y"); ?>" size="30"  disabled="disabled"/>
        <input name="fecha" type="hidden" id="fecha" value="<?php echo date ("Y-m-d"); ?>"  />
	</td>
  </tr>
  <tr>
    <td>DESCRIPCION DE LA SOLICITUD O FALLA A REPARAR: </td>
    <td>
	<textarea cols="40" rows="7" id="descripcion" name="descripcion" onKeyUp="habilitar()"></textarea>
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