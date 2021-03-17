<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: MARCA</title>
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
		<div class="subtitulo">	Lista de Marcas: </div>
			</header>
			<article id="registros">
			<table width="960" border="0">
    <tr>
      <th width="45"scope="col">No</th>
      <th width="55"scope="col">IDMARCA</th>
      <th width="692"scope="col">MARCA</th>
	  <th width="83"scope="col">MODIFICAR</th>
	  <th width="82"scope="col">ELIMINAR</th>
    </tr>
	<?php
	$marca="select * from marca;";
    $marc=mysql_query($marca,$conexion);
	$n=0;
	while ($m=mysql_fetch_object($marc)) 
	{ $n++;
	echo"
    <tr>
      <td align='center'>$n</td>
      <td align='center'>$m->idmarca</td>
      <td>$m->nombre</td>
	  <td align='center'><a href='marcamodifica.php?idmarca=$m->idmarca'><img src='../imgsicom/modificar1.png' class='icono'><a/></td>
	  <td align='center'><a href='marcaquitar.php?idmarca=$m->idmarca'><img src='../imgsicom/quitar1.png' class='icono'><a/></td>
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