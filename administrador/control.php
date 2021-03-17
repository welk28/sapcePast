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
		<?php 	include "../usuarios.php"; ?>
	</header>
	
	
	<section id="seccion">
    
        <header id="header">
                <div class="subtitulo">Lista de Periodos registrados</div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	
            <th align="center" width="">Id</th>
            <th align="center" width="">Descripción</th>
            <th align="center" width="">Opcion</th>
            
            <th align="center" width="">Modif</th>
        </tr>
        <?php
		$perio="select * from control;";
		$per=mysql_query($perio,$conexion);
		$x=0;
		while($pe=mysql_fetch_object($per))
		{
			$x++;
			echo"
			<tr>
				<td>$pe->id</td>
				<td align='left'>$pe->des</td>
				<td>$pe->opcion</td>
				<td align='center'><a href='http://$ip/administrador/mocont.php?id=$pe->id'>Modifi</a></td>
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