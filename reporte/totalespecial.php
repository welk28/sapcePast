<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
	
	
	<section id="seccion">
    <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a></div>
    <header id="header">
			<div class="subtitulo2">Lista de alumnos con TOTAL DE CURSOS ESPECIALES al semestre actual <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <?php
	$carrera="select * from carrera";
	$carre=mysql_query($carrera,$conexion);
	while($ca=mysql_fetch_object($carre))
	{
	    echo"<div class='subtitulo2'> CARRERA: $ca->descar  </div>";
		
		$matriculas="select distinct c.matricula, a.app, a.apm, a.nom, a.status from horario as h, cursa as c, alumnos as a where a.matricula=c.matricula and a.idcar='$ca->idcar' and c.idh=h.idh and c.opor='3' ;";
		$matri=mysql_query($matriculas,$conexion);
		
		while($m=mysql_fetch_object($matri))
		{


		    echo"
		    <br> Matrícula: $m->matricula <br>
		    	Nombre: $m->app $m->apm $m->nom <br>
		    	Semestre: $m->status <br><br>
			<table>
		    	<tr>
		        	<th width='50'>No</th>
		        	<th width='150'>Periodo</th>			
		            <th width='400'>Materia</th>   
		            <th width='400'>Docente</th>        
		         
		        </tr>";
		        
				
				$calificaciones="select h.periodo, h.idoc, d.nomdoc, m.nommat from horario as h, docente as d, materias as m, cursa as c where h.idoc=d.idoc and h.idmat=m.idmat and h.idh=c.idh and c.opor='3' and c.matricula='$m->matricula';";
				$calif=mysql_query($calificaciones,$conexion);
				$x=0;
				while($ca=mysql_fetch_object($calif))
				{
					$x++;
					echo"
					<tr>
						<td>$x</td>
						<td align='center'>$ca->periodo</td>
						<td >$ca->nommat</td>
						<td>$ca->nomdoc</td>
						
					</tr>
					"; 
		    	}
		    echo"</table>";
		}
	}?>
	</div>
        
	</section>
	
</div>
</body>
</html>