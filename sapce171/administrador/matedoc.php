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
                <div class="subtitulo">Lista de Docentes con materias en el periodo <?php echo"$periodo : $p->descper ";?></div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th align="center" width="59">No</th>
            <th align="center" width="88">ID</th>
            <th align="center" width="430">Nombre</th>
            
            <th align="center" width="100">Ingenierias</th>
            <th align="center" width="100">CBas</th>
            <th align="center" width="100">EcoAd</th>
        </tr>
        <?php
		$docente="select distinct d.idoc, d.nomdoc  from docente as d, horario as h where h.idoc=d.idoc and h.periodo='$periodo';";
		$doc=mysql_query($docente,$conexion);
		$x=0;
		while($d=mysql_fetch_object($doc))
		{
			$x++;
			echo"
			<tr>
				<td align='center'>$x</td>
				<td align='center'><a href='horadocente.php?idoc=$d->idoc&nomdoc=$d->nomdoc' target='_blank' title='Ver materias'>$d->idoc</a></td>
				<td>$d->nomdoc</td>			
				
				<td><a href='$ip/califica/reportingen.php?idoc=$d->idoc&depto=INGENIERIAS' target='_blank'>Ingenierias</a></td>
				<td><a href='$ip/califica/reportingen.php?idoc=$d->idoc&depto=CIENCIAS BASICAS' target='_blank'>Cbas</a></td>
				<td><a href='$ip/califica/reportingen.php?idoc=$d->idoc&depto=CIENCIAS ECONOMICO-ADMINISTRATIVAS' target='_blank'>Ecoad</a></td>
			</tr>
			"; 
    	}?>
    </table>
    <?php
    	echo"<a href='reportinge.php?idoc=$d->idoc'>Ingenierias</a>";
    ?>

	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>