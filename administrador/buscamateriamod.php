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
		$idoc=$_GET[idoc];
		$nommat=$_GET[nommat];
		$idcar=$_GET[idcar];
		$idg=$_GET[idg];
		$idh=$_GET[idh];
	//echo"idoc: $idoc <br> idmat: $idmat <br> nommat: $nommat";
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Búsqueda de materia para Modificación de Horario <?php echo"$periodo a $idg"?></div>
            <br>
        </header>

        <div id="registros" >
        
        <form action="buscamateriamod.php" method="get" name="form1" >
        <table>
            <tr>
                <th colspan="2" class="titulotabla">Complete el siguiente campo: </th>
            </tr>
      		<tr>
                <th width="107" align="right" ><br>Nombre Materia: </th>
				<td width="106" ><br>
                <label><input name="idh" type="hidden" id="idh" value="<?php echo"$idh";?>"readonly></label>
                <label><input name="idoc" type="hidden" id="idoc" value="<?php echo"$idoc";?>"readonly></label>
                <label><input name="idcar" type="hidden" id="idcar" value="<?php echo"$idcar";?>"readonly></label>
                <label><input name="idg" type="hidden" id="idg" value="<?php echo"$idg";?>"readonly></label>
                <label><input name="nommat" type="text" id="nommat" ></label> </td>
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
            <th width="479">Descripción</th>
            <th width="249">Carrera</th>
            <th width="93">Seleccionar</th>
        </tr>
        <?php
		
		if(!empty($nommat))
		{
			$buscar="select * from materias as m, posee as p where m.idmat=p.idmat and nommat like '%$nommat%' and p.idcar='$idcar'";
			$bu=mysql_query($buscar,$conexion);	$x=0;
			while($b=mysql_fetch_object($bu))
			{$x++;
				echo"
				<tr>
					<td>$x </td>
					<td>$b->idmat </td>
					<td>$b->nommat </td>
					<td>$b->idcar </td>
					<td> <a href='modomat.php?idmat=$b->idmat&idoc=$idoc&idcar=$idcar&idg=$idg&idh=$idh' target='_self'>Selec</a> </td>
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