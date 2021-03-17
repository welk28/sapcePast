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
            <td >no_control</td>
            <td >idcar</td>
            <td >cveplan</td>
            <td >cveEsp</td>
            <td >periodo</td>
            <td >perTerm</td>
            <td >Situa</td>
            <td >UlSemCur</td>
            <td >GPO </td>
            <td >credAcum</td>
            <td >perConval</td>
            <td >Obse</td>
            <td >TotCalApro</td>
            <td >MatAprob</td>
            <td >MatCur</td>
            <td >MatconActComp</td>
            <td >EstPrinc</td>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.idcar  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion); 
		$f=0;
		while($a=mysql_fetch_object($als))
		{
			$f++;
			echo"
			<tr>			
				<td>$a->matricula</td>
				<td>$a->idcar</td>";
				//cveplan
				echo"<td align='center'></td>";
				//cveespecialidad
				echo"<td align='center'></td>";
				//periodo
				echo"<td align='center'>$periodo</td>";
				//periodo de termino
				echo"<td align='center'></td>";
				//situacion
				echo"<td align='center'></td>";
				//ultimo semestre cursado
				echo"<td align='center'></td>";
				//gruipo
				echo"<td align='center'>A</td>";
				"<td>";
				//promedio actual

				if($a->status == 1)
				{
					echo"0";
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
					$nmap=0;
					while($mc=mysql_fetch_object($maca))
					{
						$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo='2019-2' order by h.periodo;";
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
								$nmap+=$nmap;
							}	
						}
					}
	 
					
				
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
				  			$nmap+=$nmap;
				  		}
				  	}
				}
				echo"<td>";
				
				printf("%d",$sumcred); 
				echo"</td>
				<td></td>
				<td></td>
				<td>";printf("%d",$sumpro);  echo"</td>";
				$nummatap="select distinct h.idmat,c.prom from horario as h, cursa as c where h.idh=c.idh and c.matricula='$a->matricula' and c.prom>60;";
				$nmatap=mysql_query($nummatap,$conexion);
				$nmap=mysql_num_rows($nmatap);
				echo"<td>$nmap</td>";
				//materias cursadas
				$matecur="select distinct h.idmat from horario as h, cursa as c where h.idh=c.idh and c.matricula='$a->matricula';";
				$matec=mysql_query($matecur,$conexion);
				$nmc=mysql_num_rows($matec);
				echo"<td>$nmc</td>";
				echo"<td></td>
				<td></td>

				</tr>
						"; 

		}
		?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>