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
<?php 	include "../usuarios.php";	
		$idcar=$_GET[idcar];
		
?>


	</header>

	<section id="seccion">
     <header id="header">
            <h1>Carrera: <?php echo"$idcar"; ?></h1>
            <h2><a href="matasigna.php">Habilitar/Deshabilitar Materias</a></h2>
            <h2><a href="altamat.php">Alta y Asignacion de materia</a></h2>
      </header>

    <div id="reticula">
<table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
            </tr>
        <?php
            $nutic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat;";
			$nuti=mysql_query($nutic,$conexion);
			$nt=mysql_num_rows($nuti);
			$c=0;
			$sems=7;
            for($a=0; $a<$sems; $a++)
            {	echo"<tr>";				
				//1+++++++++++++++++++++++++++
				//mysql> select p.idmat, m.habil, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='itic-2010-225' and p.idmat=m.idmat and p.sem='1' and m.habil='1' order by p.idmat limit 0,1;
				$ret1="select p.idmat, m.nommat, m.habil, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='1' and m.habil='1' order by p.idmat limit $a,1;";

				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                   					
					echo"<td valign='bottom'>";
					
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
					echo"<td></td>";
				}

				//2+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.habil,m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='2' and m.habil='1' order by p.idmat limit $a,1;";

            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{
					//MATERIAS DE segundo SEMESTRE
                    //buscar la materia

						echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}


				//3+++++++++++++++++++++++++++

				$ret1="select p.idmat, m.nommat, m.cred, m.habil, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='3' and m.habil='1' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
					echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{

						echo"<td></td>";
				}


				//4+++++++++++++++++++++++++++

				$ret1="select p.idmat, m.nommat, m.cred, m.habil, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='4' and m.habil='1' order by p.idmat limit $a,1;";

            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{

					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia			
					echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>

					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}

				//5+++++++++++++++++++++++++++

				$ret1="select p.idmat, m.nommat, m.cred, m.habil, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='5' and m.habil='1' order by p.idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					
					echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>

					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}


				//6+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.habil, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='6' and m.habil='1' order by p.idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
						echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}


				//7+++++++++++++++++++++++++++

				$ret1="select p.idmat, m.nommat, m.cred, m.habil, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='7' and m.habil='1' and  not exists (select ma.idmat from materias as ma where ma.idesp<>'NULL' and m.idmat=ma.idmat) order by p.idmat limit $a,1;";

            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{

						echo"<td valign='bottom'>";
					echo"<p class='materia'> <br> $r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
					echo"<td>$a</td>";
				}


				//8+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.habil, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='8' and m.habil='1' and  not exists (select ma.idmat from materias as ma where ma.idesp<>'NULL' and m.idmat=ma.idmat) order by p.idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);

				if($c<=$nt)
				{

						echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}


				//9+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit,m.habil, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='9' and m.habil='1' and  not exists (select ma.idmat from materias as ma where ma.idesp<>'NULL' and m.idmat=ma.idmat) order by p.idmat limit $a,1;";

            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
				if($c<=$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
						echo"<td valign='bottom'>";
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
			echo"</tr>";
				$c++;
            }
        ?>  
       



        <table width="980" border="0">
  <tr>
  	<td class="aprob" align="center">acreditado</td>
    <td class="cursaord" align="center">cursa ordinario</td>
    <td class="cursarep" align="center">cursa repeticion</td>
    <td class="cursaesp" align="center">cursa especial</td>
    <td class="cursaglo" align="center">cursa global</td>
    <td align="center">No cursado</td>
    <td class="repro" align="center">Reprobado (status)</td>
  </tr>
