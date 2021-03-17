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
	$clave=$_GET[clave];
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
		<div class="subtitulo">	Lista de Seguimiento de Solicitudes  y Ordenes de Mantenimiento: </div>
			</header>
			<article id="registros">
	<table width="960" border="0">
    <tr>
      <th width="23">No</th>
      <th width="46">FOLIO</th>
	  <th width="73">N.CONTROL</th>
	  <th width="121">FECHA ASIGNADA</th>
      <th width="65">STATUS</th>
	  <th width="99">FECHA FIN</th>
	  <th width="399">ASIGNADO</th>
	  <th width="119">ODTM</th>
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
      <td align='center'>$s->folio</td>";
	  $consulta="select * from genera where folio='$s->folio';";
	  $con=mysql_query($consulta,$conexion);
	  if($con){
	  $c=mysql_fetch_object($con);
	  echo"
			<td align='center'>$c->numcontrol</td>
            <td align='center'>$c->fecha</td>
            <td align='center'>";$c->status;
	   if($c->status==1){
	
	echo " ABIERTO ";
	
	}
	else {
	if($c->status==2){
	
	echo" GUARDADO";
	
	}
	if($c->status==3)
	{
	 echo"CERRADO";
	}
	
	else{
	if($c->status==4){
	echo"CANCELADO";
	}
	else{
	if($c->status==0)
	{
	echo"EN ESPERA";
	}
	}
	}
	}
			 echo"</td>
            <td align='center'>$c->fechafin</td>
            <td>";
			$c->asignado;
	   $doc="select * from personal  where idpersonal='$c->asignado';";
	   $do=mysql_query($doc,$conexion);
		while( $b=mysql_fetch_object($do))
		{	echo"
				$b->nompersonal";
		}	
			 echo"</td>
			<td align='center' >"; 
			if($c->status==1)
			{
			echo"<a href='guardarodtm.php?folio=$s->folio && numcontrol=$c->numcontrol && clave=$clave'><img src='../imgsicom/guardar1.png' class='icono'><a/>";
			}
			else{
			if($c->status==2){
			echo"guardado";
			}
			if($c->status==3){
			echo"Cerrado";
			}
			else{
			if($c->status==4){
			echo"Cancelado";
			}
			else{
			if($c->status==0){
			echo"EN ESPERA";
			}
			}
			}
			}
			
			echo"</td>
	  "; 
	}
	  
	
	   echo"
      
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