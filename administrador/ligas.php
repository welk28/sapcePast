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
                <div class="subtitulo">Lista de Materias Ligadas</div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th align="center" width="30">No</th>
            <th align="center" width="100">Clave</th>
            <th align="center" width="325">Descripción</th>
            <th align="center" width="100">Clave</th>
            <th align="center" width="325">Descripción</th>
            <th align="center" width="100">CARRERA</th>
        </tr>
        <?php
		$materias="select distinct l.idcar, l.idmat1, p.sem, l.idmat2 from liga as l, posee as p where p.idmat=l.idmat1 order by l.idcar, p.sem;";
		$mats=mysql_query($materias,$conexion);
		$x=0;
		while($m=mysql_fetch_object($mats))
		{
			$x++;

			$mat1="select nommat from materias where idmat='$m->idmat1';";
			$ma1=mysql_query($mat1,$conexion);
			$m1=mysql_fetch_object($ma1);

			$mat2="select nommat from materias where idmat='$m->idmat2';";
			$ma2=mysql_query($mat2,$conexion);
			$m2=mysql_fetch_object($ma2);
			echo"
			<tr>
				<td align='center'>$x</td>
				<td align='right'>$m->idmat1</td>
				<td>$m1->nommat</td>			
				<td align='center'>$m->idmat2 </td>
				<td>$m2->nommat</td>
				<td>$m->idcar</td>
				
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