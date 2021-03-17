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
			<div class="subtitulo">Lista de alumnos inscritos en el semestre actual <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
            <td >periodo</td>
            <td >no_control</td>
            <td >numper</td>
            <td >credTot</td>
            <td >fecha</td>
            <td >cvepaq</td>
            <td >PromSemAnt</td>
            <td >HrsCruce</td>
            <td >CantMatCarg</td>
            <td >CantMatRep</td>
            <td >CredAprob</td>
            <td >CveCar</td>
            <td >CvePlan</td>
            <td >CveEsp</td>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.idcar, a.status, a.propre  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion); 
		$f=0;
		while($a=mysql_fetch_object($als))
		{
			$f++;
			echo"
			<tr>	
				<td align='center'>2193</td>		
				<td>$a->matricula</td>
				<td>$a->status</td>";
				$creditos="select m.credit, c.fecing, c.prom from horario as h, materias as m, cursa as c where h.idmat=m.idmat and h.idh=c.idh and h.periodo='$periodo' and c.matricula='$a->matricula';";
				$creds=mysql_query($creditos,$conexion);
				$scr=0;
				$sumac=0;
				while($cr=mysql_fetch_object($creds))
				{
					$scr+=$cr->credit;
					$fechac=$cr->fecing;
					if($cr->prom>60)
						$sumac+=$cr->credit;
				}

				echo"<td align='center'>$scr</td>";
				$fechaing="select h.idmat, m.credit, c.fecing from horario as h, materias as m, cursa as c where h.idmat=m.idmat and h.idh=c.idh and h.periodo='$periodo' and c.matricula='$a->matricula';";
				$fecalta=mysql_query($fechaing,$conexion);
				$fechas=mysql_fetch_object($fecalta);
				echo"<td align='center'>$fechas->fecing</td>";
				echo"<td align='center'></td>";
				//promedio semestre anterior
				echo"<td align='center'>"; 
				if($a->status == 1)
				{
					echo"$a->propre";
				}
				else
				{ 
					
					$fecha=date('d/m/Y');
					$alumnosd="select a.app, a.apm, a.nom, a.status,a.propre, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$a->matricula';";
					$alud=mysql_query($alumnosd,$conexion);
					$ad=mysql_fetch_object($alud);
					$sumcred=0;
					$sumpro=0;
					$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
					$maca=mysql_query($matecar,$conexion);$x=0;
					while($mc=mysql_fetch_object($maca))
					{
						$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo='2019-1' order by h.periodo;";
						$his=mysql_query($historia,$conexion);
						$nm=mysql_num_rows($his);
						
						if($nm>1)
						{
							$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' order by c.idh desc LIMIT 0,1;";
							$his=mysql_query($aprobados,$conexion);
							
						}
						
						while($h=mysql_fetch_object($his))
						{					
							$x++;
							$semestre="select * from posee where idcar='$ad->idcar' and idmat='$mc->idmat';";
							$seme=mysql_query($semestre,$conexion);
							$se=mysql_fetch_object($seme);
							if($h->prom>=70)
							{
								$sumcred+=$h->credit;
								$sumpro+=$h->prom;
							}	
						}
					}
					$prom=0;
					$prom=$sumpro/$x;
					//echo"$a->status "; 
					printf("%0.1f",$prom);
					
			  		
				  	 
				}
				echo"</td>";
				//horas cruce
				echo"<td align='center'></td>";
				//cantidad de materias cargadas
				$nmca=mysql_num_rows($creds);
				echo"<td align='center'>$nmca</td>";
				
				//cantidad materias reprobadas
				$nummatap="select distinct h.idmat,c.prom from horario as h, cursa as c where h.idh=c.idh and c.matricula='$a->matricula' and c.prom>60 and h.periodo='$periodo';";
				$nmatap=mysql_query($nummatap,$conexion);
				$nmap=mysql_num_rows($nmatap);
				$nmrep=$nmca-$nmap;
				echo"<td align='center'>$nmrep</td>";
				//creditor aprob
				echo"<td>  $sumac</td>";
				
				echo"<td>
				</td>
				<td></td>
				<td></td>
				";
				
				echo"</tr>"; 

		}
		?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>