</table>
<br><br><br>
<div class="subtitulo">Materias de especialidad </div>
<table>



	<tr>



	    <th colspan="3">ESPECIALIDAD ANTERIOR</th>



	    <th colspan="3">NUEVA ESPECIALIDAD</th>



    </tr>



    <tr>



	    <th>7 sem</th>



	    <th>8 sem</th>



	    <th>9 sem</th>



	    <th>7 sem</th>



	    <th>8 sem</th>



	    <th>9 sem</th>



    </tr>



    <?php 	



    $c=0;



	$sems=5;







    for($a=0; $a<$sems; $a++)



    {	



    	//inicia especialidad anterior



    	//determinando identificador de especialidad activa



	    $espe="select idesp from especialidad where idcar='$idcar' and status=0;";



	    $esp=mysql_query($espe,$conexion);



	    $ep=mysql_fetch_object($esp);



	    //echo"$ep->idesp";



	    //imprimiendo para SEPTIMO nueva especialidad



		//7+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='7' and m.habil='0'and m.idesp<>'NULL' and m.idesp='$ep->idesp' order by p.idmat limit $a,1;";



				//$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='ITIC-2010-225' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' order by p.idmat;";



            	$re1=mysql_query($ret1,$conexion);



				$r1=mysql_fetch_object($re1);



                $rn=mysql_num_rows($re1);



                //echo"rn: $rn";



				if($c<=$nt)



				{



					//MATERIAS DE PRIMER SEMESTRE



                    //buscar la materia



					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";



					$his=mysql_query($historia,$conexion);



					$hc=mysql_fetch_object($his);



					$nm=mysql_num_rows($his);



					//si encuentra registros significa que ha cursado



					if($nm>0) //sí encontró



					{



						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado



						{



							echo"<td valign='bottom' class='repro'>";



							if($hc->opor==1)



							{echo"<p class='reprobo'>A Repetición</p>";}



							else



							{



								if($hc->opor==2)



								{echo"<p class='reprobo'>A Especial</p>";}



								else



								{



									if($hc->opor==3)



									{echo"<p class='reprobo'>Baja def</p>";}



									else



									{



										if($hc->opor==4)



										{echo"<p class='reprobo'>Baja def</p>";}



									}



								}



							}



						}



						else



						{



							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio



							{



								echo"<td valign='bottom' class='aprob'>";



							}



							else //sino, entonces es del periodo actual



							{



								if($hc->opor==1)



								{



									echo"<td valign='bottom' class='cursaord'>";



								}



								else



								{



									if($hc->opor==2)



									{



										echo"<td valign='bottom' class='cursarep'>";



									}



									else



									{



										if($hc->opor==3)



										{



											echo"<td valign='bottom' class='cursaesp'>";



										}



										else



										{



											if($hc->opor==4)



											{



												echo"<td valign='bottom' class='cursaglo'>";



											}



										}



									}



								}



							}



						}



					}



					else



					{



						echo"<td valign='bottom'>";



					}



					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>



					<table class='nums' >



						<tr>



							<td ></td>



							<td >$r1->cred</td>



						</tr>



					</table>



					</td>";



				}



				else



				{



						echo"<td></td>";



				}



	    //imprimiendo para OCTAVO VIEJA especialidad



		//8+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='8' and m.habil='0'and m.idesp<>'NULL' and m.idesp='$ep->idesp' order by p.idmat limit $a,1;";



				//$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='ITIC-2010-225' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' order by p.idmat;";



            	$re1=mysql_query($ret1,$conexion);



				$r1=mysql_fetch_object($re1);



                $rn=mysql_num_rows($re1);



                //echo"rn: $rn";



				if($c<=$nt)



				{



					//MATERIAS DE PRIMER SEMESTRE



                    //buscar la materia



					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";



					$his=mysql_query($historia,$conexion);



					$hc=mysql_fetch_object($his);



					$nm=mysql_num_rows($his);



					//si encuentra registros significa que ha cursado



					if($nm>0) //sí encontró



					{



						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado



						{



							echo"<td valign='bottom' class='repro'>";



							if($hc->opor==1)



							{echo"<p class='reprobo'>A Repetición</p>";}



							else



							{



								if($hc->opor==2)



								{echo"<p class='reprobo'>A Especial</p>";}



								else



								{



									if($hc->opor==3)



									{echo"<p class='reprobo'>Baja def</p>";}



									else



									{



										if($hc->opor==4)



										{echo"<p class='reprobo'>Baja def</p>";}



									}



								}



							}



						}



						else



						{



							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio



							{



								echo"<td valign='bottom' class='aprob'>";



							}



							else //sino, entonces es del periodo actual



							{



								if($hc->opor==1)



								{



									echo"<td valign='bottom' class='cursaord'>";



								}



								else



								{



									if($hc->opor==2)



									{



										echo"<td valign='bottom' class='cursarep'>";



									}



									else



									{



										if($hc->opor==3)



										{



											echo"<td valign='bottom' class='cursaesp'>";



										}



										else



										{



											if($hc->opor==4)



											{



												echo"<td valign='bottom' class='cursaglo'>";



											}



										}



									}



								}



							}



						}



					}



					else



					{



						echo"<td valign='bottom'>";



					}



					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>



					<table class='nums' >



						<tr>



							<td ></td>



							<td >$r1->cred</td>



						</tr>



					</table>



					</td>";



				}



				else



				{



						echo"<td></td>";



				}







		//imprimiendo para NOVENO nueva especialidad



		//9+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='9' and m.habil='0'and m.idesp<>'NULL' and m.idesp='$ep->idesp' order by p.idmat limit $a,1;";



				//$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='ITIC-2010-225' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' order by p.idmat;";



            	$re1=mysql_query($ret1,$conexion);



				$r1=mysql_fetch_object($re1);



                $rn=mysql_num_rows($re1);



                //echo"rn: $rn";



				if($c<=$nt)



				{



					//MATERIAS DE PRIMER SEMESTRE



                    //buscar la materia



					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";



					$his=mysql_query($historia,$conexion);



					$hc=mysql_fetch_object($his);



					$nm=mysql_num_rows($his);



					//si encuentra registros significa que ha cursado



					if($nm>0) //sí encontró



					{



						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado



						{



							echo"<td valign='bottom' class='repro'>";



							if($hc->opor==1)



							{echo"<p class='reprobo'>A Repetición</p>";}



							else



							{



								if($hc->opor==2)



								{echo"<p class='reprobo'>A Especial</p>";}



								else



								{



									if($hc->opor==3)



									{echo"<p class='reprobo'>Baja def</p>";}



									else



									{



										if($hc->opor==4)



										{echo"<p class='reprobo'>Baja def</p>";}



									}



								}



							}



						}



						else



						{



							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio



							{



								echo"<td valign='bottom' class='aprob'>";



							}



							else //sino, entonces es del periodo actual



							{



								if($hc->opor==1)



								{



									echo"<td valign='bottom' class='cursaord'>";



								}



								else



								{



									if($hc->opor==2)



									{



										echo"<td valign='bottom' class='cursarep'>";



									}



									else



									{



										if($hc->opor==3)



										{



											echo"<td valign='bottom' class='cursaesp'>";



										}



										else



										{



											if($hc->opor==4)



											{



												echo"<td valign='bottom' class='cursaglo'>";



											}



										}



									}



								}



							}



						}



					}



					else



					{



						echo"<td valign='bottom'>";



					}



					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>



					<table class='nums' >



						<tr>



							<td ></td>



							<td >$r1->cred</td>



						</tr>



					</table>



					</td>";



				}



				else



				{



						echo"<td></td>";



				}		



	    //termina especialidad anterior



	    







	    //determinando identificador de especialidad activa



	    $espe="select idesp from especialidad where idcar='$idcar' and status=1;";



	    $esp=mysql_query($espe,$conexion);



	    $ep=mysql_fetch_object($esp);



	    //imprimiendo para SEPTIMO nueva especialidad



		//7+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='7' and m.habil='1'and m.idesp<>'NULL' and m.idesp='$ep->idesp' order by p.idmat limit $a,1;";



				//$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='ITIC-2010-225' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' order by p.idmat;";



            	$re1=mysql_query($ret1,$conexion);



				$r1=mysql_fetch_object($re1);



                $rn=mysql_num_rows($re1);



                //echo"rn: $rn";



				if($c<=$nt)



				{



					//MATERIAS DE PRIMER SEMESTRE



                    //buscar la materia



					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";



					$his=mysql_query($historia,$conexion);



					$hc=mysql_fetch_object($his);



					$nm=mysql_num_rows($his);



					//si encuentra registros significa que ha cursado



					if($nm>0) //sí encontró



					{



						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado



						{



							echo"<td valign='bottom' class='repro'>";



							if($hc->opor==1)



							{echo"<p class='reprobo'>A Repetición</p>";}



							else



							{



								if($hc->opor==2)



								{echo"<p class='reprobo'>A Especial</p>";}



								else



								{



									if($hc->opor==3)



									{echo"<p class='reprobo'>Baja def</p>";}



									else



									{



										if($hc->opor==4)



										{echo"<p class='reprobo'>Baja def</p>";}



									}



								}



							}



						}



						else



						{



							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio



							{



								echo"<td valign='bottom' class='aprob'>";



							}



							else //sino, entonces es del periodo actual



							{



								if($hc->opor==1)



								{



									echo"<td valign='bottom' class='cursaord'>";



								}



								else



								{



									if($hc->opor==2)



									{



										echo"<td valign='bottom' class='cursarep'>";



									}



									else



									{



										if($hc->opor==3)



										{



											echo"<td valign='bottom' class='cursaesp'>";



										}



										else



										{



											if($hc->opor==4)



											{



												echo"<td valign='bottom' class='cursaglo'>";



											}



										}



									}



								}



							}



						}



					}



					else



					{



						echo"<td valign='bottom'>";



					}



					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>



					<table class='nums' >



						<tr>



							<td ></td>



							<td >$r1->cred</td>



						</tr>



					</table>



					</td>";



				}



				else



				{



						echo"<td></td>";



				}



	    //imprimiendo para octavo nueva especialidad



		//8+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' and m.idesp='$ep->idesp' order by p.idmat limit $a,1;";



				//$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='ITIC-2010-225' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' order by p.idmat;";



            	$re1=mysql_query($ret1,$conexion);



				$r1=mysql_fetch_object($re1);



                $rn=mysql_num_rows($re1);



                //echo"rn: $rn";



				if($c<=$nt)



				{



					//MATERIAS DE PRIMER SEMESTRE



                    //buscar la materia



					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";



					$his=mysql_query($historia,$conexion);



					$hc=mysql_fetch_object($his);



					$nm=mysql_num_rows($his);



					//si encuentra registros significa que ha cursado



					if($nm>0) //sí encontró



					{



						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado



						{



							echo"<td valign='bottom' class='repro'>";



							if($hc->opor==1)



							{echo"<p class='reprobo'>A Repetición</p>";}



							else



							{



								if($hc->opor==2)



								{echo"<p class='reprobo'>A Especial</p>";}



								else



								{



									if($hc->opor==3)



									{echo"<p class='reprobo'>Baja def</p>";}



									else



									{



										if($hc->opor==4)



										{echo"<p class='reprobo'>Baja def</p>";}



									}



								}



							}



						}



						else



						{



							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio



							{



								echo"<td valign='bottom' class='aprob'>";



							}



							else //sino, entonces es del periodo actual



							{



								if($hc->opor==1)



								{



									echo"<td valign='bottom' class='cursaord'>";



								}



								else



								{



									if($hc->opor==2)



									{



										echo"<td valign='bottom' class='cursarep'>";



									}



									else



									{



										if($hc->opor==3)



										{



											echo"<td valign='bottom' class='cursaesp'>";



										}



										else



										{



											if($hc->opor==4)



											{



												echo"<td valign='bottom' class='cursaglo'>";



											}



										}



									}



								}



							}



						}



					}



					else



					{



						echo"<td valign='bottom'>";



					}



					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>



					<table class='nums' >



						<tr>



							<td ></td>



							<td >$r1->cred</td>



						</tr>



					</table>



					</td>";



				}



				else



				{



						echo"<td></td>";



				}







		//imprimiendo para NOVENO nueva especialidad



		//9+++++++++++++++++++++++++++



				$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='9' and m.habil='1'and m.idesp<>'NULL' and m.idesp='$ep->idesp' order by p.idmat limit $a,1;";



				//$ret1="select p.idmat, m.nommat, m.cred, m.credit, m.idesp, m.habil from posee as p, materias as m where p.idcar='ITIC-2010-225' and p.idmat=m.idmat and p.sem='8' and m.habil='1'and m.idesp<>'NULL' order by p.idmat;";



            	$re1=mysql_query($ret1,$conexion);



				$r1=mysql_fetch_object($re1);



                $rn=mysql_num_rows($re1);



                //echo"rn: $rn";



				if($c<=$nt)



				{



					//MATERIAS DE PRIMER SEMESTRE



                    //buscar la materia



					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";



					$his=mysql_query($historia,$conexion);



					$hc=mysql_fetch_object($his);



					$nm=mysql_num_rows($his);



					//si encuentra registros significa que ha cursado



					if($nm>0) //sí encontró



					{



						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado



						{



							echo"<td valign='bottom' class='repro'>";



							if($hc->opor==1)



							{echo"<p class='reprobo'>A Repetición</p>";}



							else



							{



								if($hc->opor==2)



								{echo"<p class='reprobo'>A Especial</p>";}



								else



								{



									if($hc->opor==3)



									{echo"<p class='reprobo'>Baja def</p>";}



									else



									{



										if($hc->opor==4)



										{echo"<p class='reprobo'>Baja def</p>";}



									}



								}



							}



						}



						else



						{



							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio



							{



								echo"<td valign='bottom' class='aprob'>";



							}



							else //sino, entonces es del periodo actual



							{



								if($hc->opor==1)



								{



									echo"<td valign='bottom' class='cursaord'>";



								}



								else



								{



									if($hc->opor==2)



									{



										echo"<td valign='bottom' class='cursarep'>";



									}



									else



									{



										if($hc->opor==3)



										{



											echo"<td valign='bottom' class='cursaesp'>";



										}



										else



										{



											if($hc->opor==4)



											{



												echo"<td valign='bottom' class='cursaglo'>";



											}



										}



									}



								}



							}



						}



					}



					else



					{



						echo"<td valign='bottom'>";



					}



					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>



					<table class='nums' >



						<tr>



							<td ></td>



							<td >$r1->cred</td>



						</tr>



					</table>



					</td>";



				}



				else



				{



						echo"<td></td>";



				}		



	    echo"



    	</tr>";	



    	$c++;



    }	



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