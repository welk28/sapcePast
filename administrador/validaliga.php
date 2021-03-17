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

	

	

  //DETERMINAR SI LA MATERIA TIENE LIGAS

   $tieneliga="select p.nop from prerequi as p where p.idmat='$idmat' and p.idcar='$ad->idcar';";	

   $tienel=mysql_query($tieneliga,$conexion);

   $tie=mysql_fetch_object($tienel);

   $nl=mysql_num_rows($tienel);

   if($nl==0)

   {

      //echo"NO TIENE LIGAS, PASAR A cursar.php con los mismos datos <BR> <a href='cursar.php?idh=$idh&idmat=$idmat&matricula=$matricula&idcar=$ad->idcar' target='_self'>Agre  </a>";

      print"

        <script languaje='JavaScript'>

          window.location.href='cursar.php?idh=$idh&idmat=$idmat&matricula=$matricula&idcar=$ad->idcar';

        </script>";

   }

   else

   {

      echo"TIENE EL NUMERO DE LIGA $tie->nop Y SON: ";

      $mateliga="select l.nop, l.idmat, p.sem  from listapre as l, posee as p where p.idmat=l.idmat and p.idcar='$ad->idcar' and l.nop='$tie->nop' order by p.sem asc;";

      $mali=mysql_query($mateliga,$conexion);

      while($ml=mysql_fetch_object($mali))

      {

        $nombremat="select * from materias where idmat='$ml->idmat';";
        $nommat=mysql_query($nombremat,$conexion);
        $noma=mysql_fetch_object($nommat);
        //VERIFICAR SI TIENE CARGADA MATERIAS AL MISMO TIEMPO

        $cursando="select c.prom from cursa as c, horario as h where h.idh=c.idh and c.matricula='$matricula' and h.idmat='$ml->idmat' and h.periodo='$periodo';";
        $cursa=mysql_query($cursando,$conexion);
        $nc=mysql_num_rows($cursa);

        if($nc>0)

        {

          //echo"<br>, <B> IMPOSIBLE CARGAR MATERIA  LIGADA</B> ";

          echo"<div class='avisono'><a href='horalumno.php?matricula=$matricula'>TIENE ACTUALMENTE CARGADA <b> $noma->nommat</b>, ¡IMPOSIBLE CARGAR MATERIA  LIGADA!, Explore retícula</a></div>";

          exit();

        }

        else

        {

          //VERIFICAR SI HA CURSADO LAS MATERIAS ANTERIORES LIGADAS

          $nocursa="select c.prom from cursa as c, horario as h where h.idh=c.idh and c.matricula='$matricula' and h.idmat='$ml->idmat' and h.periodo<>'$periodo';";

          $nocu=mysql_query($nocursa,$conexion);

          $noc=mysql_num_rows($nocu);

          //HA CURSADO

          

          //echo"<br>nop: $ml->nop <br> idmat: $ml->idmat <br> sem: $ml->sem <br><br> $noma->nommat";

          if($noc>0)

          {

            $aprob=0;

            while($rp=mysql_fetch_object($nocu))

            {

              //echo"<BR> Promedio $rp->prom -- <br>";

              if($rp->prom>=70)

                $prom++;

            }

            if($prom<1) 

              {

                //echo"REPROBO $noma->nommat,  IMPOSIBLE CARGAR MATERIA " ;

                echo"<div class='avisono'><a href='horalumno.php?matricula=$matricula'>REPROBO <b>$noma->nommat</b>, IMPOSIBLE CARGAR MATERIA, Explore retícula</a></div>";

                exit();

                /*print"

                <script languaje='JavaScript'>

                alert('REPROBO $noma->nommat, IMPOSIBLE CARGAR MATERIA, Explore retícula');

                window.location.href='horalumno.php?matricula=$matricula';

                </script>

                ";*/

              }

              else

              {

                 print"

                <script languaje='JavaScript'>

                  window.location.href='cursar.php?idh=$idh&idmat=$idmat&matricula=$matricula&idcar=$ad->idcar';

                </script>";

              }

          }

          else

          {

            //echo"NO HA CURSADO $noma->nommat <B> IMPOSIBLE CARGAR MATERIA </B>";

            //

            echo"<div class='avisono'><a href='horalumno.php?matricula=$matricula'>NO HA CURSADO <b>$noma->nommat</b>, IMPOSIBLE CARGAR MATERIA LIGADA, Explore retícula</a></div>";

             exit();

             /*print"

                <script languaje='JavaScript'>

                alert('NO HA CURSADO $noma->nommat, IMPOSIBLE CARGAR MATERIA LIGADA, Explore retícula');

                window.location.href='horalumno.php?matricula=$matricula';

                </script>

                ";*/

          }

        }

      }

   }

		?>

	</header>

	<section id="seccion">

    

      </div>

        

	</section>

	<div style="clear: both; width: 100%;"></div>

	<footer >

		<?php	include "../pie.php";	?>

	</footer>

</div>

</body>

</html>