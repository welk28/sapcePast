<?php  session_start();  ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>SAPCE:: SCICOM::DOCENTE POR DEPARTAMENTO</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
	<script language="JavaScript" type="text/javascript">
function validar()
{
  if (document.form1.clave.value!="" )
     document.form1.submit();
  else
  {
     if(document.form1.clave.value=="")
        window.alert("DEBE COLOCAR LA CLAVE DEL DOCENTE");									
  }
	 
}
</script>
<script language="JavaScript" type="text/javascript">
function validar2(){
 if(document.form2.area.value==0)
 {
    window.alert("DEBE COLOCAR  EL  AREA  POR DEPARTAMENTO DEL DOCENTE");	
 }
  else {
   document.form2.submit();
  }
}
</script>
<script language="JavaScript" type="text/javascript">
function validar3(){
 if(document.form3.area.value==0)
 {
    window.alert("DEBE COLOCAR  EL  AREA  POR OFICINA DEL DOCENTE");	
 }
  else{
   document.form3.submit();
  }
}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";
		$fecha= date ("Y-m-d");
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Lista de Asignacion de Equipos:</div>
			</header>
			<article id="form">		
      <form name="form1" method="post" action="asigna.php">
        <table border="0" align="center">
          <th>
            <th>clave:</th>
            <th><label><input name="clave" type="text" id="clave" size="11" maxlength="10"></label>
			</th>
            <th>
              <label><input name='Buscar'  onClick='validar()' type='button' id='Buscar' value='Buscar'></label>
			</th>
			<th>Fecha de consulta:</th>
            <th><label><input name="fecha" type="text" id="fecha" size="11" value="<?php echo"$fecha";?>" disabled="disabled" maxlength="10"></label>
			</th>
          </tr>
        </table>
      </form>
	  <form name="form2"  method="post" action="asigna.php">
	<table align="center" border="0">
  <tr>
    <th>Area por Departamento:</th>
    <th><label>
	 <?php
     echo"<select name='area'  id='area' >";
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
	
	
    </label>
	</th>
    <th><label><input type="button" name="Buscar" value="Buscar" onClick="validar2()"  id="Buscar"></label>
	</th>
  </tr>
</table>
</form>
<form name="form3"  method="post" action="asigna.php">
	<table align="center" border="0">
  <tr>
    <th>Area por Oficina:</th>
    <th><label>
	 <?php
     echo"<select name='area'  id='area'>";
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
	 
    </label>
	</th>
    <th><label><input type="button" name="Buscar" value="Buscar" onClick="validar3()"  id="Buscar"></label>
	</th>
  </tr>
