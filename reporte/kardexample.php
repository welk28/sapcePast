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
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);
		?>
        <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  <?php echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>
<a href='horalumno.php?matricula=$matricula' title='HORARIO'>Horario</a>";
if($ses==2)
{
  echo"<a href='reticula_calificacion.php?matricula=$matricula&idcar=$ad->idcar' target='_blank'>Retícula</a>";
}
       echo" ";?>
        </div>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
    	<table >
          <tr>
            <td width="368" rowspan="2"><img src="../css/logo_footer.png" width="201" height="71" /></td>
            <!-- <td width="602" align="right"><img src="../img/logodgest.png" width="114" height="65" /></td> -->
          </tr>
          <tr>
            <td align="right"><b>TECNOLÓGICO NACIONAL DE MÉXICO</b><br />
            Instituto Tecnológico de Iztapalapa II</td>
          </tr>
          <tr>
          	<td colspan="2" align="center"><?php echo"$emble";?></td>
          </tr>
      </table>
     
			
      
      
    </header>

    <div id="registros" >
  
      <?php
  		$sumcred=0;
  		$sumpro=0;
  		$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
  		$maca=mysql_query($matecar,$conexion);$x=0;
  		while($mc=mysql_fetch_object($maca))
  		{
  			$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  order by h.periodo;"; //and h.periodo!='$periodo'
  			$his=mysql_query($historia,$conexion);
  			$nm=mysql_num_rows($his);
  			
  			if($nm>1)
  			{
  				$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat'  order by c.idh desc LIMIT 0,1;";//and h.periodo!='$periodo'
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
  		echo"$sumcred</td>";printf("%0.1f",$prom); 
    ?>    
	</section>
  
	<div style="clear: both; width: 100%;"></div>
    <div id="espacio"></div>
    <?php 
  if(($ses==2)||($ses==4)||($ses==5))
    {
    echo"
      <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
        <table>

          <tr>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td colspan='4' align='center'>__________________________<br>
              Lic. PABLO CASTILLO CASTILLO <br>DEPARTAMENTO DE SERVICIOS ESCOLARES</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              
          </tr>
            
      </table>";
  
    }
  ?>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>