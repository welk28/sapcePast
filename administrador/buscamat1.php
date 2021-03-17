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
		
		$idmat1=$_GET[idmat1];
		$idmat2=$_GET[idmat2];
		$nommat=$_GET[nommat];
	//echo"idoc: $idoc <br> idmat: $idmat <br> nommat: $nommat";
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Búsqueda de materia Delantera <?php echo"$periodo "?></div>
            <br>
        </header>

        <div id="registros" >
        
        <form action="buscamat1.php" method="get" name="form1" >
        <table>
            <tr>
                <th colspan="2" class="titulotabla">Complete el siguiente campo: </th>
            </tr>
      		<tr>
                <th width="107" align="right" ><br>Nombre Materia: </th>
				<td width="106" ><br>
                <label><input name="idmat1" type="hidden" value="<?php echo"$idmat1";?>"readonly></label>
                <label><input name="idmat2" type="hidden" value="<?php echo"$idmat2";?>"readonly></label>
               
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
			$buscar="select * from materias as m, posee as p where m.idmat=p.idmat and nommat like '%$nommat%' ";
			$bu=mysql_query($buscar,$conexion);	$x=0;
			while($b=mysql_fetch_object($bu))
			{$x++;
				echo"
				<tr>
					<td>$x </td>
					<td>$b->idmat </td>
					<td>$b->nommat </td>
					<td>$b->idcar </td>
					<td> <a href='buscaligados.php?idmat1=$b->idmat&idmat2=$idmat2' target='_self'>Selec</a> </td>
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