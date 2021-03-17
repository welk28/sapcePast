<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
	{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='../index.php';
				</script>
				";
	}
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Lista de alumnos ADMINISTRACION 208 CREDITOS EN ADELANTE <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        
            
			<th >No</th>
            <th width="150">no_control</th>
            
            <th >app</th>
            <th >apm</th>
            <th >nombres</th>
            <th >sem</th>
            <th width="50">ss</th>
            <th width="50">creditos</th>
            <th width="50">Porc</th>
            <th width="50">Esp</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, a.idcar, a.email  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and a.idcar='IADM-2010-213' and h.periodo='$periodo' and a.status>1 order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion); 
		$f=0;
		while($a=mysql_fetch_object($als))
		{
			$f++;

					$fecha=date('d/m/Y');
					$alumnosd="select a.app, a.apm, a.nom, a.status,a.propre, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$a->matricula';";
					$alud=mysql_query($alumnosd,$conexion);
					$ad=mysql_fetch_object($alud);
					$sumcred=0;
					$sumpro=0;
					
					$prom=0;

						$sumcred=0;
			  		//promedio general
					$sumpro=0;
				  	$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
				  	$maca=mysql_query($matecar,$conexion);$x=0;
				  	while($mc=mysql_fetch_object($maca))
				  	{
				  		$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' order by h.periodo;";
				  		$his=mysql_query($historia,$conexion);
				  		$nm=mysql_num_rows($his);
				  		
				  		if($nm>1)
				  		{
				  			$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' order by c.idh desc LIMIT 0,1;";
				  			$his=mysql_query($aprobados,$conexion);
				  		}
				  			
				  		while($h=mysql_fetch_object($his))
				  		{					
				  			$x++;		
				  			if($h->prom>=70)     
				            $sumcred+=$h->credit;
				  			$sumpro+=$h->prom;

				  		}
				}
				
				$residencia="select h.idh, h.idoc, c.matricula from horario as h, cursa as c where h.idmat='RESIDENCIA' and h.idh=c.idh and c.matricula='$a->matricula';";
				$res=mysql_query($residencia,$conexion);
				$nr=mysql_num_rows($res);
				$porcen=0;
				if (($sumcred>=208)&&($nr==0))
				{
						echo"
						<tr>			
							<td>$f</td>	
							<td>$a->matricula</td>
							<td>$a->app </td>
							<td>$a->apm</td>
							<td> $a->nom</td>
							<td align='center'>";
							if($a->status>=11)
							{
								echo"<div class='avisono'>
								$a->status
								</div>
								";
							}
							else
							{
								echo"$a->status";
							}
							

							echo"</td>
							<td align='center'>";
							//$ssoc="select h.idh, h.idoc, c.matricula from horario as h, cursa as c where h.idmat='ss' and c.prom>='70' and h.idh=c.idh and c.matricula='$a->matricula';";
							$ssoc="select h.idh, h.idoc, c.matricula from horario as h, cursa as c where h.idmat='ss' and h.idh=c.idh and c.matricula='$a->matricula';";
							$social=mysql_query($ssoc,$conexion);
							$ns=mysql_num_rows($social);

							if($ns>=1)
							{
								echo"<div class='avisono'>
								si
								</div>
								";
							}
							else
							{
								echo"";
							} 
							echo"<td>";
							
							printf("%d",$sumcred); 
							echo"</td>";

							echo"<td align='right'>";
							$porcen= ($sumcred*100)/260;
							printf("%d",$porcen); 
							echo"</td><td>";
							
							$especial="select h.idh, h.idmat, c.opor from horario as h, cursa as c where h.idh=c.idh and h.periodo='$periodo' and c.matricula='$a->matricula' and c.opor=3;";
							$espe=mysql_query($especial,$conexion);
							$ne=mysql_num_rows($espe);

							if($ne>=1)
							{
								echo"<div class='avisono'>
								<a href='$ip/administrador/horalumno.php?matricula=$a->matricula' title='Ver horario' target='_blank'>si</a>
								</div>
								";
							}
							else
							{
								echo"";
							} 

							echo"</td>							
						</tr>
								"; 
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