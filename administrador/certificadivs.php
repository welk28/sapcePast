<?php 
session_start();
include "../conexion.php";
$conexion=conectar();
$direccion="select des from control where id='6';";
$dire=mysql_query($direccion,$conexion);
$di=mysql_fetch_object($dire);
$ip=$di->des;
$usuario=$_SESSION['usuario'];
  $periodo=$_SESSION['periodo'];
$matricula=$_GET[matricula];

//echo "matricula: $matricula";
$fecha=date('d/m/Y');
    $director="select * from control where id=13";
    $dir=mysql_query($director,$conexion);
    $d=mysql_fetch_object($dir);
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, a.sexo, a.curp, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";

		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);

    $director="select e.iddepto, e.idoc, d.nomdoc from encarga as e, docente as d where d.idoc=e.idoc and e.iddepto='DIR';";
    $dir=mysql_query($director,$conexion);
    $di=mysql_fetch_object($dir);

    $escolares="select e.iddepto, e.idoc, d.nomdoc from encarga as e, docente as d where d.idoc=e.idoc and e.iddepto='SE';";
    $escol=mysql_query($escolares,$conexion);
    $se=mysql_fetch_object($escol);

    $formato="select * from certificado where matricula='$matricula';";
    $fo=mysql_query($formato,$conexion);
    $ft=mysql_fetch_object($fo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/certificadop.css">
  <title>Impresion de certificado</title>
</head>

<body>
  <div id="bodycertifica" >
    <!--INICIO Datos de titulo del certificado-->
    <div class="Dalumno" >
    EL C. <u><b>ING. HUGO ERNESTO CUELLAR CARREÓN</b></u>, DIRECTOR DEL INSTITUTO TECNOLÓGICO DE IZTAPALAPA II CLAVE <b>09DIT0005O</b>, CERTIFICA, QUE SEGÚN CONSTANCIAS QUE EXISTEN EN EL ARCHIVO ESCOLAR, 
    <?php if($ad->sexo=='M') echo" LA "; else echo" EL "; ?> C. <u><b><?php echo"$ad->app $ad->apm $ad->nom"; ?></b></u>, CON CURP <u><b><?php echo"$ad->curp"; ?></b></u>, CURSÓ LAS ASIGNATURAS QUE INTEGRAN EL PLAN DE ESTUDIOS DE <u><b><?php echo"$ad->descar"; ?></b></u> (PLAN-CRÉDITOS) DE <u><b><?php echo"$ft->periodo"; ?>.</b> <br> CON LOS RESULTADOS QUE A CONTINUACIÓN SE ENLISTAN.
    </div>
    <!--FIN Datos de titulo del certificado-->

    <!-- -->
    <aside class="lateral" >
    <?php echo"  <p align='center' >No. DE CONTROL <br><b>$matricula</b></p>"; ?> 
    <!-- se agrega esta clase para diferenciar la separacion del nero de control -->
    <div class="lateralespacio"></div>    

      <br><br><p align='center'>REGISTRADO EN EL <br> DEPARTAMENTO DE <br> SERVICIOS ESCOLARES</p>
      <br><br><p align="left" class="datos"> <?php echo"
        CON NO. $ft->numero<br>
        EN EL LIBRO $ft->libro<br>
        A FOJAS $ft->foja<br>
        FECHA $ft->fecha<br>"; ?>
      </p>
      <br><br>
      <p class="escolar" align="center" >
        <?php echo"LIC. PABLO CASTILLO <br>CASTILLO <br><b>JEFE DE DEPARTAMENTO <br>DE <br>SERVICIOS ESCOLARES</b>"; ?>
      </p>
    </aside>
    <!-- -->

    <!-- -->
    <section class="calificaciones">
      <table border="0" width="">
      <tr>
        <!-- EL TOTAL DEBE DSER DE 730px-->
        <th width="430"></th><!-- NOMBRE DE MATERIAS -->
        <th width="40"></th><!-- CALIF 1-->
        <th width="230"></th>   <!-- CALIF 2 incrementar para alinear o ajustar -->
      
      </tr>
      <?php
              $sumcred=0;
              $sumpro=0;
      //$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
              $matecar="select m.idmat, m.nommat from posee as p, materias as m where p.idmat=m.idmat and idcar='$ad->idcar' and (m.idmat<>'SS')order by m.nommat;";
              $maca=mysql_query($matecar,$conexion);$x=0;
              while($mc=mysql_fetch_object($maca))
              {
                $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and (h.idmat<>'SS') and (h.idmat<>'RESIDENCIA') and (h.idmat<>'ACTCOMPLE') ";
                $his=mysql_query($historia,$conexion);
                $nm=mysql_num_rows($his);
                if($nm>1)
                {
                  $aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and c.prom>='70';";
                  $his=mysql_query($aprobados,$conexion);
                }
                while($h=mysql_fetch_object($his))
                {         
                  $x++;
                  echo"
                  <tr>
                  <td>$h->nommat</td>
                  <td align='right'>";
                  if($h->prom>=70)
                  {
                    printf("%0.0f",$h->prom);
                    $sumcred+=$h->credit;
                    $sumpro+=$h->prom;
                  }
                  echo"</td>
                  <td align='right'>"; 
                    if($h->credit<10)
                        echo"0";
                  echo"$h->credit </td>
                  </tr>"; 
                }
              }
              $servsoc="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='SS';";
              $sers=mysql_query($servsoc,$conexion);
              $so=mysql_fetch_object($sers);
              $son=mysql_num_rows($sers);
              if($son<1)
              {
                print"<script>
                window.alert('No tiene AGREGADO de Servicio social, agregarlo');
                </script>";
              }
              else
              {
                if($so->prom<70)
                {
                 print"<script>
                 window.alert('verifique calificacion de Servicio social, NO TIENE');
                 </script>";
               }
             }
             $reside="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='RESIDENCIA';";
             $res=mysql_query($reside,$conexion);
             $resno=mysql_num_rows($res);
             $re=mysql_fetch_object($res);
             if($resno<1)
             {
              print"<script>
              window.alert('No tiene AGREGADO RESIDENCIA, agregarlo');
              </script>";
            }
            else
            {
              if($re->prom<70)
              {
                print"<script>
                window.alert('verifique calificacion de RESIDENCIA, NO TIENE');
                </script>";
              }
            }
            echo"<tr>
            <td>$so->nommat</td>
            <td align='right'>";

            if($so->prom<70) 
            {
              echo"<a href='agregar_a_grupo_modifica1.php?matricula=$matricula&idh=$re->idh&idcar=$ad->idcar' target='_blank'>NA </a>";
            }
            else
            {
              $certificado="select * from certificado where matricula='$matricula'";
              $certif=mysql_query($certificado,$conexion);
              $cer=mysql_fetch_object($certif);
              if($cer->inicial=='2014-1'){
                echo"ss $so->prom"; //se imprime el promedio de SS
              }
              
            }

            echo"</td>
            <td align='right'>$so->credit</td>
            </tr>
            <tr>
            
            <td>$re->nommat</td>
            <td align='right'>"; 
            if($re->prom<70) 
            {
              echo"<a href='agregar_a_grupo_modifica1.php?matricula=$matricula&idh=$re->idh&idcar=$ad->idcar' target='_blank'>NA </a>";
            }
            else
            {
              echo"$re->prom";
            }
            echo"</td>
            <td align='right'>$re->credit</td>
            </tr>
            <tr>
            
            <td>ACTIVIDADES COMPLEMENTARIAS</td>
            <td align='right'>AC</td>
            <td align='right'>05</td>
            </tr>";
            //se calcula el promedio con o sin SS
            $prom=0;
            $sumpro=$sumpro+$so->prom+$re->prom;
            $prom=$sumpro/($x+2);
            $sumcred=$sumcred+$so->credit+$re->credit+5;
            ?>
      </table>
    </section>
    <!-- -->
            <section class="promedio">
              <?php printf("%0.2f",$prom); ?>
            </section>
    <!-- -->
    <footer class="firma">
     <p> <?php echo"SE EXTIENDE EL PRESENTE CERTIFICADO QUE AMPARA <U>$sumcred</U> CRÉDITOS DE UN TOTAL DE <u>260</u> QUE INTEGRAN EL PLAN DE ESTUDIOS CLAVE <u>$ad->idcar </u> EN LA CIUDAD DE MÉXICO, $ft->fechaexp.";?></p>
    <br> <p align="center"> ING. HUGO ERNESTO CUELLAR CARREÓN <br> DIRECTOR</p>
    </footer>
  </div>
</body>
</html>