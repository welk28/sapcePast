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
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Lista de aspirantes al semestre actual <?php echo"$periodo"?></div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th width="19">No</th>
            <th width="67">Control</th>
            <th width="497">Nombre</th>
            <th width="110">Datos</th>
            <!--<th width="104">Documentación</th>-->
            <th width="81">Inscribir</th>
            <th width="70">Borrar</th>
            
        </tr>
        <?php
		$alumnos="select * from alumnos where status=0;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td>$a->matricula</td>
				<td>$a->app $a->apm $a->nom</td>
				<td align='center'><a href='vermo.php?matricula=$a->matricula'>Ver</a></td>
				
				<td align='center'><a href='inscribir.php?anterior=$a->matricula'>Ver</a></td>
				<td align='center'><a href='borra.php?matricula=$a->matricula'>Ver</a></td>
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