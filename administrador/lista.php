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

		$idh=$_GET[idh];

		$docente="select h.idoc, d.nomdoc, m.nommat from horario as h, docente as d, materias as m where h.idoc=d.idoc and h.idmat=m.idmat and h.idh='$idh';";

		$doc=mysql_query($docente,$conexion);

		$do=mysql_fetch_object($doc);

			?>

	</header>

	<section id="seccion">

     <header id="header">

     <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>    </div>

            <table width="555" align="center">

            <tr>

            	<th><img src="<?php echo"$ip/img/logoSEP_hoz.png"; ?>" width="190" height="60" border="0" />

            	<img src="<?php echo"$ip/img/separador.png"; ?>" width="10" height="60" /></th>

              	<th colspan="2" align="center">Instituto Tecnológico de Iztapalapa II</th>

              	<th><!--<img src="$iP/img/logodgest.png " width="89" height="46" /> -->

                    <img  src="<?php echo"$ip/img/logoregistradotec.png"; ?>" width="64" height="46" /></div></th>

            </tr>

              <tr>

                <td>Docente:</td>

                <td><u><?php echo"$do->nomdoc"; ?></u></td>

                <td width="21%">PERIODO:</td>

                <td width="24%"><u><?php echo"$p->descper"; ?></u></td>

              </tr>

              <tr>

                <td width="24%">Materia:</td>

                <td width="31%"><u><?php echo"$do->nommat"; ?></u></td>

                <td>Grupo:</td>

                <td><u><?php 

				$grupos="select * from hgrupo where idh='$idh';";

				$gru=mysql_query($grupos,$conexion);

				while($g=mysql_fetch_object($gru))

				{

					echo"$g->idg "; 

				}

				?></u></td>

              </tr>

              

            </table><br>

      </header>

    <section id='lista'>

    

    	<table>

        	<tr>

            	<th align="center">No</th>

                <th align="center">O</th>

                <th align="center">R</th>

                <th align="center">E</th>

                <th align="center">G</th>
                <th align="center">G</th>

                <th align="center">S</th>

                <th align="center">Ctrl</th>

                <th align="center">Nombre</th>

                

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

            </tr>

            <?php

				$alumnos="select distinct c.matricula, c.opor, a.app, a.apm, a.nom, a.status from alumnos as a, cursa as c where a.matricula=c.matricula and c.idh='$idh' order by a.app, a.apm, a.nom;";

				$alum=mysql_query($alumnos,$conexion);

				$n=0;

				while($a=mysql_fetch_object($alum))

				{$n++;

					echo"

					<tr>

					<td width='25px' align='center'>$n </td>";

					if($a->opor==1)

						echo"<td width='25px' align='center'>x</td>";

					else

						echo"<td width='25px' align='center'></td>";

					

					

					if($a->opor==2)

						echo"<td width='20px' align='center'>x</td>";

					else

						echo"<td width='20px' align='center'></td>";

					

					if($a->opor==3)

						echo"<td width='20px' align='center'>x</td>";

					else

						echo"<td width='20px' align='center'></td>";

					

					if(($a->opor==4)||($a->opor==5))

						echo"<td width='20px' align='center'>x</td>";

					else

						echo"<td width='20px' align='center'></td>";

					
					if($a->opor==6)

						echo"<td width='20px' align='center'>x</td>";

					else

						echo"<td width='20px' align='center'></td>";

					echo"

					<td width='20px' align='center'>$a->status </td>

					<td width='90px' align='center'>$a->matricula </td>

					<td width='300px'>$a->app $a->apm $a->nom </td>

					

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					<td width='25px'></td>

					</tr>

					";

				}

			?>

           </table>

    

    </section>

    

</section>

 

<div style="clear: both; width: 100%;"></div>

     <div id="espacio"></div>

<footer >

		

	</footer>

</div>



</body>

</html>