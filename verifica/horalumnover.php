<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>


</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 		
		$perioante=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		//$perioante="2018-1";
		$matricula=$usuario;
		$fecha=date('d/m/Y');
		$alumno="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
			?>
			
		<div class="subtitulo"> EVALUACION DOCENTE</a>  
		<?php 
		if($ses!=1)
		{
			echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>";
		}
		
		$creditos="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$perioante' and c.matricula='$matricula'";
		$credi=mysql_query($creditos,$conexion);
		$sucr=0;
		while($c=mysql_fetch_object($credi))
		{$sucr+=$c->credit;
			}
		?></div>
	</header>
	<section id="seccion">
    
        <header id="header">
            
            <table width="555" align="center">
              <tr>
                <td align="">FECHA:</td>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <td width="24%">N&Uacute;MERO DE CONTROL:</td>
                <td width="31%"><u><?php echo"$matricula"; ?></u></td>
                <td>PERIODO:</td>
                <td><u><?php echo"$perioante"; ?></u></td>
              </tr>
              <tr>
                <td>ESTUDIANTE:</td>
                <td><u><?php echo"$a->app $a->apm $a->nom"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>SEMESTRE:</td>
                <td><u><?php echo"$a->status"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CARRERA:</td>
                <td><u><?php echo"$a->descar"; ?></u></td>
                <td>CRÉDITOS:</td>
                <td><u><?php echo"$sucr"; ?></u></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"$a->idcar"; ?></u></td>
                <td></td>
                <td><u>
                  <?php echo"";
                    /*if($idcar=="ITIC-2010-225")
                        echo"ESPECIALIDAD PARA TICS"; 
                    else
                    {
                        if($idcar=="ILOG-2009-202")
                            echo"ESPECIALIDAD PARA LOGISTICA";
                        else
                        {
                            if($idcar=="IADM-2010-213")
                                echo"ESPECIALIDAD PARA ADMINISTRACION";	
                        }
                    }
                    */
                    ?>
                </u></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br><br><br><br>
        </header>

        <div id="registros" >
        
        <table width="980">
             <tr>
             <th width="65">GPO</th>
    	<th width="130">CLAVE</th>
    	<th width="300">Materia</th>
		
		<th width="75">OPORT</th>
		<th width="25">CR</th>        
    	<th width="95">LUNES</th>	
    	<th width="95">MARTES</th>		
    	<th width="95">MIERCOLES</th>	
    	<th width="95">JUEVES</th>		
    	<th width="95">VIERNES</th>		
        <th width="10">x</th>
  	</tr>
            <?php
            $horario="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$perioante' and c.matricula='$matricula'";
				$hora=mysql_query($horario,$conexion);
				$q=0;
				$totcre=0;
				while($h=mysql_fetch_object($hora))
				{//select h.idh, h.idmat, h.idoc, m.nommat, d.nomdoc from horario as h, materias as m, docente as d where h.idoc=d.idoc and h.idmat=m.idmat and h.periodo='$perioante' order by h.idh;
					$grupo="select g.idg, h.idh, h.idmat from hgrupo as g, horario as h,  encarre as e where e.idg=g.idg and g.idh=h.idh and h.idh='$h->idh' and e.idcar='$a->idcar';";
					$gru=mysql_query($grupo,$conexion);
					$gr=mysql_fetch_object($gru);
					echo"
					<tr>
						<td>$gr->idg</td>
						<td>$h->idh / $h->idmat</td>
						<td>$h->nommat <br> ** $h->nomdoc</td>
						
						<td>$h->descopor</td>
						<td align='center'>$h->credit</td>
						<td align='center'>";
						$totcre+=$h->credit;
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
						
						
						<td>";
						$evaluacion="select eval from cursa where idh='$h->idh' and matricula='$usuario';";
			            $evalu=mysql_query($evaluacion,$conexion);
			            $ev=mysql_fetch_object($evalu);
			           
			            
			            	if($ev->eval<48)
			            	{
			            		if(($h->idmat!="SS")&&($h->idmat!="RESIDENCIA"))
			            		echo"Evalúa ";
			            	}
							
			            
			            

						echo"</td>
						</tr>
					";
				}
				echo"
				<tr>
					<td></td>
					<td></td>
					<td align='right'>Total de créditos</td>
					<td></td>
					<td>$totcre</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				";
            ?>
        </table>
      </div>
     
  </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		
	</footer>
</div>
</body>
</html>