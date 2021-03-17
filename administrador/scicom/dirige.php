<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM::DOCENTE POR OFICINA</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Lista Docente por Oficina</div>
			</header>
			<article id="registros">
			<table width="960" border="0">
  <tr>
    <th>No </th>
    <th>DOCENTE</th>
	<th>OFICINA</th>
    <th>FECHA DE ASIGNACION</th>
    <th>STATUS</th>
	<th>FECHA FIN</th>
    <th>MODIFICAR</th>
	<th>DESABILITAR</th>
  </tr>
  <?php
  $dirige="select * from  dirige;";
  $dir=mysql_query($dirige,$conexion);
  $n=0;
while($d=mysql_fetch_object($dir))
{
$n++;
echo"  
  <tr>
    <td align='center'>$n</td>
    <td>";
	$d->idoc;
		  $depto="select * from docente  where idoc='$d->idoc';";
		  $de=mysql_query($depto,$conexion);
		while( $b=mysql_fetch_object($de))
		{	echo"
				$b->nomdoc";
		}		
	
	echo"
	</td>
	 <td>";
	
	$d->idoficina;
		  $depto="select * from oficina  where idoficina='$d->idoficina';";
		  $de=mysql_query($depto,$conexion);
		while( $c=mysql_fetch_object($de))
		{	echo"
				$c->nombre";
		}		
	
	echo"</td>
    <td align='center'>$d->fecha</td>
     <td align='center'> ";
	if($d->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'> ";
	
	}
	else {
	if($d->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
	<td align='center'>$d->fechafin</td>
    <td align='center'><a href='dirigemodifica.php?idoc=$d->idoc&fecha=$d->fecha&idoficina=$d->idoficina' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
	<td align='center'><a href='dirigedesabilita.php?idoc=$d->idoc&fecha=$d->fecha&idoficina=$d->idoficina' target='_self'>desabilitar</a></td>
  </tr>
  ";
  }
  ?>
</table>


			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
			<?php include "../../pie.php";?>
		</footer>
	</div>
	
</body>
</html>