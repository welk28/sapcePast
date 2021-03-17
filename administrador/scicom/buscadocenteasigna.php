<?php  session_start();  ?>
<!DOCTYPE  html>
<head>
	<title>>SAPCE:: SCICOM::BUSCA  DOCENTES</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";
		$idequipo=$_GET[idequipo];
		$idoc=$_GET[idoc];
		$area=$_GET[area];
		
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Lista de Docentes por Area:</div>
			</header>
			<article id="registros">
			<table width="960" border="0">
  <tr>
    <th width="17">No</th>
    <th width="274">DOCENTE</th>
    <th width="93">FECHA</th>
    <th width="52">STATUS</th>
    <th width="282">DEPTO/OFICINA</th>
	<th width="124">FECHA FIN</th>
	<th width="107">AGREGAR</th>
  </tr>
<?php
 $encarga="select * from encarga where status='0';";
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
	$doc="select * from docente where idoc='$e->idoc';";
	$do=mysql_query($doc,$conexion);
		while($b=mysql_fetch_object($do))
		{	echo"
				$b->nomdoc";
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
    <td>";
	$e->iddepto; 
	$consulta="select * from depto where iddepto='$e->iddepto';";
	$con=mysql_query($consulta,$conexion);
	if($con){
	while($c=mysql_fetch_object($con))
	{
	echo"$c->nombre"; 
	}
	}
	echo"</td>
	<td align='center'>$e->fechafin</td>
    <td align='center'><a href='altaasigna.php?idoc=$e->idoc && area=$e->iddepto && idequipo=$idequipo' target='_self'><img src='../imgsicom/agregadocente1.png' class='icono'></a></td>
  </tr>
  ";
  }
  ?>
  <?php
  $dirige="select * from  dirige where status='0';";
  $dir=mysql_query($dirige,$conexion);
while($d=mysql_fetch_object($dir))
{
$n++;
echo"  
  <tr>
    <td align='center'>$n</td>
    <td>"; 
	$d->idoc;
	$sql="select * from docente where idoc='$d->idoc';";
	$sq=mysql_query($sql,$conexion);
	if($sq){
	$q=mysql_fetch_object($sq);
	echo"$q->nomdoc";
	}
	echo"</td>
    <td align='center'>$d->fecha</td>
    <td align='center'> ";
	if($d->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'>";
	
	}
	else {
	if($d->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
    <td>";
	$d->idoficina; 
	$consu="select * from oficina where idoficina='$d->idoficina';";
	$cons=mysql_query($consu,$conexion);
	if($cons){
	while($b=mysql_fetch_object($cons))
	{
	echo"$b->nombre"; 
	}
	}
	echo"</td>
	<td align='center'>$d->fechafin</td>
    <td align='center'><a href='altaasigna.php?idoc=$d->idoc && area=$d->idoficina && idequipo=$idequipo' target='_self'><img src='../imgsicom/agregadocente1.png' class='icono'></a></td>
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