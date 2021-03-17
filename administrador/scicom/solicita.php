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
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
		<div class="subtitulo">	Lista de Solicitudes: </div>
			</header>
			<article id="registros">
			<table width="960" border="0">
    <tr>
      <th width="17">No</th>
      <th width="33">FOLIO</th>
      <th width="88">FECHA</th>
	  <th width="211">DOCENTE</th>
	  <th width="132">OFI/DEPTO</th>
	  <th width="95">AREA</th>
      <th width="166">DESCRIPCION</th>
	  <th width="46">ODTM</th>
	  <th width="66">MODIFICAR</th>
	  <th width="83">IMPRIMIR</th>
    </tr>
	<?php
	$solicitud="select * from solicita;";
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
	  
	  
	  
	   
	  echo"</td>
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
	  <td align='center'>";
	 $consulta="select * from genera where  folio='$s->folio';";
	 $con=mysql_query($consulta,$conexion);
	 $c=mysql_fetch_object($con);
	 if($c->status==0){
	 echo"
	  <a href='altaodtm.php?folio=$s->folio'><img src='../imgsicom/generar1.png' class='icono'><a/>";
	 }
	 else{
	 if(($c->status==1)||($c->status==2)||($c->status==3)||($c->status==4)){
	 echo"
	  Genero";
	 }
	 }
	 
	  echo"</td>
	   <td align='center'><a href='solicitamodifica.php?folio=$s->folio'><img src='../imgsicom/modificar1.png' class='icono'><a/></td>
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