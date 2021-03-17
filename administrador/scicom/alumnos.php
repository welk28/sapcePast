<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../../usuarios.php";	
		
		
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	
	
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Lista de alumnos inscritos en el semestre actual <?php echo"$periodo"?></div>
        <br>
    </header>

    <article id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th>
            <th width="43">Just</th>
            <th width="90">Control</th>
            <th width="400">Nombre</th>
            <th width="38">Sem</th>
            <th width="109">Carrera</th>
            <th width="39">Datos</th>
            <th width="54">Horario</th>
            <th width="58">k/actual</th>
            <th width="84">historial</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.nomal, a.status, a.idcar from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='2014-1' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td>Hacer</td>
				<td>$a->matricula</td>
				<td>$a->nomal</td>
				<td>$a->status</td>
				<td>$a->idcar</td>
				<td>ver</td>
				<td>ver</td>
				<td>ver</td>
				<td>ver</td>
			</tr>
			"; 
    	}?>
    </table>
	</article>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../../pie.php";	?>
	</footer>
</div>
</body>
</html>