<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: SEGUIMIENTO</title>
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
		<div class="subtitulo">	Lista de Seguimiento de Solicitudes  y Ordenes de Mantenimiento: </div>
			</header>
			<article id="registros">
			<table width="960" border="0">
    <tr>
      <th>No</th>
      <th>FOLIO</th>
      <th>N.CONTROL</th>
	  <th>FECHA ASIGNADA</th>
      <th>STATUS</th>
	  <th>FECHA FIN</th>
	  <th>ASIGNADO</th>
    </tr>
	<?php
	$genera="select * from genera;";
    $ge=mysql_query($genera,$conexion);
	$n=0;
	while ($g=mysql_fetch_object($ge)) 
	{ $n++;
	echo"
    <tr>
      <td align='center'>$n</td>
      <td align='center'>$g->folio</td>
      <td align='center'>$g->numcontrol</td>
	  <td align='center'>$g->fecha</td>
	  <td align='center'>";
	  $g->status;
	   if($g->status==1){
	
	echo " ABIERTO ";
	
	}
	else {
	if($g->status==2){
	
	echo" GUARDADO";
	
	}
	else{
	if($g->status==3){
	echo"CERRADO";
	}
	if($g->status==4){
	echo"CANCELADO";
	}
	
	}
	}
	  echo"</td>
	  <td align='center'>$g->fechafin</td>
	  <td>";
	  $g->asignado;
	   $doc="select * from personal  where idpersonal='$g->asignado';";
	   $do=mysql_query($doc,$conexion);
		while( $b=mysql_fetch_object($do))
		{	echo"
				$b->nompersonal";
		}	
	   echo"</td>
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