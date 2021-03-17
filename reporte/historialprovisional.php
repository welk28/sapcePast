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
		$a->matricula="141090094";
		$fecha=date('d/m/Y');
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$a->matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);
		?>
        
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
    	
     
			
      <div class="subtitulo2" align="center">HISTORIAL DE CALIFICACIONES</div>
      <br>
      
    </header>

    <div id="registros" >
 
    	
      <?php
  		$sumcred=0;
  		$sumpro=0;
  		$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
  		$maca=mysql_query($matecar,$conexion);$x=0;
  		while($mc=mysql_fetch_object($maca))
  		{
  			$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' order by h.periodo;";
  			$his=mysql_query($historia,$conexion);
  			$nm=mysql_num_rows($his);
  			
  			if($nm>1)
  			{
  				$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' order by c.idh desc LIMIT 0,1;";
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
  		printf("%0.1f",$prom); 
    ?>    
	</section>
  
	<div style="clear: both; width: 100%;"></div>
    <div id="espacio"></div>
    
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>