<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
	<script language="JavaScript" type="text/javascript">
function habilitar()
{
  if(document.agregarcomponente.idacce.value=='')
  {
  alert(" HACE FALTA AGREGAR  COMPONENTE");
  }
  else
  {
  
  document.agregarcomponente.submit();
  }
  
}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php 
		 include"../../usuarios.php";
		 $idequipo=$_GET[idequipo];
		 $descrip=$_GET[descrip];
		 $fechalt=$_GET[fechalt];
		 $idacce=$_GET[idacce];
		 $fecha= date('Y-m-d H:i:s');
		 
		/* echo"idacce:$idacce";*/
		
		 
		/* echo"
		 idequipo:$idequipo,
		 descrip:$descrip,
		 fechalt:$fechalt
		 ";*/
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Agregar Componentes</div>
			</header>
			<article id="form">
			<div align="center">
		
			<form  id="agregarcomponente" name="agregarcomponente"action="agregacomponente2.php" method="get">
			<table width="443" border="1">
  <tr>
    <td width="146">ID EQUIPO </td>
    <td width="281"><label>
      <input type="text" name="idequipox" id="idequipox" value="<?php echo"$idequipo";?>" disabled="disabled">
	  <input type="hidden" name="idequipo" id="idequipo" value="<?php echo"$idequipo";?>">
    </label></td>
  </tr>
  <tr>
    <td>DESCRIPCION</td>
    <td><label>
	 <textarea name="descripx" id="descripx" cols="40" rows="6"  disabled="disabled"><?php echo"$descrip";?></textarea>
	    <input type="hidden" name="descrip" id="descrip" value="<?php echo"$descrip";?>">
    </label></td>
  </tr>
  <tr>
    <td>FECHA ALTA DE EQUIPO: </td>
    <td><label>
      <input type="text" name="fechax" id="fechax" value="<?php echo"$fechalt";?>" disabled="disabled">
	  <input type="hidden" name="fechalt" id="fechalt" value="<?php echo"$fechalt";?>" >
    </label></td>
  </tr>
   <tr>
    <td>FECHA ASIGNA ACCESORIO: </td>
    <td><label>
      <input type="text" name="fechax" id="fechax" value="<?php echo"$fecha";?>" disabled="disabled">
	  <input type="hidden" name="fecha" id="fecha" value="<?php echo"$fecha";?>" >
    </label></td>
  </tr>
  <tr>
    <td>ACCESORIO</td>
    <td><label>
      <input type="text" name="idacce" id="idacce" value="<?php echo"$idacce";?>">
	  <?php echo"<a href='buscaaccesorio.php?idequipo=$idequipo && descrip=$descrip && fechalt=$fechalt'><img src='../imgsicom/buscar20x20.png' class='icono'></a>";?>
  </label>  </td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><label>
      <select name="status" id="status" disabled="disabled">
        <option value="0">habilitado</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>OBSERVACIONES</td>
    <td><label>
      <input type="text" name="observacion" id="observacion">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="agregar" id="agregar" value="AGREGAR" onClick="habilitar()">
    </div>
      <label></label></td>
    </tr>
</table>

			
			</form>
			</div>
			
			</article>
			<header id="header">
			<div class="subtitulo"> Lista de Componentes del Equipo de Computo</div>
			</header>
			<article id="registros">
			<table width="200" border="0">
  <tr>
    <th>No</th>
	<th>ID EQUIPO</th>
    <th>ID ACCESORIO</th>
	<th>DESCRIPCION</th>
	<th>STATUS</th>
    <th>FECHA</th>
    <th>OBSERVACION</th>
	<th>FECHAFIN</th>
	<th>DESABILITA COMPONENTE</th>
	<th>QUITAR COMPONENTE</th>
	
    </tr>
 <?php
 $tiene="select * from tiene where idequipo='$idequipo';";
 $tien=mysql_query($tiene,$conexion);
 $n=0;
 while($t=mysql_fetch_object($tien))
 { $n++;
 echo"
  <tr>
    <td align='center'>$n</td>
    <td align='center'>$t->idequipo</td>
    <td align='center'>$t->idacce</td>
	<td>$t->descrip</td>
	<td align='center'>";
	if($t->status==0){
	
	echo "<img src='../../img/habilitado1.png' class='icono'>";
	
	}
	else {
	if($t->status==1){
	
	echo"<img src='../../img/desabilitado1.png' class='icono'>";
	
	}
	}
	
	 
	echo"</td>
    <td align='center'>$t->fecha</td>
    <td>$t->observacion</td>
	<td align='center'>$t->fechafin</td>
	<td align='center'>";
	 if($t->status==0){
	
		echo " <form name='tienedesabilita'action='tienedesabilita.php' method='get'>
		  <input name='idequipo' type='hidden' value='$t->idequipo'>
		  <input name='descrip' type='hidden' value='$t->descrip'>
		  <input name='idacce' type='hidden' value='$t->idacce'>
		  <input name='fecha' type='hidden' value='$t->fecha'>
		  <input name='fechalt' type='hidden' value='$fechalt'>
		  <input name='desabilita' type='checkbox' onClick='submit()' checked>
		  </form>";
	
	}
	else {
	if($t->status==1){
	
	echo " <form name='tienehabilita'action='tienehabilita.php' method='get'>
		   <input name='idequipo' type='hidden' value='$t->idequipo'>
		  <input name='descrip' type='hidden' value='$t->descrip'>
		  <input name='idacce' type='hidden' value='$t->idacce'>
		  <input name='fecha' type='hidden' value='$t->fecha'>
		  <input name='fechalt' type='hidden' value='$fechalt'>
		  <input name='habilita' type='checkbox'  onClick='submit()'>
		  </form>";
	
	}
	}
	echo"
	</td>
	<td align='center'><a href='quitar.php?idequipo=$t->idequipo && idacce=$t->idacce && descrip=$t->descrip && fechalt=$t->fecha' target='_self'><img src='../../img/quitar1.png' class='icono'></a></td>
  </tr>
  ";
  }
  ?>
</table>
			
			</article>
		</section>
		<footer>
		<?php include"../../pie.php";?>
		</footer>
	</div>
</body>
</html>