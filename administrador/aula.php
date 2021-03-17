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
		?>
	</header>
	
	
	<section id="seccion">
    
        <header id="header">
                <div class="subtitulo">Lista de Docentes registrados</div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th align="center" width="">No</th>
            <th align="center" width="">ID</th>
            <th align="center" width="">Nombre</th>
            
            <th align="center" width="">Modif</th>
        </tr>
        <?php
		$docente="select * from aula;";
		$doc=mysql_query($docente,$conexion);
		$x=0;
		while($d=mysql_fetch_object($doc))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td align='center'>$d->ida</td>
				<td><a href='$ip/administrador/modaula.php?ida=$d->ida'>$d->aula</a></td>			
				
				<td align='center'><a href='$ip/administrador/modaula.php?ida=$d->ida'>Modifi</a></td>
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