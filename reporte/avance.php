<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		
		
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar, c.credito from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);


    
      $sumcred=0;
      $sumpro=0;
      $matecar="select * from posee where idcar='$ad->idcar' order by sem;";
      $maca=mysql_query($matecar,$conexion);$x=0;
      while($mc=mysql_fetch_object($maca))
      {
        //$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' and (h.idmat<>'SS')  order by h.periodo;"; //
        $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.periodo<>'$periodo' and h.idmat='$mc->idmat'  and (h.idmat<>'SS')  order by h.periodo;"; //
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
      
   

		?>
        <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  
        </div>
	</header>
	<?php 



  ?>
	
	<section id="seccion">
    
    <header id="header">
    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
     
			
      <div class="subtitulo2" align="center">CONSTANCIA DE AVANCE DE CARRERA</div>
      <br>
     <br>
    </header>

    <div id="avance" >
      <div style="clear: both; width: 100%;"></div>
    <P class="fecha"><?php echo"Ciudad de México , $fecha ";?></b></P>
    <br><br>
      <p>A QUIEN CORRESPONDA: </p>
      <br><br>
      <P>El que suscribe, Jefe del Departamento  de Servicios Escolares de este Instituto Tecnológico, hace constar que 
        el (la) <b><u><?php echo"$ad->app $ad->apm $ad->nom";?> </u></b>, alumno(a) de la carrera de <b><u><?php echo"$ad->descar";?> </u>
        con número de control: <u><?php echo"$matricula";?></u></b>, cuenta con el siguiente avance académico:</P>

        <br><br>
        <p>
          
          Porcentaje de avance: <b><?php 
          $ditos=$sumcred +5;
          $xavan=(($ditos*100)/$ad->credito);
          printf("%0.1f",$xavan); ?></b><br>
          Créditos acumulados: <b><?php  echo"$ditos";?></b> de un total de <b><?php echo"$ad->credito";?></b> que integran el plan de estudios <br>
          promedio General: <b> <?php  printf("%0.1f",$prom); ?> 
        </p>
        <br><br>
        <p>A petición del (la) interesado(a) y para los fines legales a que haya lugar, se extiende la presente en la Ciudad 
          de México a <u><b><?php echo"$fecha";?></u></b>.</p>

      <br><br>
      <P>
        Sin otro particular, le reitero un cordial saludo.
      </P>
      <br><br><br><br><br><br>
      <p><b>ATENTAMENTE</b></p>
      <p class="eslogan">Tecnología, Innovación y Desarrollo para una Formación Integral</p>
      <br><br><br><br>
      <p>LIC. PABLO CASTILLO CASTILLO <BR> JEFE DEL DEPTO. DE SERVICIOS ESCOLARES</p>
      <br><br>
      
      <p>C.p. Archivo</p>
	</section>
  

    

	<footer >
		<?php	//include "../pie.php";	?>
	</footer>
</div>
</body>
</html>