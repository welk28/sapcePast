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
     
			
      <div class="subtitulo2" align="center">HISTORIAL DE CALIFICACIONES</div>
      <br>
      <table width="555" align="center">
              <tr>
                <td>FECHA:</td>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <td width="24%">N&Uacute;MERO DE CONTROL:</td>
                <td width="31%"><u><?php echo"$matricula"; ?></u></td>
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
                <td>CR&Eacute;DITOS:</td>
                <td><u><?php echo"$sumcred"; ?></u></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"<a href='reticula.php?matricula=$matricula&idcar=$ad->idcar' target='_blank'>$ad->idcar</a>" ?>;</u></td>
                <td></td>
                <td><u><?php echo"" ?>;</u>
                  <?php 
                    /*if($idcar=="ITIC-2010-225")
                        echo"ESPECIALIDAD PARA TICS"; 
                    else
                    {
                        if($idcar=="ILOG-2009-202")
                            echo"ESPECIALIDAD PARA LOGISTICA";
                        else
                        {
                            if($idcar=="IADM-2010-213")
                                echo"ESPECIALIDAD PARA ADMINISTRACION";	
                        }
                    }
                    */
                    ?>
                </td>
              </tr>
              
      </table><br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        <th width="21">No</th>
        <!-- <th width="104">idh</th> -->
        <th width="57">Periodo</th>
        <th width="477">Materia</th>
        <th width="43">Cr</th>
        <th width="58">CALIF</th>
        <th width="101">Observaciones</th>     
      </tr>
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
            //<td>$h->idh/$h->idmat</td>
  						echo"
  						<tr>
  							<td align='right'>$x</td>
  							
  							<td>$h->periodo</td>
  							<td>$h->nommat</td>
  							<td align='center'>$h->credit</td>
  							<td align='right'><b>";
  							if($h->prom>=70)
  							{
                  if($ses==2)
                  {
                    echo"<a href='agregar_a_grupo_modifica1.php?matricula=$matricula&idh=$h->idh&idcar=$ad->idcar' class='prom'>";
    								printf("%0.1f",$h->prom);
    								echo"</a>";
                  }
                  else
                  {
                    printf("%0.1f",$h->prom);
                  }
                  $sumcred+=$h->credit;
  								$sumpro+=$h->prom;

  							}
  							else
  							{
                  if($ses==2)
                  {
                    echo"<a href='agregar_a_grupo_modifica1.php?matricula=$matricula&idh=$h->idh&idcar=$ad->idcar' class='prom'>NA</a>";
                  }
                  else
                  {
                    echo"NA";
                  }

                }
  							echo"</b></td>
  							<td align='center'>";
  							if($h->prom>=70)
  							{
  								echo"";
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
  						</tr>"; 
  				}
  		}
  		$prom=0;
  		$prom=$sumpro/$x;
      //<td></td>
  		echo"
          <tr>
          	<td></td>
              <td></td>
              
              <td align='right'>Total de Créditos aprobados</td>
              <td align='center'>$sumcred</td>
              <td align='right'>";printf("%0.1f",$prom); echo"</td>
              <td></td>
          </tr>
    </table>";
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
              <td width='392' align='center'><img src='../img/pablofirma.png' width='297' height='144'></td>
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