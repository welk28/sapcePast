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
		$fecha=date('d/m/Y');
    $depto=$_GET[depto];

    $per="select * from periodo where periodo='$periodo'";
    $pe=mysql_query($per,$conexion);
    $p=mysql_fetch_object($pe);
			?>
		<div class="subtitulo"><a href="javascript:window.print()"> Imprimir</a></div>
	</header>
	<section id="seccion" >
    <header id="header">
      <div id="revision">
        <br>
          <table  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="100px" rowspan="3"><img src="../img/logodgest.png" alt="dgest" width="130" height="60" /></td>
              <td width="800px" rowspan="2" align="left"><strong>Formato para el Reporte Final del Semestre por Competencias.</strong></td>
              <td width="180px" >C&oacute;digo:  SNEST-AC-PO-003-02 </td>
            </tr>
            <tr>
              <td>Revisi&oacute;n: 0 </td>
            </tr>

            <tr>

              <td align="left"><strong>Referencia a la Norma ISO 9001:2008 7.1, 7.2.1, 7.5.1, 7.6, 8.1,  8.2.4</strong></td>

              <td>P&aacute;gina 1 de 1 </td>

              </tr>

          </table><br><br><br><br>

      </div>

        <h1 align="center">INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</h1>

        <h1 align="center">SUBDIRECCIÓN ACADÉMICA</h1> <BR><BR>

        <table width="555" >

          <tr>

            <Td width="250px" align=""><b>DEPARTAMENTO DE:</b></td>

            <td><u><?php echo"$depto"; ?></u></td>

          </tr>

          <tr>

            <td ><b>REPORTE FINAL DEL SEMESTRE:</b></td>

            <td ><u><?php echo"$p->descper"; ?></u></td>

          </tr>

          <tr>

            <td><b>PERIODO: </b></td>

            <td><u><?php echo"$p->reporte"; ?></u></td>
          </tr>
         
        </table><br><br><br><br>

    </header>



      <div id="registrosrep" >

        <table>

            <tr>
              <th>No</th>
              <th width="300" rowspan="2">ASIGNATURA</th>

              <th width="300" rowspan="2">CARRERA</th>

              <th width="55" rowspan="2">A</th>

              <th colspan="2">B</th>

              <th width="55" rowspan="2">C%</th>

              <th width="55" rowspan="2">D</th>

              <th width="55" rowspan="2">E%</th>

              <th width="55" rowspan="2">F</th>

              <th width="55" rowspan="2">G%</th>

            </tr>

            <tr>

              <th width="55">PO</th>

              <th width="55">SO</th>

            </tr>

            <?php

              $lasmaterias="select m.idmat, h.idh, m.nommat, c.idcar, c.descar from materias as m, carrera as c, posee as p, horario as h where p.idcar=c.idcar and p.idmat=m.idmat and h.idmat=m.idmat and h.periodo='$periodo' and c.idcar='IADM-2010-213' order by m.nommat, h.idh;";

              $materias=mysql_query($lasmaterias,$conexion);

              $talumnos=0;

              $tprio=0;

              $tseo=0;

              $trep=0;

              $tdes=0;
              $xx=0;
              while($ma=mysql_fetch_object($materias))

              {
                $xx++;
                //ALUMNOS EN LA MATERIA: determinar el número de alumnos dentro de la materia

                $numals="select c.matricula from cursa as c, alumnos as a where c.matricula=a.matricula and a.idcar='$ma->idcar' and c.idh='$ma->idh';";

                $nual=mysql_query($numals,$conexion);

                $na=mysql_num_rows($nual); //numero de alumnos por materia



                //SEGUNDA OPORTUNIDAD: determinar a los alumnos que han aprobado en segunda oportunidad

                $seguopo="select distinct c.matricula from cursa as c, alumnos as a where c.matricula=a.matricula and a.idcar='$ma->idcar' and ((so1>=70) or (so2>=70) or (so3>=70) or (so4>=70) or (so5>=70) or (so6>=70) or (so7>=70) or (so8>=70) or (so9>=70)) and (prom>=70) and idh='$ma->idh'";

                $seguo=mysql_query($seguopo,$conexion);

                $nso=mysql_num_rows($seguo);



                //REPROBADOS: determinar el numero de estudiantes reprobados

                $reproba="select distinct c.matricula from cursa as c, alumnos as a where c.matricula=a.matricula and a.idcar='$ma->idcar' and prom<70 and idh='$ma->idh';";

                $repro=mysql_query($reproba,$conexion);

                $nor=mysql_num_rows($repro); //numero de reprobados



                //DESERTADOS: determinar el numero de estudiantes desertados

                $desertados="select distinct c.matricula from cursa as c, alumnos as a where c.matricula=a.matricula and a.idcar='$ma->idcar' and deser='1' and idh='$ma->idh';";

                $deser=mysql_query($desertados,$conexion);

                $nd=mysql_num_rows($deser);//numero de desertados



                if($na>0)

                {

                //aprobados en primera oportunidad 

                $popo=0;

                $popo=$na-($nso+$nor); //alumnos en primera oportunidad



                //porcentaje de aprobados

                $porap=0;

                $porap=($nor*100)/$na;



                //porcentaje no acreditado

                $porrep=0;

                $porrep=100-$porap;



                //porcentaje desertados

                $pordes=0;

                $pordes=($nd*100)/$na;

                

                //TOTALES

                  $talumnos+=$na;

                  $tprio+=$popo;

                  $tseo+=$nso;

                  $trep+=$nor;

                  $tdes+=$nd;

                  

                echo"

                <tr>
                  <td>$xx</td>
                  <td >$ma->idh / $ma->nommat</td>

                  <td>$ma->descar</td>

                  <td align='center'>$na</td>

                  <td align='center'>$popo</td>

                  <td align='center'>$nso</td>

                  <td align='center'>"; printf("%0.1f",$porrep); echo"</td>

                  <td align='center'>$nor</td>

                  <td align='center'>"; printf("%0.1f",$porap); echo"</td>

                  <td align='center'>$nd</td>

                  <td align='center'>"; printf("%0.1f",$pordes); echo"</td>

                </tr>";

              }

            }

        ////totales de reporte

        $toporrep=0;



        $toporrep=($trep*100)/$talumnos; 

        $tea=100-$toporrep;

        $toedes=0;

        $toedes=($tdes*100)/$talumnos;

        echo"

          <tr>
            
            <td colspan='3'>TOTALES</td>     
            <td align='center'>$talumnos</td>
            <td align='center'>$tprio</td>

            <td align='center'>$tseo</td>

            <td align='center'>"; printf("%0.1f",$tea); echo"</td>

            <td align='center'>$trep</td>

            <td align='center'>"; printf("%0.1f",$toporrep); echo"</td>

            <td align='center'>$tdes</td>

            <td align='center'>"; printf("%0.1f",$toedes); echo"</td>

          </tr>

        </table> ";

        ?> 

        <br><br>

        

        <div class="reportedatos">

          <table >

            <tr>

              <td>A    = TOTAL DE ESTUDIANTES POR MATERIA</td>

            </tr>

            <tr>

              <td >B = No. DE    ESTUDIANTES ACREDITADOS (O=ORDINARIO, R= REGULARIZACI&Oacute;N, EX=EXTRAORDINARIO</td>

            </tr>

            <tr>

              <td >C = % DE ESTUDIANTES    ACREDITADOS</td>

            </tr>

            <tr>

              <td >D = No. DE    ESTUDIANTES NO ACREDITADOS&nbsp;</td>

            </tr>

            <tr>

              <td >E = % DE ESTUDIANTES    NO ACREDITADOS</td>

            </tr>

            <tr>

              <td >F = No. DE    ESTUDIANTES QUE DESERTARON DURANTE EL SEMESTRE EN LA MATERIA</td>

            </tr>

            <tr>

              <td>G = % DE ESTUDIANTES    QUE DESERTARON EN LA MATERIA</td>

            </tr>

          </table>

          <table>

            <tr>

              <td>1. Los estudiantes que se incluir&aacute;n en la columna D son todos los    estudiantes no acreditados incluyendo los desertores.</td>

            </tr>

            <tr>

              <td>>Entendiendo como estudiante desertor al que toma    la decisi&oacute;n de no presentar ex&aacute;menes de segunda oportunidad aun teniendo derecho a ellos.</td>

            </tr>

            <tr>

              <td>2. Este registro deber&aacute; de acompa&ntilde;arse con sus    respectivos instrumentos de evaluaci&oacute;n y&nbsp;    listas de calificaciones que avalen los datos aqu&iacute; presentados.</td>

            </tr>

          </table>

<br><br><br>

           <table class="reportedatos">

            <tr>

              <td width="35%" height="48" class="Estilo5"><div align="center">DOCENTE</div></td>

              <td width="32%" class="Estilo5">&nbsp;</td>

              <td width="33%" class="Estilo5"><div align="center">JEFE(A) DEL AREA ACAD&Eacute;MICA </div></td>

            </tr>

            <tr>

              <td valign="bottom"><hr color="#000000" /></td>

              <td>&nbsp;</td>

              <td valign="bottom"><hr color="#000000" /></td>

            </tr>

            <tr>

              <td align="center"><span class="Estilo20"><?php echo"$pr->nomdoc";?></span></td>

              <td>&nbsp;</td>

              <td><div align="center" class="Estilo20">

              <?php

                if($depto=="INGENIERIAS")

                {

                  //echo"LIC.  MAR&Iacute;A VACA PARRA";

                }

                else

                {

                  if($depto=="CIENCIAS BASICAS")

                  {

                    echo"QUIM. ENRIQUE CAÑEDA GUZMAN";

                  }

                  else

                  {

                    //echo"ING. MICHEL LÓPEZ CELAYA";

                  }

                }



              ?>



              </div></td>

            </tr>

          </table>

        </div>





      </div>

     

  </section>

  

	<div style="clear: both; width: 100%;"></div>

  

	<footer >

		<table>

        	<tr>

           	  <td width="200"><?php echo"SNEST-AC-PO-003-02";?></td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="75">&nbsp;</td>

              <td width="200" align="right">Rev. O</td>

                           

          </tr>

            

      </table>

	</footer>

</div>

</body>

</html>