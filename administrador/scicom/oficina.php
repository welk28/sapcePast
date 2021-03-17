<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: OFICINA</title>
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
				<div class="subtitulo">Lista de Oficinas:</div>
			</header>
			<article id="registros">
			<table width="960" height="22">
		  <tr>
			<th width="27" scope="col">No</th>
			<th width="36" scope="col">IDOFI</th>
			<th width="348" scope="col">OFICINA </th>
			<th width="439" scope="col">DEPARTAMENTO </th>
			<th width="106" scope="col">MODIFICAR</th>
		  </tr>
 <?php
		  $oficina="select * from oficina;";
		  $ofi=mysql_query($oficina,$conexion);
		  $n=0;
		 
		  while($o=mysql_fetch_object($ofi))
		  {$n++;
			  echo"
			  <tr >
				<td align='center'>$n</td>
				<td align='center'>$o->idoficina</td>
				<td>$o->nombre</td>
				<td>";
	      $o->iddepto;
		  $depto="select * from depto  where iddepto='$o->iddepto';";
		  $de=mysql_query($depto,$conexion);
		while( $d=mysql_fetch_object($de))
		{	echo"
				$d->nombre";
		}		
	echo"
		</td>
				<td align='center'><a href='oficinamodifica.php?idoficina=$o->idoficina' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
			  </tr>";
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