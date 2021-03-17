<?php  session_start();  ?>

<!DOCTYPE html >

<html>

<head>

<meta charset="UTF-8">

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>



<body>



	

<div id="cuerpo">

	<header>

		<?php 	include "../usuarios.php";	

		//$periodo=$_SESSION['periodo'];

	//echo"sesion: $quien <br>usuario: $usuario";

	$matricula=$_GET[matricula];

	$idh=$_GET[idh];

	$idmat=$_GET[idmat];

    $aut=$_GET[aut];

	$alumnosd="select * from alumnos where matricula='$matricula';";

	$alud=mysql_query($alumnosd,$conexion);

	$ad=mysql_fetch_object($alud);

	

	$hay="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$idmat' and h.periodo='$periodo'";

	$ha=mysql_query($hay,$conexion);

	$nh=mysql_num_rows($ha);

	

	$numero="select distinct matricula from cursa where idh='$idh';";

	$num=mysql_query($numero,$conexion);

	$n=mysql_num_rows($num);

	//echo"$n";

	$muestra=1;

	if($nh>0)

	{

		print"

				<script languaje='JavaScript'>

				alert('¡IMPOSIBLE cargar, ya se encuentra en su horario!');

				window.location.href='horario.php?matricula=$matricula';

				</script>

				";

	}

	

	/*COMIENZA A VALIDAR SERVICIO SOCIAL SI TIENE UN TOTAL DE CREDITOS   */

        if($idmat=='SS')
        {
            $alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar, c.credito from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
            $alud=mysql_query($alumnosd,$conexion);
            $ad=mysql_fetch_object($alud);
            $sumcred=0;
            $sumpro=0;
            $matecar="select * from posee where idcar='$ad->idcar' order by sem;";
            $maca=mysql_query($matecar,$conexion);$x=0;

            while($mc=mysql_fetch_object($maca))
            {
              $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' and (h.idmat<>'SS')  order by h.periodo;"; 
              $his=mysql_query($historia,$conexion);
              $nm=mysql_num_rows($his);
            if($nm>1)

            {
              $aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  order by c.idh desc LIMIT 0,1;";//
              $his=mysql_query($aprobados,$conexion);
            }

              while($h=mysql_fetch_object($his))
              {         
                $x++;
                    if($h->prom>=70)
                    {
                      $sumcred+=$h->credit;
                      $sumpro+=$h->prom;
                    } 
              }
          }

          $prom=0;
          $prom=$sumpro/$x;
          $ditos=$sumcred +5;
          $xavan=(($ditos*100)/$ad->credito);
          if($xavan<70)
            {
                echo"<div class='avisono'><a href='cursar.php?idh=$idh&idmat=$idmat&matricula=$matricula&aut=1' title='CARGAR DE TODAS FORMAS'>NO PUEDE CARGAR SERVICIO SOCIAL, CREDITOS: ";printf("%0.1f",$xavan); echo"% </a><br>Requisito: 70%</div>";
                $muestra=0;
            }
            else
            {
                echo"<div class='avisono'>CREDITOS: ";printf("%0.1f",$xavan); echo"%</div>";
            }
            if($aut==1) $muestra=1;

        }

    

    /*TERMINA VALIDACION DE TOTAL DE CREDITOS*/

    /*COMIENZA A VALIDA RESIDENCIA PROFESIONAL SI TIENE UN TOTAL DE CREDITOS   */

        if($idmat=='RESIDENCIA')

        {      

          $alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar, c.credito from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
          $alud=mysql_query($alumnosd,$conexion);
          $ad=mysql_fetch_object($alud);
          $sumcred=0;
          $sumpro=0;
          $matecar="select * from posee where idcar='$ad->idcar' order by sem;";
          $maca=mysql_query($matecar,$conexion);$x=0;
          while($mc=mysql_fetch_object($maca))
          {

            $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' and (h.idmat<>'SS')  order by h.periodo;"; //
            //$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  and (h.idmat<>'SS')  order by h.periodo;"; //

            $his=mysql_query($historia,$conexion);
            $nm=mysql_num_rows($his);
            if($nm>1)
            {
              $aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  order by c.idh desc LIMIT 0,1;";//
              $his=mysql_query($aprobados,$conexion);
            }

            

              while($h=mysql_fetch_object($his))
              {         
                $x++;
                if($h->prom>=70)
                {
                  $sumcred+=$h->credit;
                  $sumpro+=$h->prom;
                } 
              }
          }

          $prom=0;
          $prom=$sumpro/$x;
          $ditos=$sumcred +5;
          $xavan=(($ditos*100)/$ad->credito);
          if($xavan<80)
            {
              echo"<div class='avisono'><a href='cursar.php?idh=$idh&idmat=$idmat&matricula=$matricula&aut=1' title='CARGAR DE TODAS FORMAS'>NO PUEDE CARGAR RESIDENCIA PROFESIONAL, CREDITOS: ";printf("%0.1f",$xavan); echo"% </a><br>Requisito: 80%</div>";
                $muestra=0;
            }
            else
            {
                echo"<div class='avisono'>CREDITOS: ";printf("%0.1f",$xavan); echo"%</div>";

            }

            if($aut==1) $muestra=1;

        }

    

    /*TERMINA VALIDACION DE TOTAL DE CREDITOS*/
