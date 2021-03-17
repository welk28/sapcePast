<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link rel="stylesheet" type="text/css" href="css/imprimir.css" media="print" />
</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$idoc=$_GET[idoc];
		$nomdoc=$_GET[nomdoc];
		$fecha=date('d/m/Y');
		$idh=$_GET[idh];
		
		//se extraen datos de las siguientes tablas, el atributo 'num' guarda el numero de alumnos que han finalizado su evaluacion en la materia
		$docentes="select d.nomdoc, m.nommat, h.num from docente as d, materias as m, horario as h where h.idmat=m.idmat and h.idoc=d.idoc and h.idh='$idh';";
		$doce=mysql_query($docentes,$conexion);
		$do=mysql_fetch_object($doce);

		$nualumnos="select distinct matricula from cursa where idh='$idh';";
		$nualu=mysql_query($nualumnos,$conexion);
		$nal=mysql_num_rows($nualu);
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  </div>
	</header>
	<section id="seccion">
    
        <header id="header">
        <div class="subtitulo" align="center">ENCUESTA AL DESEMPEÑO DOCENTE POR PARTE DEL ALUMNO <br><br></div>
            <div id="revision">
               
            </div>
            <table width="555" align="center">
              <tr>
                <th width="24%">Docente:</th>
                <td width="31%"><u><?php echo"$do->nomdoc"; ?></u></td>
                <th>PERIODO:</th>
                <td><u><?php echo"$en->descper"; ?></u></td>
              </tr>
              <tr>
                <th>Materia:</th>
                <td><u><?php echo"$do->nommat"; ?></u></td>
                <th>IDH</th>
                <td><u><?php echo"$idh"; ?></u></td>
              </tr>
            </table><br><br>
        </header>

        <div id="evadoc" >
       		<div class="subtitulo">Número de alumnos encuestados:<u><?php echo"   $do->num de <u>$nal</u>" ; ?></u> <br><br></div>
            <table>
            	<tr>
                	<th width="196">1. TOTALMENTE DE ACUERDO</th>
                    <th width="196">2. DE ACUERDO</th>
                    <th width="196">3. INDECISO</th>
                    <th width="196">4. EN DESACUERDO</th>
                    <th width="196">5. TOTALMENTE EN DESACUERDO</th>
                </tr>
            </table>
            <br><br>
            <?php 
				$modulos="select * from modulo order by nomod;";
				$modu=mysql_query($modulos,$conexion);
				echo"
					<table>
					<tr>
						<th width='30px' align='center' rowspan='2'>NO</th>
						<th width='700px' rowspan='2'>PREGUNTA</th>
						<th colspan='6' >OPCIONES</th>
					</tr>
					<tr>
						
						<th width='30px'>1</th>
						<th width='30px'>2</th>
						<th width='30px'>3</th>
						<th width='30px'>4</th>
						<th width='30px'>5</th>
						<th></th>
					</tr>";
						$total=0;
				while($mo=mysql_fetch_object($modu))
				{		
						$summod=0;
						
						echo"
						<tr>
							<th colspan='2' align='left' class='titulotabla'>Módulo $mo->nomod: $mo->descmod</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p1); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p2); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p3); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p4); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p5); echo"</th>
							<th class='titulotabla'></th>";
						echo"</tr>
						";
						//$preguntas="select p.nop, p.pregunta, r.uno, r.dos, r.tre, r.cua, r.cin from pregunta as p, respuesta as r where p.nop=r.nop and p.nomod='$mo->nomod' and r.idh='$idh' ;";
						$preguntas="select distinct p.nop, p.pregunta from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and r.idh='$idh';";
						$preg=mysql_query($preguntas,$conexion);
						while($pr=mysql_fetch_object($preg))
						{	
						
							//se extraen los registros iguales por cada opcion que se evalua en la materia, de la opcion 1 a la 5
							$r1=0; $r2=0; $r3=0; $r4=0; $r5=0; $sumr=0;
							$numpreuno="select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='1' and r.idh='$idh';";
							$npuno=mysql_query($numpreuno,$conexion);
							$np1=mysql_num_rows($npuno);
							
							$numpredos="select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='2' and r.idh='$idh';";
							$npdos=mysql_query($numpredos,$conexion);
							$np2=mysql_num_rows($npdos);
							
							$numpretre="select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='3' and r.idh='$idh';";
							$nptre=mysql_query($numpretre,$conexion);
							$np3=mysql_num_rows($nptre);
							
							$numprecua="select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='4' and r.idh='$idh';";
							$npcua=mysql_query($numprecua,$conexion);
							$np4=mysql_num_rows($npcua);
							
							$numprecin="select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='5' and r.idh='$idh';";
							$npcin=mysql_query($numprecin,$conexion);
							$np5=mysql_num_rows($npcin);
							echo"
							<tr>
								<td>$pr->nop</td>
								<td>$pr->pregunta</td>
								<td class='resul'>$np1 <br>"; $r1=($np1*$mo->p1)/$do->num;  $sumr+=$r1; printf("%0.2f",$r1); echo"</td>
								<td class='resul'>$np2 <br>"; $r2=($np2*$mo->p2)/$do->num;  $sumr+=$r2; printf("%0.2f",$r2); echo"</td>
								<td class='resul'>$np3 <br>"; $r3=($np3*$mo->p3)/$do->num;  $sumr+=$r3; printf("%0.2f",$r3); echo"</td>
								<td class='resul'>$np4 <br>"; $r4=($np4*$mo->p4)/$do->num;  $sumr+=$r4; printf("%0.2f",$r4); echo"</td>
								<td class='resul'>$np5 <br>"; $r5=($np5*$mo->p5)/$do->num;  $sumr+=$r5; printf("%0.2f",$r5); echo"</td>
								<td class='resul'><br>";  printf("%0.2f",$sumr); $summod+=$sumr;  echo"</td>
							</tr>
							";
							
						}
						$total+=$summod;
						echo"
						<tr>
							<td colspan='8' align='left' class='resumod'>"; printf("Resultado de módulo: %0.2f",$summod); echo"</td>
						</tr>";					
				}
				echo"
						<tr>
							<td colspan='8' align='left' class='grantotal'>TOTAL EVALUACIÓN: $total</td>
						</tr>";
				echo"</table>";
			?>
       	</div>
      
  </section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>
</body>
</html>