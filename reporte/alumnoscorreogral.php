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
            <th width="400">Nombre</th>
            <th width="38">Sem</th>
            <th width="109">Carrera</th>
            <th width='380'>Correo</th>
            
            
        </tr>
        <?php
		if(!$orden)
		{
			$alumnos="select * from alumnos order by idcar, status;";
		}
		
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			if(!empty($a->email))
			{
				echo"
				<tr>
					<td>$x</td>
					
					<td>$a->matricula </td>
					<td> $a->app $a->apm $a->nom </td>
					<td align='center'>$a->status</td>
					<td>$a->idcar</td>
					<td>$a->email</td>
				</tr>
				";
			} 
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