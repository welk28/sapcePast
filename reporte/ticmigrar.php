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
			<th >no</th>
			<th width="100">No <br>ctrl</th>
			<th width="50">CARRERA</th>
			<th width="50">Retic</th>
			<th width="50">Especia<br>lidad</th>
			<th width="50">Niv<br>esc</th>
			<th width="30">Sem</th>
			<th width="30">Status</th>
			<th width="50">Plan<br>Est</th>
			<th width="100">Ap pat</th>
            <th width="100">Ap mat</th>
            <th width="100">Nombre</th>
			<th width="150">CURP</th>
			<th width="200">Fecnac</th>
			<th width="30">Sexo</th>
			<th width="30">Edo <br>Civ</th>
            <th width="50">Per<br>Ingr</th>
            <th width="50">Ult<br>Per <br> Insc</th>
            <th width="">PROM<br> ANT</th>
            <th width="">PROm <br> ARTIT <BR> ACUM</th>
            <th width="">PROM<BR>GRAL</th>
            <th width="">PROM <BR> FIN</th>
            <th width="">Cred <br>aprob</th>
            <th width="">Cred <br>curs</th>
            <th width="">Cred <br>carga</th>
            <th width="">USM<br></th>
            <th width="">CSM</th>
            <th width="">EDP</th>
            <th width="">MAIL</th>
            <th width="">PDR</th>
            <th width="">FECTIT</th>
            <th width="">OPTIT</th>
            <th width="">CEDULA</th>
            <th width="">LIBRO</th>
            <th width="">HOJA</th>            
        </tr>


        <?php


		$alumnos="select distinct a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, a.idcar, a.edociv, ca.descar, ca.reticula, a.email  from alumnos as a, carrera as ca, horario as h, cursa as c where ca.idcar=a.idcar and h.idh=c.idh and a.matricula=c.matricula and a.idcar='ITIC-2010-225' order by a.status asc;";


		$als=mysql_query($alumnos,$conexion); 
		$f=0;
		while($a=mysql_fetch_object($als))
		{
			$f++;
			echo"
			<tr>			
				<td>$f</td>	
				<td>$a->matricula</td>
				<td>$a->idcar</td> 
				<td>$a->reticula</td>
				<td>";
				if($a->status>=5)
				    echo"ITIC1";
				else
				    echo"ITIC2";
				
				echo"</td>
				<td>L</td>
				<td>$a->status</td>
				<td>"; 

				$buscalumno="select c.matricula from cursa as c, horario as h where h.idh=c.idh and h.periodo='$periodo' and c.matricula='$a->matricula';";
				$buscal=mysql_query($buscalumno,$conexion);
				$nb=mysql_num_rows($buscal);
				if($nb>0)
					echo"ACT";
				else
				{
					if($a->status<10)
						echo"BT1"; 
					else
						echo"EGR";
				}

				echo"</td>
				<td>";
				if($a->status>=7)
				    echo"2";
				else
				    echo"3";
				
				echo"</td>
				<td>$a->app</td>
				<td>$a->apm</td>
				<td>$a->nom</td>
				<td>$a->curp</td>
				<td>$a->fecnac</td>
				<td>";
				if($a->sexo=='H')
					echo"M";
				else 
					echo"F";
				echo"</td>
				
				<td>"; 
					if($a->edociv=='SOLTERO(A)')
						echo"S";
					else
					{
						if($a->edociv=='CASADO (A)')
							echo"C";
						else
							echo"O";
					} 

				echo"</td>
				<td>";
				$primerper="select distinct h.periodo, c.matricula from horario as h, cursa as c where h.idh=c.idh and c.matricula='$a->matricula' order by h.periodo asc limit 0,1;";
				$pripe=mysql_query($primerper,$conexion);
				$pp=mysql_fetch_object($pripe);
				echo"$up->periodo";
				echo"</td>
				
				
				
				<td>";
				$ultimoper="select distinct h.periodo, c.matricula from horario as h, cursa as c where h.idh=c.idh and c.matricula='$a->matricula' order by h.periodo desc limit 0,1;";
				$ultpe=mysql_query($ultimoper,$conexion);
				$up=mysql_fetch_object($ultpe);
				echo"$up->periodo";
				echo"</td>
				
				
				";
				//promedio actual
				if($a->status == 1)
				{
					echo"<td> 
					0 </td> 
					<td> 0 </td>";
				}
				else
				{ 
					echo"<td>";
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
						//promedio del semestre anterior
						$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo='2017-2' order by h.periodo;";
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
					$proma=0;
					$proma=$sumpro/$x;
					//echo"$a->status "; 
					if($a->status==1)
						echo"0";
					else
						printf("%0.1f",$proma);
					

					echo"</td>";
					


					echo"<td>";
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

				$prom=0;
				$prom=$sumpro/$x;
				//printf("%0.1f",$prom); 
				echo"0</td>";
				}
				echo"
				<td>"; printf("%0.1f",$prom); echo"</td>
				<td>"; printf("%0.1f",$prom); echo"</td>
				
				<td>$sumcred</td>
				<td>$sumcred</td>
				<td>$sumcred</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
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