<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: SOLICITUDES</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">

</head>
<body>
	<div id="cuerpo">
		<header>
 <?php 
    include "../../usuarios.php";
	$conexion=conectar();
	$clave=$_GET[clave];
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
		<div class="subtitulo">	
		Lista de Solicitudes: </div>
			</header>
			<article id="registros">
			<table width="960" border="0">
    <tr>
      <th width="17">No</th>
      <th width="33">FOLIO</th>
      <th width="74">FECHA</th>
	  <th width="230">DOCENTE</th>
	  <th width="164">OFI/DEPTO</th>
	  <th width="168">AREA</th>
      <th width="163">DESCRIPCION</th>
	  <th width="96">IMPRIMIR</th>
    </tr>
	<?php
	$solicitud="select * from solicita where clave='$clave';";
    $sol=mysql_query($solicitud,$conexion);
	$n=0;
	while ($s=mysql_fetch_object($sol)) 
	{ $n++;
	echo"
    <tr>
      <td align='center'>$n</td>
      <td align='center'>$s->folio</td>
      <td align='center'>$s->fecha</td>
	  <td>";
	   $s->clave;
	   $docente="select * from docente  where idoc='$s->clave';";
	   $do=mysql_query($docente,$conexion);
		while( $b=mysql_fetch_object($do))
		{	echo"
				$b->nomdoc";
		}	
	 echo" </td>
	  <td>";
	  $s->area;
	   $depto="select * from depto  where iddepto='$s->area';";
	   $de=mysql_query($depto,$conexion);
		while( $b=mysql_fetch_object($de))
		{	echo"
				$b->nombre";
		}	
	  
	  echo"</td>
	  <td>";
	  $s->departamento;
	  $areas="select * from areas where idarea='$s->departamento';";
	  $are=mysql_query($areas,$conexion);
		while( $b=mysql_fetch_object($are))
		{	echo"
				$b->nombrearea";
		}	
	   echo"</td>
	  <td>$s->descripcion</td>
	  <td align='center'><a href='formatosolicitud.php?folio=$s->folio'target='_blank'><img src='../imgsicom/imprimir1.png' class='icono'><a/></td>
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