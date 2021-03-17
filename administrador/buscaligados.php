<?php  session_start();  ?>



<!DOCTYPE html >



<html>



<head>



<meta charset="utf-8" />



<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>



<link href="../css/proweb.css" rel="stylesheet" type="text/css">







</head>







<body>



<div id="cuerpo">



	<header>



		<?php 	include "../usuarios.php";	



		//$periodo=$_SESSION['periodo'];



	//echo"sesion: $quien <br>usuario: $usuario";

		$idmat1=$_GET[idmat1];

		$idmat2=$_GET[idmat2];

	$matricula=$_GET[matricula];



	$nombre=$_GET[nombre];



		?>



	</header>



	



	



	<section id="seccion">



    



    <header id="header">

	

		

		<form action="buscaligados.php" method="get">

			<table>

    			<tr>

    				<td align="center">

						<input name="idmat1" type="hidden" value="<?php echo"$idmat1";?>" size="5"readonly>

		                <?php

						 $materia1="select * from materias where idmat='$idmat1'";

						 $mat1=mysql_query($materia1,$conexion);

						 $m1=mysql_fetch_object($mat1);

						  echo"<input name='materia' type='text' id='materia' value='$m1->nommat' size='40' placeholder='Materia Delantera --------->' readonly>

						   <a href='buscamat1.php?idmat1=$idmat1&idmat2=$idmat2' target='_parent' >Buscar</a>"; ?>

    				</td>



	    			<td align="center">

	    				<input name="idmat2" type="hidden" value="<?php echo"$idmat2";?>" size="5" readonly>

		                <?php

						 $materia2="select * from materias where idmat='$idmat2'";

						 $mat2=mysql_query($materia2,$conexion);

						 $m2=mysql_fetch_object($mat2);

						  echo"<input name='materia' type='text' id='materia' value='$m2->nommat' size='40' placeholder='Materia previa--------->' readonly>

						   <a href='buscamat2.php?idmat1=$idmat1&idmat2=$idmat2' target='_parent' >Buscar</a>"; ?>

	    			</td>



    			</tr>

    			



    		</table>

		</form>

<br><br>

		 

    

			<div class="subtitulo">Coincidencias encontradas <?php echo"$periodo: $p->descper

				<br><br><br> Materia delantera: $m1->nommat $idmat1 	<br>Materia Trasera: $m2->nommat $idmat2<br><br><br>

			";?> </div>



        <br>



    </header>







    <div id="registros" >



    <table>



    	<tr>



        	<th width="21">No</th>

            <th width="90">Control</th>

            <th width="300">Nombre</th>

            <th width="">Se</th>

            <th width="">Carrera</th>

            

            <th width="42">Grupo</th>

            <th width="42">Reprob</th>

            <th width="42">NoCursa</th>

			<th width="42">Cursando</th>

        </tr>



        <?php



        	$alumnos="select distinct h.idh, g.idg, c.matricula, c.opor, a.app, a.apm, a.nom, a.status, a.idcar, a.sexo, a.fecnac from alumnos as a, cursa as c, horario as h, hgrupo as g where h.idh=g.idh and c.idh=h.idh and a.matricula=c.matricula and h.idmat='$idmat1' and h.periodo='$periodo' order by a.app, a.apm, a.nom;";



		$als=mysql_query($alumnos,$conexion);



		$x=0;



		while($a=mysql_fetch_object($als))

		{



			$x++;

			$cursando="select c.prom from cursa as c, horario as h where h.idh=c.idh and c.matricula='$a->matricula' and h.idmat='$idmat2' and h.periodo='$periodo';";

			$cursa=mysql_query($cursando,$conexion);

			$nc=mysql_num_rows($cursa);



			$nocursa="select c.prom from cursa as c, horario as h where h.idh=c.idh and c.matricula='$a->matricula' and h.idmat='$idmat2';";

			$nocu=mysql_query($nocursa,$conexion);

			$noc=mysql_num_rows($nocu);



			$reproba="select c.prom from cursa as c, horario as h where h.idh=c.idh and c.matricula='$a->matricula' and h.idmat='$idmat2' and h.periodo<>'$periodo';";

			$rep=mysql_query($reproba,$conexion);

			

			$nr=mysql_num_rows($rep);

			



			echo"



			<tr>



				<td>$x</td>

				<td><a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom' target='_blank'>$a->matricula</a></td>

				<td> $a->app $a->apm $a->nom</td>

				

				<td align='center'>$a->status</td>



				



				<td>$a->idcar</td>

				<td>$a->idg</td>

				<td>";

				//echo"$nr - ";

				if($nr>0)

				{

					//buscar si alguno aprobado, si no mandar a imprimir que esta reprobado y debe dar de baja una materia posterior

					//if($rp->prom<70) 

					//SACAR NUMERO DE REGISTROS EL APROBADO O REPROBADO

					$cont=0;

					while($rp=mysql_fetch_object($rep))

					{

						//echo"$rp->prom -- <br>";

						if($rp->prom >=70)

							$cont++;

					}



					if($cont<1) 

						{

							echo"REPROBO $m2->nommat, <B> DAR DE BAJA  

							<a href='quitamat.php?matricula=$a->matricula&idh=$a->idh' target='_blank' title='Eliminar de horario e imprimir'>$m1->nommat</a></B>" ;



						}

						

				}

				



				echo"</td>

				<td>";



				if($noc==0) 

					{

						echo"NO HA CURSADO $m2->nommat, <B> DAR DE BAJA  

							<a href='quitamat.php?matricula=$a->matricula&idh=$a->idh' target='_blank' title='Eliminar de horario e imprimir'>$m1->nommat</a></B>";

					}

				echo"</td>

				<td> "; 

				//indicador de que tiene cargado ambas materias y debe dar de baja la delantera

				if($nc>0)

				{

					echo"CURSA AMBAS MATERIAS, <B> DAR DE BAJA  

							<a href='quitamat.php?matricula=$a->matricula&idh=$a->idh' target='_blank' title='Eliminar de horario e imprimir'>$m1->nommat</a></B>";

						} 

				echo"</td>

			</tr>



			"; 



    	}?>



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