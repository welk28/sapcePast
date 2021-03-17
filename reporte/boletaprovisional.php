<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
</head>

<body>
<div id="cuerpo">
	 <header id="cabecera">
		<?php 	include "../usuarios.php";	
		
		
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		$matricula="141090163";
		$fecha=date('d/m/Y');
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);
		?>
       
        <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  <?php echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>";?>
        </div>
	</header>
	
	
<section id="seccion">
    
    <header id="header">
    	
        
    </header>

    <div id="registros" >
    <table>
    	
        <?php
		$sumcred=0;
		$sumpro=0;
		$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
		$maca=mysql_query($matecar,$conexion);$x=0;
		while($mc=mysql_fetch_object($maca))
		{
			$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and h.periodo='$periodo' order by h.periodo;";
			$his=mysql_query($historia,$conexion);
			$nm=mysql_num_rows($his);
			
			if($nm>1)
			{
				$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' order by c.idh desc LIMIT 0,1;";
				$his=mysql_query($aprobados,$conexion);
				
			}
			
				while($h=mysql_fetch_object($his))
				{					
					$x++;
					$semestre="select * from posee where idcar='$ad->idcar' and idmat='$mc->idmat';";
					$seme=mysql_query($semestre,$conexion);
					$se=mysql_fetch_object($seme);
						
							
							if($h->prom>=70)
							{
								printf("%0.1f",$h->prom);
								$sumcred+=$h->credit;
								$sumpro+=$h->prom;
							}
							
							
				}
			
			
		}
		$prom=0;
		$prom=$sumpro/$x;
		echo"
		<tr>
							<td></td>
							<td></td>
							<td></td>
							<td align='right'>Total de créditos aprobados</td>
							<td align='center'>$sumcred</td>
							<td align='right'>";printf("%0.1f",$prom); echo"</td>
							<td></td>
						</tr>";
		?>
    </table>
	</div>
  <p>&nbsp;</p>
        <table>
        	<tr>
           	  <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="392" align="center"><img src="../img/pablofirma.png" width="297" height="144"></td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
            
          </tr>
            
      </table>
	</section>
    
	<div style="clear: both; width: 100%;"></div>
    <div id="espacio"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>