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
            <th width="300">Nombre</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
        </tr>
        <?php
		$alumnos="select * from alumnos where status>=10 order by status, idcar;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td align='center'>$x</td>
					echo"$a->matricula";
				echo"</td>
				<td> $a->app $a->apm $a->nom </td>
				<td align='center'>$a->status</td>
				<td align='center'>$a->idcar</td>
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