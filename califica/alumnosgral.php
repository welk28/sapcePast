<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	$orden=$_GET[orden];
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
    <?php echo"Ordenar por: <a href='alumnosgral.php?orden=1' target='_self'>Semestre</a> <a href='alumnosgral.php?orden=2' target='_self'>No Ctrl</a>";?>
			<div class="subtitulo">Lista TOTAL de alumnos inscritos desde 2009-2/Julio-Agosto hasta <?php echo"$periodo: $p->descper <br> Ordenado por: ";
			if(!$orden)
			{echo"Carrera/semestre";
			}
			else
			{
				if($orden==1)
				{echo" Semestre";}
				else
				{
					echo"Número de control";
				}	
			}
			?></div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th>
            
              <th width="90">Control</th>
            <th width="300">Nombre</th>
            
            
           
            <th width="30">Se</th>
            <th width="109">Carrera</th>
           	<th width='39'>Datos</th>
            <th width='58'>Boleta</th>
            <th width='42'>Histo</th>
            <th width='42'>Kardex</th>
        </tr>
        <?php
		if(!$orden)
		{
			$alumnos="select * from alumnos order by idcar, status;";
		}
		else
		{
			if($orden==1)
			{$alumnos="select * from alumnos order by status;";
			}else
			{
				$alumnos="select * from alumnos order by matricula;";
			}
		}
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td><td>";
				if(($ses==2)||($ses==5))
				{
					echo"<a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom'>$a->matricula </a>";
				}
				else
				{
					echo"$a->matricula";
				}
				echo"</td>
				<td> $a->app $a->apm $a->nom </td>
				<td align='center'>$a->status</td>
				<td>$a->idcar</td>";


				if(($ses==2)||($ses==5))
				{
					echo"<td align='center'><a href='vermo.php?matricula=$a->matricula' title='DATOS de $a->nom'>V/M</a></td>
					<td align='center'><a href='boleta.php?matricula=$a->matricula' target='_blank' title='BOLETA de $a->nom'>Bol</a></td>

					<td align='center'><a href='historial.php?matricula=$a->matricula' target='_blank' title='HISTORIAL de $a->nom'>Ver</a></td>

					<td align='center'><a href='../reporte/kardex.php?matricula=$a->matricula' target='_blank' title='KARDEX de $a->nom'>Ver</a></td>";
				}
				else
				{
					echo"
					<td align='center'><a href='#' title='Solicite a Servicios Escolares'>V/M</a></td>
					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Bol</a></td>

					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Ver</a></td>

					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Ver</a></td>";
				}
			echo"
			</tr>
			"; 
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>