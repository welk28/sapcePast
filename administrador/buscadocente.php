<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		$periodo=$_SESSION['periodo'];
		$idmat=$_GET[idmat];
		$nomdoc=$_GET[nomdoc];
		$idcar=$_GET[idcar];
		$idg=$_GET[idg];
	//echo"idoc: $idoc <br> idmat: $idmat <br> nommat: $nommat";
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Búsqueda de Docente para alta de Horario <?php echo"$periodo "?></div>
            <br>
        </header>

        <div id="registros" >
        <form action="buscadocente.php" method="get" name="form1" >
        <table>
            <tr>
                <th colspan="2" class="titulotabla">Complete el siguiente campo: </th>
            </tr>
      		<tr>
                <th width="107" align="right" ><br>Nombre Docente: </th>
				<td width="106" ><br>
                <label><input name="idmat" type="hidden" id="idmat" value="<?php echo"$idmat";?>"readonly></label>
                <label><input name="idcar" type="hidden" id="idcar" value="<?php echo"$idcar";?>"readonly></label>
                <label><input name="idg" type="hidden" id="idg" value="<?php echo"$idg";?>"readonly></label>
                <label><input name="nomdoc" type="text" id="nomdoc" ></label> </td>
			</tr>
            
            <tr>
                <td colspan="2" align="center"><label>
                  <input name="enviar" type="submit" id="enviar" value="Buscar" >
                </label></td>
			</tr>
			
        </table>
        </form>
        <br>
        <br>
        
        <table width="965">
    	<tr>
        	<th width="40">No</th>
            <th width="80">Id Mat</th>
            <th width="479">Nombre de docente</th>
            <th width="93">Seleccionar</th>
        </tr>
        <?php
		
		if(!empty($nomdoc))
		{
			$buscar="select * from docente where nomdoc like '%$nomdoc%'";
			$bu=mysql_query($buscar,$conexion);	$x=0;
			while($b=mysql_fetch_object($bu))
			{$x++;
				echo"
				<tr>
					<td>$x </td>
					<td>$b->idoc </td>
					<td>$b->nomdoc </td>
					<td> <a href='agregah.php?idoc=$b->idoc&idmat=$idmat&idcar=$idcar&idg=$idg' target='_self'>Selec</a> </td>
				</tr>
				";
			}
		
		}
		
		?>
        </table>
        </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>