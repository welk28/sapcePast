<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	$matricula=$_GET[matricula];
	$alumnosd="select * from alumnos where matricula='$matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);
		?>
        <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a> </div>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Lista de horarios de alta en el semestre actual 
			<?php echo"$periodo $p->descper  " ;
			
			if($matricula)
			{
				echo"<a href='horalumno.php?matricula=$matricula' target='_self'>Volver a horario</a>";
			}
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
               
                
                 <?php 
				if($matricula)
                	echo"<th width='30'>Add</th> ";
				?>
                <th width="70">Lunes</th>
                <th width="70">Martes</th>
                <th width="70">Miercoles</th>
                <th width="70">Jueves</th>
                <th width="70">Viernes</th>
               <th width="30">Ti</th>
               <th width="30">Log</th>
               <th width="30">Adm</th>
                <th width="30">Ins</th>
                
            </tr>
            <?php
				if($matricula)
				{
					/*$horario="select h.idh, h.idmat, h.idoc, p.sem, m.nommat, d.nomdoc from posee as p, horario as h, materias as m, docente as d where h.idoc=d.idoc and h.idmat=p.idmat and m.idmat=p.idmat and h.idmat=m.idmat and h.periodo='$periodo' and p.idcar='$ad->idcar' order by p.sem;";*/
					
					$horario="select g.idg, h.idh, h.idmat,p.sem, h.idoc, p.idcar, d.nomdoc, m.nommat from encarre as e, hgrupo as g, horario as h, posee as p, docente as d, materias as m where e.idg=g.idg and e.idcar=p.idcar and g.idh=h.idh and p.idmat=m.idmat and h.idmat=m.idmat and d.idoc=h.idoc and p.idmat=h.idmat and p.idcar='$ad->idcar' and h.periodo='$periodo' order by g.idg, p.sem;";
					$hora=mysql_query($horario,$conexion);
					$q=0;
					while($h=mysql_fetch_object($hora))
					{
						$q++;
					
						$acredita="select h.idh, h.idmat, c.prom from horario as h, cursa as c where h.idh=c.idh and c.matricula='$matricula' and h.idmat='$h->idmat' and c.prom>=70;";
						$acre=mysql_query($acredita,$conexion);
						$an=mysql_num_rows($acre);
						$a=mysql_fetch_object($acre);
						if(empty($a->prom))
						{		

							if($h->idmat=='SS')
							{

								echo"
								<tr>
									<td align='center'>$q  </td>
									<td>$h->idg</td>
									<td>$h->idh / $h->idmat</td>
									<td align='center'>$h->sem</td>
									<td>$h->nommat <br> ** $h->nomdoc</td>";
									
									$numero="select matricula from cursa where idh='$h->idh';";
									$num=mysql_query($numero,$conexion);
									$n=mysql_num_rows($num);

									
										if($h->idmat=='SS')
										{

											echo"<td><a href='cursard.php?idh=$h->idh&idmat=$h->idmat&matricula=$matricula' target='_self'>Agre  </a></td>";
										}
										else
										{
											if($n<50)
											{
												echo"<td><a href='cursard.php?idh=$h->idh&idmat=$h->idmat&matricula=$matricula' target='_self'>Agre  </a></td>";
											}
											else
											{
												echo"<td></td>";
												
											}
										}
										
										
									

									echo"<td align='center'>";
									$lunes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='1';";
									$lu=mysql_query($lunes,$conexion);
									$rlu=mysql_num_rows($lu);
									if($rlu>0)
									{
										while($l=mysql_fetch_object($lu))
										{echo"$l->hora / $l->aula <br>";}
									}
									echo"</td>
									<td align='center'>";
									$martes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='2';";
									$ma=mysql_query($martes,$conexion);
									while($m=mysql_fetch_object($ma))
									{echo"$m->hora / $m->aula <br>";}
									echo"</td>
									<td align='center'>
									";
									$miercoles="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='3';";
									$mie=mysql_query($miercoles,$conexion);
									while($mi=mysql_fetch_object($mie))
									{echo"$mi->hora / $mi->aula<br>";}
									echo"</td>
									<td align='center'>
									";
									$jueves="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='4';";
									$ju=mysql_query($jueves,$conexion);
									while($j=mysql_fetch_object($ju))
									{echo"$j->hora / $j->aula<br>";}
									echo"</td>
									<td align='center'>
									";
									$viernes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='5';";
									$vi=mysql_query($viernes,$conexion);
									while($v=mysql_fetch_object($vi))
									{echo"$v->hora / $v->aula<br>";}
									echo"</td>
									
									<td align='center'>";
									
									echo"$n</td>";
								echo"</tr>";
							}
						}
					}
				}
            ?>
        </table>
        </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>