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
		<?php 	include "usuarios.php";	
		$perevadoc=$_SESSION['perevadoc'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$usuario;
		$fecha=date('d/m/Y');
		$alumno="select * from alumnos where matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  
		<?php 
		if($ses!=1)
		{
			echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>";
		}
		
		?></div>
	</header>
	<section id="seccion">
    
        <header id="header">
            
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
                <td><u><?php echo" $en->descper"; ?></u></td>
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
                <td><u><?php echo"$a->idcar"; ?></u></td>
                <td></td>
                <td><u><?php echo""; ?></u></td>
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
        
        <table width="980">
       <tr>
    	<th width="130">CLAVE</th>
    	<th width="">Materia</th>
    	<th width="">Docente</th>	
    	<th width="">Evaluar</th>		
  	</tr>
            <?php
            $horario="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat from cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and h.periodo='$en->periodo' and c.matricula='$matricula'";
				$hora=mysql_query($horario,$conexion);
				$q=0;
				$totcre=0;
				while($h=mysql_fetch_object($hora))
				{
					echo"
					<tr>
						<td>$h->idh / $h->idmat</td>
						<td>$h->nommat <br></td>
						<td align=''>$h->nomdoc</td>
						<td align='center'>";
						$evaluacion="select eval from cursa where idh='$h->idh' and matricula='$usuario';";
			            $evalu=mysql_query($evaluacion,$conexion);
			            $ev=mysql_fetch_object($evalu);
			            	if($ev->eval<48)
			            	{
			            		if(($h->idmat!="SS")&&($h->idmat!="RESIDENCIA"))
			            		echo"<a href='pregunta.php?idh=$h->idh'>Evalúa </a>";
			            	}
						echo"</td>
						</tr>
					";
				}
            ?>
        </table>
      </div>
     
  </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<?php 
		echo"<br><br>";
		include "pie.php";
		?>
	</footer>
</div>
</body>
</html>