//INICIA VALIDACION DE MATERIA DE ESPECIALIDAD
    $mespecialidad="select m.idmat from materias as m, especialidad as e where m.idesp=e.idesp and e.status='1' and m.idmat='$idmat';";
    $mespe=mysql_query($mespecialidad,$conexion);
    $nmesp=mysql_num_rows($mespe);
    if($nmesp>0)
    {
      $alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar, c.credito from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
          $alud=mysql_query($alumnosd,$conexion);
          $ad=mysql_fetch_object($alud);
          $sumcred=0;
          $sumpro=0;
          $matecar="select * from posee where idcar='$ad->idcar' order by sem;";
          $maca=mysql_query($matecar,$conexion);$x=0;
          while($mc=mysql_fetch_object($maca))
          {

            $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' and (h.idmat<>'SS')  order by h.periodo;"; //
            //$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  and (h.idmat<>'SS')  order by h.periodo;"; //

            $his=mysql_query($historia,$conexion);
            $nm=mysql_num_rows($his);
            if($nm>1)
            {
              $aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  order by c.idh desc LIMIT 0,1;";//
              $his=mysql_query($aprobados,$conexion);
            }

            

              while($h=mysql_fetch_object($his))
              {         
                $x++;
                if($h->prom>=70)
                {
                  $sumcred+=$h->credit;
                  $sumpro+=$h->prom;
                } 
              }
          }

          $prom=0;
          $prom=$sumpro/$x;
          $ditos=$sumcred +5;
          $xavan=(($ditos*100)/$ad->credito);
          if($xavan<60)
            {
              echo"<div class='avisono'><a href='cursar.php?idh=$idh&idmat=$idmat&matricula=$matricula&aut=1' title='CARGAR DE TODAS FORMAS'>NO PUEDE CARGAR MATERIA DE ESPECIALIDAD, CREDITOS: ";printf("%0.1f",$xavan); echo"% </a> <br>Requisito: 60%</div>";
                $muestra=0;
            }
            else
            {
                echo"<div class='avisono'>CREDITOS: ";printf("%0.1f",$xavan); echo"%</div>";

            }

            if($aut==1) $muestra=1;

    }


//TERMINA VALIDACION DE MATERIAS DE ESPECIALIDAD

