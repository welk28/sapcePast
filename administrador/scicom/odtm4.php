<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: ODTM</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">

</head>
<body>
	<div id="cuerpo">
		<header>
 <?php 
    include "../../usuarios.php";
	$conexion=conectar();
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
		<div class="subtitulo">	Lista de Ordenes de Trabajo de Mantenimiento Canceladas: </div>
			</header>
			<article id="registros">
			<table width="960" border="0">
    <tr>
      <th>No</th>
      <th>FOLIO</th>
	  <th>N.CONTROL</th>
	  <th>FECHA ASIGNADA</th>
	  <th>SERVICIO</th>
	  <th>MANTENIMIENTO</th>
	  <th>TRABAJO</th>
      <th>STATUS</th>
	  <th>FECHA FIN</th>
	  <th>ASIGNADO</th>
	  <th>CERRAR</th>
	  <th>GUARDAR</th>
	  <th>QUITAR</th>
	  <th>IMPRIMIR</th>
	  <th>CANCELAR</th>
    </tr>
	<?php
	$odtm="select * from odtm where status='4';";
    $od=mysql_query($odtm,$conexion);
	$n=0;
	while ($o=mysql_fetch_object($od)) 
	{ $n++;
	echo"
    <tr>
      <td align='center'>$n</td>
      <td align='center'>$o->folio</td>
      <td align='center'>$o->numcontrol</td>
	  <td align='center'>$o->fecha</td>
	  <td align='center'>$o->tiposervicio</td>
	  <td align='center'>$o->tipomantenimiento</td>
	  <td>$o->trabajo</td>
	  <td align='center'>";
	  $o->status;
	  if($o->status==1){
	
	echo " ABIERTO ";
	
	}
	else {
	if($o->status==2){
	
	echo" GUARDADO";
	
	}
	else{
	if($o->status==3){
	echo"CERRADO";
	}
	if($o->status==4){
	echo"CANCELADO";
	}
	}
	}
	   echo"</td>
	  <td align='center'>$o->fechafin</td>
	   <td>";
	   $o->asignado;
	   $doc="select * from personal  where idpersonal='$o->asignado';";
	   $do=mysql_query($doc,$conexion);
		while( $b=mysql_fetch_object($do))
		{	echo"
				$b->nompersonal";
		}	 
	   echo"</td>
	  <td align='center'>";
	   if(($o->status==1)||($o->status==3)||($o->status==4)){
	
	echo "No Aplica ";
	
	}
	else {
	if($o->status==2){
	
	echo"<a href='cerrarodtm.php?folio=$o->folio && numcontrol=$o->numcontrol'><img src='../imgsicom/cerrar1.png' class='icono'><a/> ";
	
	}
	}
	  
	  
	  echo"</td>
	   <td align='center'>";
	    if(($o->status==1)||($o->status==2)){
	echo"
	 <a href='guardarodtmadmin.php?folio=$o->folio && numcontrol=$o->numcontrol'><img src='../imgsicom/guardar1.png' class='icono'><a/> 
	";
	}
	else{
	if(($o->status==3)||($o->status==4))
	{
	echo "No Aplica ";
	}
	} 
	   
	  
	   
	   echo"</td>
	   <td align='center'><a href='odtmquitar.php?folio=$o->folio && numcontrol=$o->numcontrol'><img src='../imgsicom/quitar1.png' class='icono'><a/></td>    
	   <td align='center'>";
	     if(($o->status==1)||($o->status==2)){
	
	echo "No Aplica ";
	
	}
	else{
	if(($o->status==3)||($o->status==4))
	{
	echo"<a href='formatoodtm.php?folio=$o->folio && numcontrol=$o->numcontrol'target='_blank'><img src='../imgsicom/imprimir1.png' class='icono'><a/>";
	}
	} 
	   
	   echo"</td>
	    <td align='center'><a href='cancelarodtm.php?folio=$o->folio && numcontrol=$o->numcontrol'><img src='../imgsicom/cancelar1.png' class='icono'><a/></td>    
    </tr>";
  }
	?>
  </table>
 
			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
		<?php  include "../../pie.php";?>
		</footer>
	</div>


</body>
</html>