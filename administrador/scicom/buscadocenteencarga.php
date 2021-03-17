<?php  session_start();  ?>
<!DOCTYPE  html>
<head>
	<title>>SAPCE:: SCICOM:: DOCENTES</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php"; ?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Lista de Docentes:</div>
			</header>
			<article id="registros">
			<table width="960">
		  <tr>
			<th width="31" scope="col">No</th>
			<th width="107" scope="col">IDDOCENTE</th>
			<th width="335" scope="col">NOMBRE</th>
			<th width="165" scope="col">DIRECCION</th>
			<th width="165" scope="col">TELEFONO</th>
			<th width="165" scope="col">EMAIL</th>
			<th width="98" scope="col">AGREGAR</th>
		  </tr>
		  <?php
		  $docente="select * from docente;";
		  $doce=mysql_query($docente,$conexion);
		  $n=0;
		  while($d=mysql_fetch_object($doce))
		  {$n++;
			  echo"
			  <tr >
				<td align='center'>$n</td>
				<td align='center'>$d->idoc</td>
				<td>$d->nomdoc</td>
				<td>$d->dirdoc</td>
				<td>$d->teldoc</td>
				<td>$d->maildoc</td>
				<td align='center'><a href='altaencarga.php?idoc=$d->idoc' target='_self'><img src='../imgsicom/agregadocente1.png' class='icono'></a></td>
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