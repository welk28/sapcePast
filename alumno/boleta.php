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
		<?php 	include "usuarios.php";			
		$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$usuario';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);

		 $buscadeuda="select a.matricula, a.app, a.apm, a.nom, a.status, a.idcar, d.fecha, d.descrip, p.nombre from alumnos as a, adeuda as d, depto as p where d.iddepto=p.iddepto and a.matricula=d.matricula and d.status='1' and a.matricula='$usuario'";
	    $buscad=mysql_query($buscadeuda,$conexion);
	    $nbd=mysql_num_rows($buscad);
	    $deuda=mysql_fetch_object($buscad);
	    if($nbd>0)
	    {
	      print"
	      <script languaje='JavaScript'>
	        window.alert('IMPOSIBLE MOSTRAR BOLETA a $usuario, adeuda con al menos $deuda->nombre, Contactar a Recursos Financieros rf_iztapalapa2@tecnm.mx' );
	        window.location.href='cerrarsesion.php';
	      </script>";  
	    }
	    else
	    {
		?>
	</header>

<section id="seccion">
    <header id="header">
    	<table >
          <tr>
            <td width="368" rowspan="2"><img src="../css/logo_footer.png" width="201" height="71" /></td>
            <td width="602" align="right"><!--<img src="../img/logodgest.png" width="114" height="65" />--></td> 
          </tr>
          <tr>
            <td align="right"><b> TECNOLÓGICO NACIONAL DE MÉXICO</b> <br />
              Instituto Tecnológico de Iztapalapa II</td>
          </tr>
          <tr>
          	<td colspan="2" align="center"><?php echo"$emble";?></td>
          </tr>
        </table>
         <p>&nbsp;</p><p>&nbsp;</p> <p>&nbsp;</p>
			<div class="subtitulo2" align="center">Boleta de calificaciones correspondiente al periodo: <?php echo"$en->descper <br><br>"?></div>

        <br>
        <table>
              <tr>
                <td>FECHA:</td>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <td width="24%">N&Uacute;MERO DE CONTROL:</td>
                <td width="31%"><u><?php echo"$usuario"; ?></u></td>
                <td>PERIODO:</td>
                <td><u><?php echo"$p->descper"; ?></u></td>
              </tr>
              <tr>
                <td>ESTUDIANTE:</td>
                <td><u><?php echo"$ad->app $ad->apm $ad->nom"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>SEMESTRE:</td>
                <td><u><?php echo"$ad->status"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CARRERA:</td>
                <td><u><?php echo"$ad->descar"; ?></u></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"$ad->idcar"; ?></u></td>
                <td>ESPECIALIDAD:</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <!--<td>&nbsp;</td>-->
              </tr>
      </table><br><br>
    </header>
    <div id="boleta" >
    <table>
    	<tr>
        	<th width="21">No</th>
            <th width="104">idh</th>
            <th width="58">Sem</th>
            <th width="524">Materia</th>
            <th width="43">Cr</th>
            <th width="58">CALIF</th>
            <th width="101">Oportunidad</th>
            <!--<th width="83">Yyyy</th>-->
        </tr>
        <?php
		$sumcred=0;
		$sumpro=0;
		$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
		$maca=mysql_query($matecar,$conexion);$x=0;
		while($mc=mysql_fetch_object($maca))
		{
			$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$usuario' and h.idmat='$mc->idmat' and h.periodo='$periodo' and (h.idmat<>'SS') order by h.periodo;";
			$his=mysql_query($historia,$conexion);
			$nm=mysql_num_rows($his);
	
			if($nm>1)
			{
				$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$usuario' and h.idmat='$mc->idmat' order by c.idh desc LIMIT 0,1;";

				$his=mysql_query($aprobados,$conexion);		
			}
				while($h=mysql_fetch_object($his))
				{					
					$x++;
					$semestre="select * from posee where idcar='$ad->idcar' and idmat='$mc->idmat' ;";
					$seme=mysql_query($semestre,$conexion);
					$se=mysql_fetch_object($seme);
						echo"
						<tr>
							<td align='center'>$x</td>
							<td>$h->idh/$h->idmat</td>
							<td align='center'>$se->sem</td>
							<td>$h->nommat</td>
							<td align='center'>$h->credit</td>
							<td align='right'><b>";
							if($h->prom>=70)
							{
								printf("%0.1f",$h->prom);
								$sumcred+=$h->credit;
								$sumpro+=$h->prom;
							}
							else
							{echo"NA";}
							echo"</b></td>
							<td align='center'>";
							if($h->prom>=70)
							{
								echo"Acreditó";
							}
							else
							{
								if(($h->opor==1)||($h->opor==4))
									echo"REPETICIÓN";
								else
								{
									if(($h->opor==2)||($h->opor==5))
										echo"ESPECIAL";	
									else
									{
										if($h->opor==3)
											echo"BAJA DEFINITIVA";
										else
										{
											if($h->opor==4)
												echo"ESPECIAL";
										}
									}
								}	
						
							}
							echo"</td>
						</tr>
						"; 
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
<?php } ?>
</body>
</html>