</table>
</form>
   </article>
 
			<article id="registros">
	<?php 
	$clave=strtoupper($_POST[clave]); 
	$area=strtoupper($_POST[area]); 
	if($clave)
{

echo"			
<table width='960' border='0'>
  <tr>
    <th width='31'>No</th>
    <th width='31'>IDEQUIPO</th>
    <th width='70'>FECHA DE ASIGNACION:</th>
    <th width='350'>DOCENTE</th>
	<th width='400'>OFI/DEPTO</th>	
    <th width='50'>OBSERVACION</th>
    <th width='60'>STATUS</th>
	<th width='90'>FECHA FIN</th>
	<th width='70'>MODIFICAR</th>
	<th width='70'>DESABILITAR</th>
  </tr>";
  
$asigna="select * from asigna where clave like '%$clave%';";
$asig=mysql_query($asigna,$conexion);
$n=0;
while($a=mysql_fetch_object($asig))
{ $n++;

echo"
  <tr>
    <td align='center'>$n</td>
    <td align='center'>$a->idequipo </td>
    <td align='center'>$a->fecha </td>
    <td>";
		$a->clave; 
	 $depto="select * from docente  where idoc='$a->clave';";
		  $de=mysql_query($depto,$conexion);
		while( $b=mysql_fetch_object($de))
		{	echo"
				$b->nomdoc";
		}		
	echo"</td>
	<td>";
	$a->area;
	
	$consulta="select * from depto where iddepto='$a->area';";
	$con=mysql_query($consulta,$conexion);
	if($con){
	while($c=mysql_fetch_object($con))
	{
	echo"$c->nombre"; 
	}
	}
	
	$consu="select * from oficina where idoficina='$a->area';";
	$cons=mysql_query($consu,$conexion);
	if($cons){
	while($b=mysql_fetch_object($cons))
	{
	echo"$b->nombre"; 
	}
	}
	
	
	echo"</td>
    <td>$a->observacion </td>
     <td align='center'> ";
	if($a->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'>";
	
	}
	else {
	if($a->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
	<td align='center'>$a->fechafin </td>
	<td align='center'><a href='asignamodifica.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
	<td align='center'>";
	
	if($a->status==0){
	
	echo " <a href='asignadesabilita.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'>desabilitar</a> ";
	
	}
	else {
	if($a->status==1){
	
	echo"<a href='asignahabilita.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'>habilitar</a>";
	
	}
	}
	echo"</td>
  </tr>";
  }
  echo"
</table>";
}
else{

if($area){
echo"			
<table width='960' border='0'>
  <tr>
   <th width='31'>No</th>
    <th width='31'>IDEQUIPO</th>
    <th width='70'>FECHA DE ASIGNACION:</th>
    <th width='350'>DOCENTE</th>
	<th width='400'>OFI/DEPTO</th>	
    <th width='50'>OBSERVACION</th>
    <th width='60'>STATUS</th>
	<th width='90'>FECHA FIN</th>
	<th width='70'>MODIFICAR</th>
	<th width='70'>DESABILITAR</th>
  </tr>";
  
$asigna="select * from asigna where area like '%$area%';";
$asig=mysql_query($asigna,$conexion);
$n=0;
while($a=mysql_fetch_object($asig))
{ $n++;

echo"
  <tr>
    <td align='center'>$n</td>
    <td align='center'>$a->idequipo </td>
    <td align='center'>$a->fecha </td>
    <td>";
	$a->clave; 
	 $depto="select * from docente  where idoc='$a->clave';";
		  $de=mysql_query($depto,$conexion);
		while( $b=mysql_fetch_object($de))
		{	echo"
				$b->nomdoc";
		}		
	
	
	
	echo"</td>
	<td>"; 
	$a->area;
	
	$consulta="select * from depto where iddepto='$a->area';";
	$con=mysql_query($consulta,$conexion);
	if($con){
	while($c=mysql_fetch_object($con))
	{
	echo"$c->nombre"; 
	}
	}
	
	$consu="select * from oficina where idoficina='$a->area';";
	$cons=mysql_query($consu,$conexion);
	if($cons){
	while($b=mysql_fetch_object($cons))
	{
	echo"$b->nombre"; 
	}
	}
	
	echo"</td>
    <td>$a->observacion </td>
     <td align='center'> ";
	if($a->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'> ";
	
	}
	else {
	if($a->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
	<td align='center'>$a->fechafin </td>
	<td align='center'><a href='asignamodifica.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
	<td>";
	
	if($a->status==0){
	
	echo " <a href='asignadesabilita.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'>desabilitar</a> ";
	
	}
	else {
	if($a->status==1){
	
	echo"<a href='asignahabilita.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'>habilitar</a>";
	
	}
	}
	 echo"</td>
  </tr>";
  }
  echo"
</table>";
   }

else{
echo"			
<table width='960' border='0'>
  <tr>
    <th width='31'>No</th>
    <th width='31'>IDEQUIPO</th>
    <th width='70'>FECHA DE ASIGNACION:</th>
    <th width='350'>DOCENTE</th>
	<th width='400'>OFI/DEPTO</th>	
    <th width='50'>OBSERVACION</th>
    <th width='60'>STATUS</th>
	<th width='90'>FECHA FIN</th>
	<th width='70'>MODIFICAR</th>
	<th width='70'>DESABILITAR</th>
  </tr>";
  
$asigna="select * from asigna;";
$asig=mysql_query($asigna,$conexion);
$n=0;
while($a=mysql_fetch_object($asig))
{ $n++;

echo"
  <tr>
    <td align='center'>$n</td>
    <td align='center'>$a->idequipo </td>
    <td align='center'>$a->fecha </td>
    <td>";
	$a->clave; 
	$depto="select * from docente  where idoc='$a->clave';";
		  $de=mysql_query($depto,$conexion);
		while( $b=mysql_fetch_object($de))
		{	echo"
				$b->nomdoc";
		}		
	
	 echo"</td>
	<td>";
	$a->area;
	
	$consulta="select * from depto where iddepto='$a->area';";
	$con=mysql_query($consulta,$conexion);
	if($con){
	while($c=mysql_fetch_object($con))
	{
	echo"$c->nombre"; 
	}
	}
	
	$consu="select * from oficina where idoficina='$a->area';";
	$cons=mysql_query($consu,$conexion);
	if($cons){
	while($b=mysql_fetch_object($cons))
	{
	echo"$b->nombre"; 
	}
	}
	
	 echo"</td>
    <td>$a->observacion </td>
     <td align='center'> ";
	if($a->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'> ";
	
	}
	else {
	if($a->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
	<td align='center'>$a->fechafin </td>
	<td align='center'><a href='asignamodifica.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
	<td align='center'>";
	
	if($a->status==0){
	
	echo " <a href='asignadesabilita.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'>desabilitar</a> ";
	
	}
	else {
	if($a->status==1){
	
	echo"<a href='asignahabilita.php?clave=$a->clave&fecha=$a->fecha&idequipo=$a->idequipo' target='_self'>habilitar</a>";
	
	}
	}
	
	
	
	
	
	
	echo"</td>
  </tr>";
  }
  echo"
</table>";
 }
}
?>			
			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
			<?php include "../../pie.php";?>
		</footer>
	</div>
</body>
</html>