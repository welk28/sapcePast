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
		$numero="select d.nomdoc, m.idmat, m.nommat, d.nomdoc from horario as h, materias as m, docente as d where m.idmat=h.idmat and d.idoc=h.idoc and h.periodo='$periodo' and idh='$idh';";
		$num=mysql_query($numero,$conexion);
		$n=mysql_fetch_object($num);
	//echo"sesion: $quien <br>usuario: $usuario";
	$idia=$_GET[idia];
	$idr=$_GET[idr];
	$ida=$_GET[ida];
	$mod=$_GET[mod];
	$idcar=$_GET[idcar];
	$idg=$_GET[idg];
	//echo"idcar: $idcar <br> idg: $idg";
		?>
	</header>
	<section id="seccion">
   
    	<header id="header">
            <div class="subtitulo">Alta de horas/dia por materia <?php if($idg){ echo"<a href='agregah.php?idcar=$idcar&idg=$idg' target='_self' title='Agregar materia al mismo grupo'>Agregar otra Materia a $idg </a>"; }?></div>
            <br>
            <table>
            	<tr>
                	<th width="200" align="right">No Horario:</th>
                    <td width="680"><?php echo"$idh";?></td>
                </tr>
                <tr>
                	<th align="right">Materia: </th>
                    <td><?php echo"$n->idmat / $n->nommat";?></td>
                </tr>
                <tr>
                	<th align="right">Docente:</th>
                    <td><?php echo"$n->nomdoc";?></td>
                </tr>
                <tr>
                	<th></th>
                    <td></td>
                </tr>
            </table>
            <br>
        </header>  
        <div id="registros">
        <?php
		if($mod==1)
		{
			if($ida==0)
			{
				echo"<div class='avisono'>No seleccionó un aula</div>";
			}
			else
			{
				$alta="insert into imparte values ('$idh', '$idia', '$idr', '$ida');";
				$alt=mysql_query($alta,$conexion);	
				if(!$alt)
				{
					echo"<div class='avisono'>Error al guardar, notifique al programador</div>";
				}
				else
				{
					echo"<div class='avisosi'>Guardado</div>";
				}
			}
			//echo"agregar registro en <br> idia= $idia <br> idr= $idr <br> ida= $ida <br> mod=$mod ";	
		}
		else
		{
			$quitar="delete from imparte where idh='$idh' and idr='$idr' and idia='$idia';";
			$qui=mysql_query($quitar,$conexion);
			if(!$qui)
				{
					echo"<div class='avisono'>Error al borrar, notifique al programador</div>";
				}
				else
				{
					echo"<div class='avisosi'>Borrado</div>";
				}
		}
		?>
        <table>
        	<tr>
            	<th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>                
            </tr>
            <?php
			$reloj="select * from reloj";
			$re=mysql_query($reloj,$conexion);
			while($r=mysql_fetch_object($re))
			{
            	echo"
				<tr>
					<td align='center'>$r->hora</td>";
					
					//lunes
				$sem="select * from imparte where idh='$idh' and idia='1' and idr='$r->idr';";
				$se=mysql_query($sem,$conexion);
				$ns=mysql_num_rows($se);
				$s=mysql_fetch_object($se);
				if($ns>0)
				{			 
					echo"<td align='right'>
					<form id='form1' name='form1' method='get' action='agregadia.php'>";
					$aulas="select * from aula where ida='$s->ida'";
					$aula=mysql_query($aulas,$conexion);
					$a=mysql_fetch_object($aula);
					echo"
					<label>
            		<select name='ida' id='ida' >
              		<option value='$a->ida' selected>$a->aula</option>";
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='1' size='3'> 
						<input type='checkbox' name='checkbox' id='lunes'  onClick='submit()'  checked/>
						<input type='hidden' name='mod' id='mod' value='0' size='3'>
					</form></td>";
				}
				else
				{			
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>
					<label>
            		<select name='ida' id='ida' >";
              		
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					
					echo"<option value='0' selected>-Aula-</option>";
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='1' size='3'> 
						<input type='checkbox' name='checkbox' id='lunes'  onClick='submit()' />
						<input type='hidden' name='mod' id='mod' value='1' size='3'>
					</form></td>";
				}//TERMINA LUNES
				
				//MARTES
				$sem="select * from imparte where idh='$idh' and idia='2' and idr='$r->idr';";
				$se=mysql_query($sem,$conexion);
				$ns=mysql_num_rows($se);
				$s=mysql_fetch_object($se);
				if($ns>0)
				{			 
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>";
					$aulas="select * from aula where ida='$s->ida'";
					$aula=mysql_query($aulas,$conexion);
					$a=mysql_fetch_object($aula);
					echo"
					<label>
            		<select name='ida' id='ida' >
              		<option value='$a->ida' selected>$a->aula</option>";
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='2' size='3'> 
						<input type='checkbox' name='checkbox' id='martes'  onClick='submit()'  checked/>
						<input type='hidden' name='mod' id='mod' value='0' size='3'>
					</form></td>";
				}
				else
				{			
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>
					<label>
            		<select name='ida' id='ida'>";
              		
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					echo"<option value='0' selected>-Aula-</option>";
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='2' size='3'> 
						<input type='checkbox' name='checkbox' id='martes'  onClick='submit()' />
						<input type='hidden' name='mod' id='mod' value='1' size='3'>
					</form></td>";
				}//TERMINA MARTES
					
				//Miercoles
				$sem="select * from imparte where idh='$idh' and idia='3' and idr='$r->idr';";
				$se=mysql_query($sem,$conexion);
				$ns=mysql_num_rows($se);
				$s=mysql_fetch_object($se);
				if($ns>0)
				{			 
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>";
					$aulas="select * from aula where ida='$s->ida'";
					$aula=mysql_query($aulas,$conexion);
					$a=mysql_fetch_object($aula);
					echo"
					<label>
            		<select name='ida' id='ida' >
              		<option value='$a->ida' selected>$a->aula</option>";
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='3' size='3'> 
						<input type='checkbox' name='checkbox' id='miercoles'  onClick='submit()'  checked/>
						<input type='hidden' name='mod' id='mod' value='0' size='3'>
					</form></td>";
				}
				else
				{			
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>
					<label>
            		<select name='ida' id='ida'>";
              		
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					echo"<option value='0' selected>-Aula-</option>";
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='3' size='3'> 
						<input type='checkbox' name='checkbox' id='miercoles'  onClick='submit()' />
						<input type='hidden' name='mod' id='mod' value='1' size='3'>
					</form></td>";
				}//TERMINA Miercoles	
				
				//Miercoles
				$sem="select * from imparte where idh='$idh' and idia='4' and idr='$r->idr';";
				$se=mysql_query($sem,$conexion);
				$ns=mysql_num_rows($se);
				$s=mysql_fetch_object($se);
				if($ns>0)
				{			 
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>";
					$aulas="select * from aula where ida='$s->ida'";
					$aula=mysql_query($aulas,$conexion);
					$a=mysql_fetch_object($aula);
					echo"
					<label>
            		<select name='ida' id='ida' >
              		<option value='$a->ida' selected>$a->aula</option>";
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='4' size='3'> 
						<input type='checkbox' name='checkbox' id='jueves'  onClick='submit()'  checked/>
						<input type='hidden' name='mod' id='mod' value='0' size='3'>
					</form></td>";
				}
				else
				{			
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>
					<label>
            		<select name='ida' id='ida'>";
              		
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					echo"<option value='0' selected>-Aula-</option>";
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='4' size='3'> 
						<input type='checkbox' name='checkbox' id='jueves'  onClick='submit()' />
						<input type='hidden' name='mod' id='mod' value='1' size='3'>
					</form></td>";
				}//TERMINA jueves
				
				//viernes
				$sem="select * from imparte where idh='$idh' and idia='5' and idr='$r->idr';";
				$se=mysql_query($sem,$conexion);
				$ns=mysql_num_rows($se);
				$s=mysql_fetch_object($se);
				if($ns>0)
				{			 
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>";
					$aulas="select * from aula where ida='$s->ida'";
					$aula=mysql_query($aulas,$conexion);
					$a=mysql_fetch_object($aula);
					echo"
					<label>
            		<select name='ida' id='ida' >
              		<option value='$a->ida' selected>$a->aula</option>";
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='5' size='3'> 
						<input type='checkbox' name='checkbox' id='viernes'  onClick='submit()'  checked/>
						<input type='hidden' name='mod' id='mod' value='0' size='3'>
					</form></td>";
				}
				else
				{			
					echo"<td align='right'><form id='form1' name='form1' method='get' action='agregadia.php'>
					<label>
            		<select name='ida' id='ida'>";
              		
					$desplega="select * from aula;";
					$despe=mysql_query($desplega,$conexion);
					echo"<option value='0' selected>-Aula-</option>";
					while($d=mysql_fetch_object($despe))
					{
              			echo"<option value='$d->ida'>$d->aula</option>";
					}
            		echo"</select>
          			</label>
						<label><input name='idcar' type='hidden' id='idcar' value='$idcar' readonly></label>
                		<label><input name='idg' type='hidden' id='idg' value='$idg' readonly></label>
						<input type='hidden' name='idh' id='idh' value='$idh' size='3'>
						<input type='hidden' name='idr' id='idr' value='$r->idr' size='3'>
						<input type='hidden' name='idia' id='idia' value='5' size='3'> 
						<input type='checkbox' name='checkbox' id='viernes'  onClick='submit()' />
						<input type='hidden' name='mod' id='mod' value='1' size='3'>
					</form></td>";
				}//TERMINA viernes
					echo"
            	</tr>";
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