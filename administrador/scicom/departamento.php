<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: DEPARTAMENTO</title>
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
				<div class="subtitulo">Lista departamento:</div>
			</header>
			<article id="registros">
			<table width="960">
		  <tr>
			<th width="49" scope="col">No</th>
			<th width="49" scope="col">IDDEPTO</th>
			<th width="686" scope="col">DEPARTAMENTO</th>
			<th width="102" scope="col">MODIFICAR</th>
		  </tr>
 <?php
		  $departamento="select * from depto;";
		  $depto=mysql_query($departamento,$conexion);
		  $n=0;
		  while($d=mysql_fetch_object($depto))
		  {$n++;
			  echo"
			  <tr >
				<td align='center'>$n</td>
				<td align='center'>$d->iddepto</td>
				<td>$d->nombre</td>
				<td align='center'><a href='modificadepto.php?iddepto=$d->iddepto' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
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