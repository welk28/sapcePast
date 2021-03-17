<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: EQUIPO</title>
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
			<div class="subtitulo"> Lista de Equipos de Computo</div>
			</header>
			<article id="registros">
			 <table width="995" border="0">
        <tr>
          <th width="18">No</th>
          <th width="27">IDPC</th>
		  <th width="61">RECU.MAT</th>
          <th width="75">FECHAALTA</th>
          <th width="259">DESCRIPCION</th>
		  <th width="46">STATUS</th>
          <th width="91">OBSERVACION</th>
		  <th width="48">IMAGEN</th>
          <th width="104">FECHABAJA</th>
          <th width="66">MODIFICAR</th>
		  <th width="53">HAB/DES</th>
		  <th width="81">AGREGAR</th>
        </tr>
        
<?php 
$equipo="select * from equipo;";
$equip=mysql_query($equipo,$conexion);
$n=0;

while ($q=mysql_fetch_object($equip)) {
$n++;
		
		echo"
		<tr>
          <td align='center'>$n</td>
          <td align='center'>$q->idequipo</td>
		  <td align='center'>$q->recumat</td>
          <td align='center'>$q->fechalt</td>
          <td>$q->descrip</td>
		  <td align='center'> ";
	if($q->status==0){
	
	echo "<img src='../imgsicom/habilitado1.png' class='icono'>";
	
	}
	else {
	if($q->status==1){
	
	echo"<img src='../imgsicom/desabilitado1.png' class='icono'> ";
	
	}
	}
	
	echo"</td>
          <td>$q->obser</td>
		  <td align='center'>"; 
		   if(!$q->imagen=="")
		   {
echo "<a href='imagen.php?imagen=".$q->imagen."' target='imagen' onclick=\"window.open(this.href, this.target,' width=300, height=200,top=150,left=200,scrollbars=yes,resizable=yes');return false;\"><img src='$q->imagen' class='imagen'/></a>"; 
		  }
		  else 
		  {
		  echo"<img src='$q->imagen' class='imagen'/>";
		  
		  }
		  echo"</td>
          <td align='center'>$q->fechbaja</td>
          <td align='center'>  <a href='equipomodifica.php?idequipo=$q->idequipo&fecha=$q->fechalt' target='_self'><img src='../imgsicom/modificar1.png' class='icono'></a> </td>
		  <td align='center'>";
		  if($q->status==0){
	
		echo " <form name='equipodesabilita'action='equipodesabilita.php' method='get'>
		  <input name='idequipo' type='hidden' value='$q->idequipo'>
		  <input name='desabilita' type='checkbox' onClick='submit()' checked>
		  </form>";
	
	}
	else {
	if($q->status==1){
	
	echo " <form name='equipohabilita'action='equipohabilita.php' method='get'>
		  <input name='idequipo' type='hidden' value='$q->idequipo'>
		  <input name='fecha' type='hidden' value='$q->fechalt'>
		   <input name='fechafin' type='hidden' value='0'>
		  <input name='habilita' type='checkbox'  onClick='submit()'>
		  </form>";
	
	}
	}
 
		  echo"</td>
		  <td align='center'><a href='agregacomponente.php?idequipo=$q->idequipo&& fechalt=$q->fechalt && descrip=$q->descrip' target='_self'><img src='../imgsicom/agregardep1.png' class='icono'></a></td>
		  
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