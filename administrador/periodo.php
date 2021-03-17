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
        	<th align="center" width="">No</th>
            <th align="center" width="">Periodo</th>
            <th align="center" width="">Descripción</th>
            <th align="center" width="">Reporte Académico</th>
            <th align="center" width="">Predet</th>
            <th align="center" width="">Modif</th>
        </tr>
        <?php
		$perio="select * from periodo order by periodo;";
		$per=mysql_query($perio,$conexion);
		$x=0;
		while($pe=mysql_fetch_object($per))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td align='center'>$pe->periodo</td>
				<td>$pe->descper</td>
				<td>$pe->reporte</td>			
				<td align='center'>"; 
				if($pe->predet==1){echo"Sí";}else{echo"No";}
				echo"</td>
				<td align='center'>mod</td>
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