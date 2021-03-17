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

			<div class="subtitulo">Lista de alumnos LOGISTICA 220 CREDITOS EN ADELANTE <?php echo"$periodo: $p->descper"?></div>

        <br>

    </header>



    <div id="registros" >

    <table>

    	<tr>

        

            

			<td >No</td>

            <td width="150">no_control</td>

            <td >curp</td>

            <td >nombres</td>

            <td >app</td>

            <td >apm</td>

            <td >sem</td>

            <td width="50">genero</td>

            <td width="50">creditos</td>

        </tr>

        <?php

		$alumnos="select distinct a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, a.idcar, a.email  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and a.idcar='ILOG-2009-202' order by a.idcar, a.status;";

		$als=mysql_query($alumnos,$conexion); 

		$f=0;

		while($a=mysql_fetch_object($als))

		{

			$f++;

			

				

				//promedio actual



				

					

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

						$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' order by h.periodo;";

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
				

				if ($sumcred>=220)

				{

						echo"

						<tr>			

							<td>$f</td>	

							<td>$a->matricula</td>

							<td>$a->curp</td>

							<td> $a->nom</td>

							<td>$a->app </td>

							<td>$a->apm</td>

							<td align='center'>$a->status</td>

							<td align='center'>";

			

							if($a->sexo=="H")

							{

								echo"M";

							}

							else

							{

								echo"F";

							} 

							echo"<td>";

				

							printf("%d",$sumcred); 

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