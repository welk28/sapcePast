<?php  session_start();  

?>
<!DOCTYPE html >
<html>
<head>


   
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>


</head>


  <body >

<div id="cuerpo">
	<header id='cabecera'>
<?php 

		include "../usuarios.php";	





		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];






    $buscadeuda="select a.matricula, a.app, a.apm, a.nom, a.status, a.idcar, d.fecha, d.descrip, p.nombre from alumnos as a, adeuda as d, depto as p where d.iddepto=p.iddepto and a.matricula=d.matricula and d.status='1' and a.matricula='$matricula'";
    $buscad=mysql_query($buscadeuda,$conexion);
    $nbd=mysql_num_rows($buscad);
    $deuda=mysql_fetch_object($buscad);




    if($nbd>0)
    {
      print"
      <script languaje='JavaScript'>
        window.alert('IMPOSIBLE REINSCRIBIR a $matricula, adeuda con al menos $deuda->nombre');
        window.location.href='$ip/administrador/buscalumno.php';
      </script>";  
    }

		$fecha=date('d/m/Y');
		$alumno="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
		?>	
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  
    

    
		<?php 
    if(($ses==2)||($ses==5))
		{
			echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>";
		}
		
		$creditos="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor, c.asigna from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$periodo' and c.matricula='$matricula'";
		$credi=mysql_query($creditos,$conexion);
		$sucr=0;
		while($c=mysql_fetch_object($credi))
		{$sucr+=$c->credit;
			}
		?></div>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div id="revision">
               <br>
                <table  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td width="100px" rowspan="3" align="center"><img src="../img/SGC.jpg" alt="dgest" width="80" height="100" /></td>
                    <td width="800px" rowspan="2" align="left"><strong>Formato de carga académica.</strong></td>
                    <td width="180px" >Código: Num. De control del estudiante</td>
                  </tr>
                  <tr>
                    <td>Revisión: O</td>
                  </tr>
                  <tr>
                    <td align="left"><strong>Referencia a la Norma ISO 9001-2015: 8.2.1, 8.2.2, 8.2.3, 8.2.4, 8.5.2</strong></td>
                    <td>P&aacute;gina 1 de 1 </td>
                  </tr>
                </table><br><br>
            </div>
            <table style="padding-bottom: 20px;">
              <tr>
                <th align="center" width="150" ><h1>SEP</h1></th>
                <th align="center" width="500"><h1>INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</h1>  </th>
                <th align="center" width="200"><h1>SES</h1></th>
                <th align="center" width=""><h1>TNM</h1></th>
              </tr>
            </table>
            <table style="padding-bottom: 30px;">
              <tr>
                <th align="center" ><h1>CARGA ACADEMICA AL PERIODO <?php echo $p->descper ?></h1></th>
                
              </tr>
            </table>
            <table width="555" align="center">
              <tr>
                <td align="">FECHA:</td>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <td width="24%">N&Uacute;MERO DE CONTROL:</td>
                <td width="31%"><u><?php echo"$matricula"; ?></u></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>ESTUDIANTE:</td>
                <td><u><?php echo"$a->app $a->apm $a->nom"; ?></u></td>
                <td></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>SEMESTRE:</td>
                <td><u><?php echo"$a->status"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CARRERA:</td>
                <td><u><?php echo"$a->descar"; ?></u></td>
                <td>CRÉDITOS:</td>
                <td><u><?php echo"$sucr"; ?></u></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"<a href='reticula.php?matricula=$matricula&idcar=$a->idcar' target='_blank'>$a->idcar</a>"; ?></u></td>
                <td>Especialidad: </td>
                <td> <u>
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
                </u></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br><br><br><br>
        </header>

        <div id="registros" >
        <?php
		if($sucr>36)

		{
			echo"<div class='avisono'>No puede cargar más materias, Máximo 36 créditos, o la autorización del coordinador</div>";
		}
   
		?>

    
        <table width="980">
          <tr>
            <th width="300">Materia</th>
            <th width="100">CLAVE</th>
            <th width="65">GPO</th>
    	
    	
		
		<th width="75">OPORT</th>
		<th width="25">CR</th>        
    	<th width="95">LUNES</th>	
    	<th width="95">MARTES</th>		
    	<th width="95">MIERCOLES</th>	
    	<th width="95">JUEVES</th>		
    	<th width="95">VIERNES</th>		
        <th width="10">x</th>
  	</tr>
            <?php
            $horario="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor, c.asigna, c.fecing from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$periodo' and c.matricula='$matricula'";
				$hora=mysql_query($horario,$conexion);
				$q=0;
				$totcre=0;
         $sopor=0;
				while($h=mysql_fetch_object($hora))
				{//select h.idh, h.idmat, h.idoc, m.nommat, d.nomdoc from horario as h, materias as m, docente as d where h.idoc=d.idoc and h.idmat=m.idmat and h.periodo='$periodo' order by h.idh;
					$grupo="select g.idg, h.idh, h.idmat from hgrupo as g, horario as h,  encarre as e where e.idg=g.idg and g.idh=h.idh and h.idh='$h->idh' and e.idcar='$a->idcar';";
					$gru=mysql_query($grupo,$conexion);
					$gr=mysql_fetch_object($gru);
					echo"
					<tr>
          <td><a href='#' title='$h->asigna $h->fecing'>$h->nommat </a><br> ** $h->nomdoc";
            if($h->opor==3)
                $sopor++;
            echo"</td>
            <td>$h->idmat</td>
            <td>$gr->idg</td>
            <td>";
              if(($ses==2)||($ses==5)||($ses==4 ))
              {
                echo"<a href='cambiaopor.php?matricula=$matricula&idh=$h->idh&opor=$h->opor' >$h->descopor</a>";
              }
              else
              {
                echo"$h->descopor";
              }
            echo"</td> 
						
						
						

						<td align='center'>$h->credit</td>
						<td align='center'>";
						$totcre+=$h->credit;
						$lunes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='1';";
						
						$lu=mysql_query($lunes,$conexion);
						$rlu=mysql_num_rows($lu);
						if($rlu>0)
						{
							while($l=mysql_fetch_object($lu))
							{echo"$l->hora / $l->aula <br>";}
						}
						echo"</td>
						<td align='center'>";
						$martes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='2';";
						$ma=mysql_query($martes,$conexion);
						while($m=mysql_fetch_object($ma))
						{echo"$m->hora / $m->aula <br>";}
						echo"</td>
						<td align='center'>
						";
						$miercoles="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='3';";
						$mie=mysql_query($miercoles,$conexion);
						while($mi=mysql_fetch_object($mie))
						{echo"$mi->hora / $mi->aula<br>";}
						echo"</td>
						<td align='center'>
						";
						$jueves="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='4';";
						$ju=mysql_query($jueves,$conexion);
						while($j=mysql_fetch_object($ju))
						{echo"$j->hora / $j->aula<br>";}
						echo"</td>
						<td align='center'>
						";
						$viernes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='5';";
						$vi=mysql_query($viernes,$conexion);
						while($v=mysql_fetch_object($vi))
						{echo"$v->hora / $v->aula<br>";}
						echo"</td>
						
						
						<td>";
						if(($ses==2)||($ses==5)||($ses==4 ))
						{
              echo"					<a href='quitamat.php?matricula=$matricula&idh=$h->idh' target='_self'>X</a>";
						}
					echo"</td></tr>
					";
				}
				echo"
				<tr>
					<td></td>
					<td></td>
					<td align='right'>Total de créditos</td>
					<td></td>
					<td>$totcre</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				";
            ?>
        </table>
      </div>
      <?php 
     if(($ses==2)||($ses==5)||($ses==4 ))
    {
      if(($sucr>=22) &&($sopor==1))
      {
        echo"<div class='avisono'>ALUMNO CON  1 ESPECIAL UNICAMENTE CON 22 CREDITOS</div>";
      }
      else
      {
        if($sopor==2)
        {
          echo"<div class='avisono'>ALUMNO CON 2 ESPECIAL NO DEBE CARGAR MÁS MATERIAS</div>";
        }
        else
        {
         
          echo"<div class='liga'><a href='horario.php?matricula=$matricula' target='_self'>Agregar Materia</a></div> <br><br><br>";
          echo" <div class='liga'> <a href='vaciar.php?matricula=$matricula' target='_self' title='Vaciar horario'>Vaciar horario</a></div>
      
    ";//<div class='liga'>  <a href='cargag.php?matricula=$matricula' target='_self' title='Cargar materias de grupo determinado'>Cargar grupo</a></div>
        }
      }  
     //if($ses==2) echo"<div class='liga'>  <a href='cargag.php?matricula=$matricula' target='_self' title='Cargar materias de grupo determinado'>Cargar grupo</a></div>";
  } 
	  if(($ses==2)||($ses==5)||($ses==4 ))
	  {
	  echo"
      <p>&nbsp;</p>
        <table>
        	<tr>
           	  <td colspan='4' align='center'><img src='../img/division.png' width='204' height='100'></td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td colspan='4' align='center'>__________________________<br>
              Estudiante</td>
          </tr>
            <tr>
           	  <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
            </tr>
      </table>";
	  
	  
	  echo"
	  
       ";
	  }
	  ?>
  </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<table>
        	<tr>
           	  <td width="98"><?php echo"$matricula";?></td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98" align="right">Rev. O</td>
                           
          </tr>
            
      </table>
	</footer>
</div>
</body>
</html>