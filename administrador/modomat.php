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
		$idh=$_GET[idh];
		$idcar=$_GET[idcar];
		$idoc=$_GET[idoc];
		$nomdoc=$_GET[nomdoc];
		$idmat=$_GET[idmat];
		$nommat=$_GET[nommat];
		$idg=$_GET[idg];
		$cupo=$_GET[cupo];
	//echo"sesion: $quien <br>usuario: $usuario";
	//echo"idh: $idh <br> idcar: $idcar <br> idoc: $idoc <br> nomdoc: $nomdoc <br> idmar: $idmat <br> nommat: $nommat <br> idg: $idg";
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Modificación de datos de horario <?php echo"Periodo: <b>$p->descper /$nh</b>"?></div>
            <br>
        </header>

        <div id="registros" >
       
        
        
		<form action='modomat2.php' name='form1' method='get' >
		<table>
            <tr>
                <th colspan="2" class="titulotabla">Complete los siguientes campos: </th>
            </tr>
      		<tr>
                <th width="107" align="right" ><br>Carrera: </th>
				<td width="106" ><br>
          <?php
			 echo"<input name='idcar' type='text' value='$idcar'>
			 <input name='idh' type='hidden' value='$idh'>
			 <input name='idga' type='hidden' value='$idg'>";
	?>
        </td>
			</tr>
            
            
            
            <tr>
                <th width="107" align="right" >Materia: </th>
				<td width="106" >
                <label><input name="idmat" type="hidden" id="idmat" value="<?php echo"$idmat";?>" size="5"readonly></label>
                <?php
				 $materia="select * from materias where idmat='$idmat'";
				 $mat=mysql_query($materia,$conexion);
				 $m=mysql_fetch_object($mat);
				  echo"<label><input name='materia' type='text' id='materia' value='$m->nommat' size='40'></label> <a href='buscamateriamod.php?idoc=$idoc&idcar=$idcar&idg=$idg&idh=$idh' target='_parent' >Buscar</a>"; ?></td>
			</tr>
            <tr>
                <th align="right">Docente: </th>
				<td>
                
                <label><input name="idoc" type="hidden" id="idoc" value="<?php echo"$idoc";?>"readonly></label>
                <?php
				$docente="select nomdoc from docente where idoc='$idoc';";
				$doc=mysql_query($docente,$conexion);
				$d=mysql_fetch_object($doc);
                echo"<label><input name='nomdoc' type='text' id='nomdoc' value='$d->nomdoc' size='40'> </label>  <a href='buscadocentemod.php?idmat=$idmat&idcar=$idcar&idg=$idg&idh=$idh' target='_parent' >Buscar</a>"; ?></td>
			</tr>
             <?php 
		   	echo"<tr>
					<th width='107' align='right' >Grupo: </th>
					<td width='106' >
					<select name='idg' id='idg' >";
					echo "<option value='$idg'>$idg</option>";
					$carrera="select * from encarre where idcar='$idcar';";
					$carr=mysql_query($carrera,$conexion);
					
					while ($ca= mysql_fetch_object($carr))
					{
						echo "<option value='$ca->idg'>$ca->idg</option>";
					}
					echo"</select></td></tr>";			
          ?>
          <tr>
				<th>Cupo: </th>
				<td><input type="text" name="cupo" value="<?php echo"$cupo"; ?>"></td>
			</tr>
            <tr>
                <td colspan="2" align="center">
                <?php
				if($quin==0)
				{
                	echo"<label>
                  	<input name='enviar' type='submit' id='enviar' value='Continuar' >
                	</label>";
				}
                ?>
                </td>
			</tr>
            
			
        </table>
        </form>
        </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>