<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: PERSONAL</title>
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
		<div class="subtitulo">	Lista de Personal  para mantenimiento: </div>
			</header>
			<article id="registros">
			<table width="960" border="0">
    <tr>
      <th>No</td>
      <th>IDPERSONAL</td>
      <th>NOMBRE</td>
	  <th>FECHA INICIO</td>
	  <th>STATUS</td>
	  <th>FECHA FIN</td>
	  <th>MODIFICAR</td>
      <th>DESABILITA</td>
    </tr>
	<?php
	$personal="select * from personal;";
    $pe=mysql_query($personal,$conexion);
	$n=0;
	while ($p=mysql_fetch_object($pe)) 
	{ $n++;
	echo"
    <tr>
      <td align='center'>$n</td>
      <td align='center'>$p->idpersonal</td>
      <td>$p->nompersonal</td>
	  <td align='center'>$p->fechainicio</td>
	  <td align='center'>";
	  $p->status;
	  if($p->status==0){
	  echo"<img src='../imgsicom/habilitado1.png' class='icono'>";
	  }
	  else{
	  if($p->status==1)
	  {
	   echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	  }
	  
	  }
	   echo"</td>
	  <td align='center'>$p->fechafin</td>
	  <td align='center'><a href='personalmodifica.php?idpersonal=$p->idpersonal'><img src='../imgsicom/modificar1.png' class='icono'><a/></td>
	  <td align='center'><a href='personaldesabilita.php?idpersonal=$p->idpersonal&&nompersonal=$p->nompersonal' target='_self'>desabilitar</a></td>
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