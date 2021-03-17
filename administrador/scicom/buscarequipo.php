<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: BUSCA EQUIPO</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">

</head>
<body>
	<div id="cuerpo">
		<header>
 <?php 
   include "../../usuarios.php";
   $idequipo=$_GET[idequipo];
   $idoc=$_GET[idoc];
   $area=$_GET[area];
   
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
	<div class="subtitulo">		Lista de Equipos: </div>
			</header>
			<article id="registros">
			 <table width="960" border="0">
        <tr>
          <th width="24">No </th>
          <th width="74">ID EQUIPO</th>
          <th width="69">FECHA ALTA</th>
          <th width="199">DESCRIPCION</th>
		  <th width="81">STATUS</th>
		  <th width="129">AGREGAR</th>
        </tr>
        
<?php 
$equipo="select * from equipo where status='0';";
$equip=mysql_query($equipo,$conexion);
$n=0;

while ($q=mysql_fetch_object($equip)) {
$n++;
		
		echo"
		<tr>
          <td align='center'>$n</td>
          <td align='center'>$q->idequipo</td>
          <td align='center'>$q->fechalt</td>
          <td>$q->descrip</td>
		  <td align='center'> ";
	if($q->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'>";
	
	}
	else {
	if($q->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'>";
	
	}
	}
	
	echo"</td>
		  <td align='center'><a href='altaasigna.php?idequipo=$q->idequipo && idoc=$idoc && area=$area'target='_self'><img src='../imgsicom/agregardep1.png' class='icono'></a></td>
		  
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