//INICIA VALIDACION NUMERO DE SEMIPRESENCIALES
if($ad->status<=6)
{
  $numerosemis="select c.idh from cursa as c, horario as h where h.idh=c.idh and c.matricula='$matricula' and h.periodo='$periodo' and c.opor='6';";
  $numesemis=mysql_query($numerosemis,$conexion);
  $nusemi=mysql_num_rows($numesemis);
  if($nusemi>1)
  {
    echo"<div class='avisono'>YA TIENE CARGADO 2 MATERIAS EN SEMIPRESENCIAL, NO SE MOSTRARÁ ESA OPCIÓN EN LA CARGA </div>";
  }
  //TERMINA VALIDACION NUMERO DE SEMIPRESENCIALES
}
else
{
  //INICIA VALIDACION NUMERO DE GLOBALES
  $numerosglob="select c.idh from cursa as c, horario as h where h.idh=c.idh and c.matricula='$matricula' and h.periodo='$periodo' and c.opor='4';";
  $numeglob=mysql_query($numerosglob,$conexion);
  $nuglobo=mysql_num_rows($numeglob);

  $numerosglobr="select c.idh from cursa as c, horario as h where h.idh=c.idh and c.matricula='$matricula' and h.periodo='$periodo' and c.opor='4';";
  $numeglobr=mysql_query($numerosglobr,$conexion);
  $nuglobor=mysql_num_rows($numeglobr);

  $nuglob=0;
  $nuglob=$nuglobo+$nuglobor;
  if($nuglob>1)
  {
    echo"<div class='avisono'>YA TIENE CARGADO 2 MATERIAS EN GLOBAL, NO SE MOSTRARÁ ESA OPCIÓN EN LA CARGA </div>";
  }
  //TERMINA VALIDACION NUMERO DE GLOBALES
}

	$horarios="select distinct d.nomdoc, m.nommat from horario as h, docente as d, materias as m where h.idoc=d.idoc and h.idmat=m.idmat and h.idh='$idh';";
	$hora=mysql_query($horarios,$conexion);
	$ho=mysql_fetch_object($hora);	

		?>

	</header>
	<section id="seccion">
    <?php 
        if($muestra==1) 
        {
    ?>

        <header id="header">
            <div class="subtitulo">Alta de materia a horario de alumno <?php echo"$periodo $p->descper"?></div>
            <br>
        </header>

        <div id="registros" >
        <form action="cursar2.php" name="cursar" method="post">
        <table>

            <tr>
                <td colspan="3" align="center"><label for="alumno"></label>
                <input name="alumno" type="text" id="alumno" size="45" readonly value="<?php echo"$ad->app $ad->apm $ad->nom / $ad->status ° Sem";?>"></td>
                <td width="98" align="center"><label for="idh" ></label>
                <input name="idh" type="text" id="idh" size="10" readonly value="<?php echo"$idh";?>"></td>
                <td colspan="4" align="center"><label for="textfield"></label>
                <input name="textfield" type="text" id="textfield" size="60" readonly value="<?php echo"$ho->nommat";?>"></td>
              <td colspan="3" align="center"><label for="textfield2"></label>
              <input name="textfield2" type="text" id="textfield2" size="40" readonly value="<?php echo"$ho->nomdoc";?>"></td>
            </tr>

            <tr>

                <th colspan="3" align="center">Alumno

                  <label for="matricula"></label>

                <input name="matricula" type="hidden" id="matricula" size="2" readonly value="<?php echo"$matricula";?>"></th>

                <th align="center">Horario</th>

                <th colspan="4" align="center">Materia</th>

                <th colspan="3">Docente</th>

            </tr>

            <tr>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td>&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>

                <td width="98">&nbsp;</td>             

            </tr>

             <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td colspan="4" align="center">
                  <select name="opor" id="opor">
                  <?php

        				  $saber="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$idmat' order by c.idh desc LIMIT 0,1;";
        				  $sab=mysql_query($saber,$conexion);
        				  $s=mysql_fetch_object($sab);
                  if($ad->status>=12)
                  {
          				  if(!empty($s->opor))
          				  {
          					 if($s->prom<70)
          					 {
            						if(($s->opor==1)||($s->opor==4))
                        {
                          echo"<option value='2'>REPETICION</option>";
                          if($nuglob<2)
                            echo"<option value='5'>GLOBAL REPETICION</option>";
                        }
            							
            						else
            						{
            							if(($s->opor==2)||($s->opor==5))
            								echo"<option value='3'>ESPECIAL</option>";	
            						}
          					 }
                    }
                    else
                    {
                      echo"<option value='1'>ORDINARIO</option>";
                      if($nuglob<2)
                        echo"<option value='4'>GLOBAL ORDINARIO</option>";  
                    }
                  }
                  else
                  {
                    if(!empty($s->opor))
                    {
                     if($s->prom<70)
                     {
                        if(($s->opor==1)||($s->opor==5)||($s->opor==6))
                          echo"<option value='2'>REPETICION</option>
                        <option value='3'>ESPECIAL</option>";
                        else
                        {
                          if(($s->opor==2)||($s->opor==5))
                            echo"<option value='3'>ESPECIAL</option>";  
                        }
                     }
                    }
                    else
                    {
                      echo"<option value='1'>ORDINARIO</option>";
                      if($nusemi<2)
                        echo"<option value='6'>SEMIPRESENCIAL</option>";  
                    }
                  }
				  
        	

				  
				  ?>

                </select></td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>             

            </tr>

           <tr>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <th colspan="4" align="center">Confirme si la OPORTUNIDAD es correcta</th>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>             

            </tr>

            <tr>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td>&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>             

            </tr>

            <tr>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="2" align="center" ><input type="submit" name="button" id="button" value="Cargar"></td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>

                <td >&nbsp;</td>             

            </tr>

        </table>

        </form>

      </div>

        <?php } ?>

	</section>

	<div style="clear: both; width: 100%;"></div>

	<footer >

		<?php	include "../pie.php";	?>

	</footer>

</div>

</body>

</html>