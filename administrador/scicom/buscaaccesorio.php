<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: BUSCA ACCESORIO</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">

</head>
<body>
	<div id="cuerpo">
		<header>
 <?php 
   include "../../usuarios.php";
   $idequipo=$_GET[idequipo];
   $descrip=$_GET[descrip];
   $fechalt=$_GET[fechalt];
   $fecha=$_GET[fecha]
   /*echo"
   idequipo:$idequipo
   descrip:$descrip
   fechalt:$fechalt
   ";	*/
   
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
	<div class="subtitulo">		Lista de Accesorio: </div>
			</header>
			<article id="registros">
 <table width="960" border="0">
  <tr>
   <th width="17">No</th>
    <th width="85">IDACCE</th>
    <th width="468">DESCRIPCION</th>
    <th width="52">MODELO</th>
    <th width="67">EXISTENCIA</th>
    <th width="54">MARCA</th>
	<th width="43">PRECIO</th>
	<th width="89">AGREGAR</th>
  </tr>
  <?php
  $accesorio="select * from accesorio;";
  $acce=mysql_query($accesorio,$conexion);
  $n=0;
 while ($acc=mysql_fetch_object($acce)) 
 { $n++;
echo"  
  <tr>
    <td align='center'>$n</td>
    <td align='center'>$acc->idacce</td>
    <td>$acc->descrip</td>
    <td align='center'>$acc->modelo</td>
    <td align='center'>$acc->exist</td>
    <td align='center'>$acc->idmarca</td>
	<td align='center'>$acc->precio</td>
	<td align='center'><a href='agregacomponente.php?idacce=$acc->idacce && idequipo=$idequipo && descrip=$descrip && fechalt=$fechalt && fecha=$fecha'target='_self'><img src='../imgsicom/agregarexist1.png' class='icono'></a></td> 
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