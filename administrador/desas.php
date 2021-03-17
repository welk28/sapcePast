<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	$matricula=$_GET[matricula];
	$alumnosd="select * from alumnos where matricula='$matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);
		$idcar=$_GET[idcar];
		$idg=$_GET[idg];
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Materias en común ofertadas en el semestre actual 
			<?php echo"$periodo para $idg" ;
			?></div>
            <br>
        </header>

        <div id="registros" >
        <table>
            <tr>
                <th width="25">No</th>
                <th width="25">Grupo</th>
                <th width="130">HrS/Mat</th>
                <th width="30">Sem</th>
                <th width="375">Materia</th>
                <th width="70">Lunes</th>
                <th width="70">Martes</th>
                <th width="70">Miercoles</th>
                <th width="70">Jueves</th>
                <th width="70">Viernes</th>
               
                <th width="30">Ins</th>
                <th width="30">agr</th>
            
            </tr>
            <?php
				$q=0;
					$idhs="select h.idh, h.idoc, h.idmat, p.idcar from horario as h, posee as p where p.idmat=h.idmat and p.idcar='$idcar' and h.periodo='$periodo' order by h.idh;";
					$idh2=mysql_query($idhs,$conexion);
					while($id=mysql_fetch_object($idh2))
					{
						$horario="select g.idg, h.idh, p.idmat, p.sem, m.nommat, d.idoc, d.nomdoc from posee as p, horario as h, hgrupo as g, materias as m, docente as d where d.idoc=h.idoc and m.idmat=p.idmat and m.idmat=h.idmat and g.idh=h.idh and p.idmat=h.idmat and h.periodo='$periodo' and p.idcar='$idcar' and h.idh='$id->idh';";
						$hora=mysql_query($horario,$conexion);
						$nh=mysql_num_rows($hora);
						
						if($nh==0)
						{
							$registros="select h.idh, p.idmat, p.sem, m.nommat, d.idoc, d.nomdoc from posee as p, horario as h, materias as m, docente as d where d.idoc=h.idoc and m.idmat=p.idmat and m.idmat=h.idmat and p.idmat=h.idmat and h.periodo='$periodo' and p.idcar='$idcar' and h.idh='$id->idh';";
							$regis=mysql_query($registros,$conexion);
							$re=mysql_fetch_object($regis);
							$q++;			
								echo"
								<tr>
									<td align='center'>$q  </td>
									<td></td>
									<td>$re->idh / $re->idmat</td>
									<td align='center'>$re->sem</td>
									<td>$re->nommat <br> ** $re->nomdoc</td>
									<td align='center'>";
									$lunes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$id->idh' and i.idia='1';";
									$lu=mysql_query($lunes,$conexion);
									$rlu=mysql_num_rows($lu);
									if($rlu>0)
									{
										while($l=mysql_fetch_object($lu))
										{echo"$l->hora / $l->aula <br>";}
									}
									echo"</td>
									<td align='center'>";
									$martes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$id->idh' and i.idia='2';";
									$ma=mysql_query($martes,$conexion);
									while($m=mysql_fetch_object($ma))
									{echo"$m->hora / $m->aula <br>";}
									echo"</td>
									<td align='center'>
									";
									$miercoles="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$id->idh' and i.idia='3';";
									$mie=mysql_query($miercoles,$conexion);
									while($mi=mysql_fetch_object($mie))
									{echo"$mi->hora / $mi->aula<br>";}
									echo"</td>
									<td align='center'>
									";
									$jueves="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$id->idh' and i.idia='4';";
									$ju=mysql_query($jueves,$conexion);
									while($j=mysql_fetch_object($ju))
									{echo"$j->hora / $j->aula<br>";}
									echo"</td>
									<td align='center'>
									";
									$viernes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$id->idh' and i.idia='5';";
									$vi=mysql_query($viernes,$conexion);
									while($v=mysql_fetch_object($vi))
									{echo"$v->hora / $v->aula<br>";}
									echo"</td>";
									
									echo"<td align='center'>";
									$numero="select matricula from cursa where idh='$id->idh';";
									$num=mysql_query($numero,$conexion);
									$n=mysql_num_rows($num);
									echo"$n</td>";
									if($a->prom>=70)
									echo"<td align='right'>$a->prom</td>";
									else
									echo"<td><a href='agregah2.php?idh=$id->idh&idg=$idg&idcar=$idcar&idmat=$h->idmat' target='_self'>Agre  </a></td>";
								echo"</tr>";
							
						
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