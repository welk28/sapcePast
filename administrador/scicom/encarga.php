<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM::DOCENTE POR DEPARTAMENTO</title>
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
				<div class="subtitulo">Lista de Docentes por Departamento</div>
			</header>
			<article id="registros">
			<table width="960" border="0">
  <tr>
    <th width="23">No </th>
    <th width="230">DOCENTE</th>
	 <th width="218">DEPTO</th>
    <th width="172">FECHA DE ASIGNACION</th>
    <th width="44">STATUS</th>
	<th width="86">FECHA FIN</th>
    <th width="74">MODIFICAR</th>
	<th width="98">DESABILITAR</th>
  </tr>
<?php
 $encarga="select * from encarga;";
 $enc=mysql_query($encarga,$conexion);
 $n=0;
 while($e=mysql_fetch_object($enc))
 {
 $n++;
echo"
  <tr>
    <td align='center'>$n</td>
    <td>";
	
	$e->idoc;
		  $depto="select * from docente  where idoc='$e->idoc';";
		  $de=mysql_query($depto,$conexion);
		while( $b=mysql_fetch_object($de))
		{	echo"
				$b->nomdoc";
		}		
	
	
	
	
	echo"</td>
	 <td>";
	$e->iddepto;
		  $depto="select * from depto  where iddepto='$e->iddepto';";
		  $de=mysql_query($depto,$conexion);
		while( $d=mysql_fetch_object($de))
		{	echo"
				$d->nombre";
		}		
	
	
	
	echo"</td>
    <td align='center'>$e->fecha</td>
    <td align='center'> ";
	if($e->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'>";
	
	}
	else {
	if($e->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
	<td align='center'>$e->fechafin</td>
    <td align='center'><a href='encargamodifica.php?idoc=$e->idoc&fecha=$e->fecha&iddepto=$e->iddepto' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a></td>
	<td align='center'><a href='encargadesabilita.php?idoc=$e->idoc&fecha=$e->fecha&iddepto=$e->iddepto' target='_self'>desabilitar</a></td>
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