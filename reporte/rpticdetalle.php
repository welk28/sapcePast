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
		$idoc=$_GET[idoc];
		$fecha=date('d/m/Y');
    $docentes="select * from docente where idoc='$idoc';";
    $docen=mysql_query($docentes,$conexion);
    $doc=mysql_fetch_object($docen);

    $depto=$_GET[depto];
    $per="select * from periodo where periodo='$periodo'";
    $pe=mysql_query($per,$conexion);
    $p=mysql_fetch_object($pe);
    $prof="select * from docente where idoc='$idoc'";
    $pro=mysql_query($prof,$conexion);
    $pr=mysql_fetch_object($pro);
			?>

			

		<div class="subtitulo"><a href="javascript:window.print()"> Imprimir</a></div>

	</header>

	<section id="seccion" >

    <header id="header">
        <h1 align="center">INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</h1>

        <h1 align="center">SUBDIRECCIÓN ACADÉMICA</h1> 
        <h1 align="center">DETALLE APROBACION ING. EN TIC'S</h1> 
        <?php echo"<h1 align='center'>PERIODO $periodo</h1> "; ?><BR><BR>
        
        <br><br><br><br>

    </header>



      <div id="registrosrep" >

        <table>

            <tr>
              <th width="" rowspan="2">N</th>
              <th width="300" rowspan="2">ASIGNATURA</th>
              <th width="55" rowspan="2">A</th>
              <th colspan="2">B</th>
              <th width="55" rowspan="2">C%</th>
              <th width="55" rowspan="2">C%H</th>
              <th width="55" rowspan="2">C%M</th>
              <th width="55" rowspan="2">D</th>
              <th width="55" rowspan="2">E%</th>
              <th width="55" rowspan="2">E%H</th>
              <th width="55" rowspan="2">E%M</th>
              <th width="55" rowspan="2">F</th>
              <th width="55" rowspan="2">G%</th>
            </tr>
            <tr>

              <th width="55">PO</th>
              <th width="55">SO</th>

            </tr>

            <?php
              $horario="select g.idg, h.idh, h.idmat,p.sem, h.idoc, h.cupo,  p.idcar, d.nomdoc, m.nommat from encarre as e, hgrupo as g, horario as h, posee as p, docente as d, materias as m where e.idg=g.idg and e.idcar=p.idcar and g.idh=h.idh and p.idmat=m.idmat and h.idmat=m.idmat and d.idoc=h.idoc and p.idmat=h.idmat and p.idcar='ITIC-2010-225' and h.periodo='$periodo' order by g.idg, p.sem;";
              $hora=mysql_query($horario,$conexion);
              $talumnos=0;
              $tprio=0;
              $tseo=0;
              $trep=0;
              $tdes=0;

              $x=0;
              while($h=mysql_fetch_object($hora))
              {
                $x++;
                //ALUMNOS EN LA MATERIA: determinar el número de alumnos dentro de la materia
                $numals="select c.matricula from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh';";
                $nual=mysql_query($numals,$conexion);
                $na=mysql_num_rows($nual); //numero de alumnos por materia

                // -------------------------------------------------------------------------------


                 //PRIMERA OPORTUNIDAD: determinar a los alumnos que han aprobado en segunda oportunidad

                $primeopo="select matricula, pso from cursa where idh='$h->idh' and pso='1';";
                $prio=mysql_query($primeopo,$conexion);
                $popo=mysql_num_rows($prio);

                //SEGUNDA OPORTUNIDAD: determinar a los alumnos que han aprobado en segunda oportunidad

                $seguopo="select matricula, pso from cursa where idh='$h->idh' and pso='2';";
                $seguo=mysql_query($seguopo,$conexion);
                $nso=mysql_num_rows($seguo);

                

                //DESERTADOS: determinar el numero de estudiantes desertados
                $desertados="select distinct c.matricula from cursa as c, alumnos as a where c.matricula=a.matricula and deser='1' and idh='$h->idh';";
                $deser=mysql_query($desertados,$conexion);
                $nd=mysql_num_rows($deser);//numero de desertados
                //porcentaje desertados

                $pordes=0;

                $pordes=($nd*100)/$na;


                //ALUMNOS HOMBRES APROBADOS
                $aphombre="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and c.prom>=70 and a.sexo='H';";
                $apho=mysql_query($aphombre,$conexion);
                $hap=mysql_num_rows($apho);

                 //ALUMNOS mujeres APROBADOS
                 $apmujer="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and c.prom>=70 and a.sexo='M';";
                 $apmu=mysql_query($apmujer, $conexion);
                $map=mysql_num_rows($apmu);

                $aprobados="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and c.prom>='70';";
                $aprob=mysql_query($aprobados,$conexion);
                $nap=mysql_num_rows($aprob);

                $porap=($nap*100)/$na;

                $nanac=$na-$nap;


                //porcentaje de alumnos hombres aprobados
                $numhombres="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and a.sexo='h';";
                $numhom=mysql_query($numhombres,$conexion);
                $nuh=mysql_num_rows($numhom);

                $phac=($hap*100)/$nuh;


                //porcentaje de alumnos mujeres aprobadas
                $nummujeres="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and a.sexo='m';";
                $nummuj=mysql_query($nummujeres,$conexion);
                $numm=mysql_num_rows($nummuj);

                $pmac=($map*100)/$numm;

                //porcentaje de alumnos no acreditados
                $panoacred=($nanac*100)/$na;  

                // //ALUMNOS HOMBRES REPROBADOS
                $rehombre="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and c.prom<70 and a.sexo='H';";
                $reho=mysql_query($rehombre,$conexion);
                $hre=mysql_num_rows($reho);

                 //ALUMNOS mujeres REPROBADOS
                 $remujer="select c.matricula, c.prom, a.sexo from cursa as c, alumnos as a where c.matricula=a.matricula and c.idh='$h->idh' and c.prom<70 and a.sexo='M';";
                 $remu=mysql_query($remujer, $conexion);
                $mre=mysql_num_rows($remu);

                //porcentaje de hombres reprobados
                 $phre=($hre*100)/$nuh;

                //porcentaje de mujeres reprobados
                 $pmre=($mre*100)/$numm;
                echo"
                <tr>
                  <td >$x</td>
                  <td >$h->nommat / $h->idh</td>
                  <td align='center'>$na</td>
                  <td align='center'>$popo</td>
                  <td align='center'>$nso</td>
                  <td align='center'>"; printf("%0.1f",$porap); echo"</td>
                  <td align='center'>$hap /"; printf("%0.1f",$phac);  echo"</td>
                  <td align='center'>$map / "; printf("%0.1f",$pmac);  echo"  </td>
                  <td align='center'>$nanac</td>
                  <td align='center'>"; printf("%0.1f",$panoacred); echo"</td>
                  <td align='center'>$hre / "; printf("%0.1f",$phre); echo"</td>
                  <td align='center'>$mre /"; printf("%0.1f",$pmre); echo"</td>
                  <td align='center'>$nd</td>
                  <td align='center'>"; printf("%0.1f",$pordes); echo"</td>
                </tr>";

            }
        echo"
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

              <td >C%H = NO Y % DE HOMBRES ACREDITADOS</td>
              
            </tr>
             <tr>

              <td >C%M = NO Y % DE MUJERES  ACREDITADOS</td>
              
            </tr>
            <tr>

              <td >D = No. DE    ESTUDIANTES NO ACREDITADOS&nbsp;</td>

            </tr>

            <tr>

              <td >E = % DE ESTUDIANTES    NO ACREDITADOS</td>

            </tr>
            <tr>

              <td >E%H = NO Y % DE HOMBRES NO ACREDITADOS</td>

            </tr>
            <tr>

              <td >E%M = NO Y % DE MUJERES NO ACREDITADOS</td>

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

		

	</footer>

</div>

</body>

</html>