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
			<div class="subtitulo">Lista TOTAL de alumnos egresados</div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th>			
            <th width="90">Control</th>
            <th width="200">Nombre</th>
            <th width="60">Carrera</th>
            <th width="60">Promedio General</th>						<th width="50">Correo</th>
        </tr>
        <?php
		$alumnos="select * from alumnos where status>=10 order by status, idcar;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{			$promedio=0;			$sumpro=0;			$z=0;			$materias="select c.prom from cursa as c, materias as m, horario as h where h.idmat=m.idmat and c.idh=h.idh and matricula='$a->matricula' and c.prom>='70';";			$mat=mysql_query($materias,$conexion);			while($m=mysql_fetch_object($mat))			{				$z++;				$sumpro+=$m->prom;			}			if($z==52)			{			$promedio=$sumpro/$z;				if($promedio>=90){					$x++;					echo"						<tr>						<td align='center'>$x</td>						<td align='center'>$a->matricula</td>						<td> $a->app $a->apm $a->nom </td>						<td align='center'>$a->idcar</td>						<td align='center'>";printf("%0.1f",$promedio);echo"</td>						<td align='center'>$a->email</td>						</tr>					";				}			}		}?>
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