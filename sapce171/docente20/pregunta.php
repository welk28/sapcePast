<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
</head>
<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		$idh=$_GET[idh];
		$op=$_GET[op];
		$noev=$_GET[noev];

		$matricula=$usuario;
		$fecha=date('d/m/Y');
		$alumno="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
		
		//guardar las calificaciones según opcion
		if(!empty($op))
		{
			//actualizar en cursa según idh y matricula
			$acursa="update cursa set eval='$noev' where idh='$idh' and matricula='$usuario';";
			$acur=mysql_query($acursa,$conexion);
			//actualizar en respuesta segun idh

			$guardaresp="insert responde values ('$matricula', '$idh', '$noev', '$op')";
			$gresp=mysql_query($guardaresp,$conexion);
			if(!$gresp)
			{
				print"
					<script>
						window.alert('error');
						window.location.href='pregunta.php?idh=$idh';
					</script>
					";}			
				if($noev==48)
				{
					$cantidad="select num from horario where idh='$idh';";
					$cant=mysql_query($cantidad,$conexion);
					$ca=mysql_fetch_object($cant);
					$na=$ca->num+1;

					$accant="update horario set num='$na' where idh='$idh';";
					$aca=mysql_query($accant,$conexion);
						
					print"
					<script>
						window.alert('CONTINÚE SU EVALUACIÓN DOCENTE');
						window.location.href='horalumno.php';
					</script>
					";
				}
				else
				{
					print"
					<script>
						window.location.href='pregunta.php?idh=$idh';
					</script>
					";
				}
			
			
		}
		
		
			?>
			
	</header>
	<section id="seccion">
        <header id="header">
            <?php
	    	
    		?>
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
                <td>PERIODO:</td>
                <td><u><?php echo"$p->descper"; ?></u></td>
              </tr>
              <tr>
                <td>ESTUDIANTE:</td>
                <td><u><?php echo"$a->app $a->apm $a->nom"; ?></u></td>
                <td>&nbsp;</td>
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
                <td><u><?php echo"$a->idcar"; ?></u></td>
                <td></td>
                <td><u>
                  
                </u></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br>
            <?php 
           
            $datosmat="select d.nomdoc, m.nommat from horario as h, docente as d, materias as m where h.idoc=d.idoc and m.idmat=h.idmat and h.idh='$idh';";
            $dm=mysql_query($datosmat,$conexion);
            $m=mysql_fetch_object($dm);

            //buscar el numero de pregunta en que va el alumno
            $evaluacion="select eval from cursa where idh='$idh' and matricula='$usuario';";
            $evalu=mysql_query($evaluacion,$conexion);
            $ev=mysql_fetch_object($evalu);
            $noe=$ev->eval+1;
            echo"<table>
			<tr>
				<th width='100px'>Materia: </th>
				<td>$idh / $m->nommat</td>
			</tr>
			<tr>
				<th>Docente: </th>
				<td> $m->nomdoc</td>
			</tr>
		</table><br><br>";
		?>
        </header>
		
        <div id="evadoc" >
        	<div class="avisono">Selecciona el número que corresponda a tu opinión con respecto al desempeño de tu profesor en relación a la pregunta correspondiente. Utiliza la siguiente ponderación</div>
		
		<?php
			
			$pregunta="select p.nop, p.pregunta, m.descmod from pregunta as p, modulo as m where m.nomod=p.nomod and p.nop='$noe';";
			$pre=mysql_query($pregunta,$conexion);
			while($p=mysql_fetch_object($pre))
			{
				echo"<div class='subtitulo' ><br><br> Módulo: $p->descmod</div> <br><br>
				<h2 align='center'>$p->nop : $p->pregunta</h2><br><br>
				
				<form action='pregunta.php'>
		        	<table>
		        		<tr>
		        			<td width='196' align='center'><input name='op' type='radio' value='1' onclick='submit()'/> </td>
		        			<td width='196' align='center'><input name='op' type='radio' value='2' onclick='submit()'/></td>
		        			<td width='196' align='center'><input name='op' type='radio' value='3' onclick='submit()'/></td>
		        			<td width='196' align='center'><input name='op' type='radio' value='4' onclick='submit()'/></td>
		        			<td width='196' align='center'><input name='op' type='radio' value='5' onclick='submit()'/> 
		        			<input type='hidden' name='idh' value='$idh'> 
							<input type='hidden' name='noev' value='$p->nop'> 
		        			</td>
		        		</tr>
		        		<tr>
		        			<td align='center'>1. Totalmente de acuerdo</td>
		        			<td align='center'>2. De acuerdo</td>
		        			<td align='center'>3. Indeciso</td>
		        			<td align='center'>4. En desacuerdo</td>
		        			<td align='center'>5. Totalmente en desacuerdo</td>
		        		</tr>
		        	</table>
        		</form>";
			}
		?>
        
        
        </div>
  </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<?php 
		echo"<br><br>";
		include "../pie.php";
		?>
	</footer>
</div>
</body>
</html>