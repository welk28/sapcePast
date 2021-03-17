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
	$matricula=$_GET[matricula];
	$nombre=$_GET[nombre];
	$band=$_GET[band];
	
	if(!empty($band))
	{
		$matricula=$_GET[matricula];
		$nombre=$_GET[nombre];
		print"
				<script languaje='JavaScript'>
				var respuesta=confirm('¡Realmente desea bloquear al alumno $nombre');
				if(respuesta==true)
				{
					window.location.href='bloquea.php?matricula=$matricula';
				}
				</script>
				";	
	}
		?>

	</header>
	<section id="seccion">
    <header id="header">
    	<table>
    		<tr>
    			<td>
    				<form action="buscalumnobl.php" method="get">
    				<input type="text" name="matricula" placeholder="matricula"> <input type="submit" value="Buscar">
    				</form>
    			</td>
    			<td></td>
    			<td></td>
    			<td>
    				<form action="buscalumnobl.php" method="get">
				    	<input type="text" name="nombre" placeholder="nombre o apellido"> <input type="submit" value="Buscar">
				    </form>
    			</td>
    		</tr>
    	</table>
   		<?php 
   			if(!empty($matricula))
			{
				$alumnos="select * from alumnos where matricula like '%$matricula%';";
			}
			else
			{
				if(!empty($nombre))
				{
					$alumnos="select * from alumnos where (app like '%$nombre%') or (apm like '%$nombre%') or (nom like '%$nombre%')";
				}
				else
				{
					echo"<div class='subtitulo'>DEBE INGRESAR DATOS </div>";
				}
			}
   		?>
			<div class="subtitulo">Coincidencias encontradas <?php echo"$periodo: $p->descper: $matricula";?> </div>
        <br>
    </header>
    <div id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th>
            <?php 
			if($ses==2)echo"<th width='43'>Avance</th>"; ?>
            <th width="90">Control</th>
            <th width="300">Nombre</th>
            <th width="10">S</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
			<th width="50">Bloquear</th>
        </tr>
        <?php
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"<form action='buscalumnobl.php' method='get'>
			<tr>
				<td>$x</td>";
				echo"<td>$a->matricula</td> <input type='hidden' name='matricula' value='$a->matricula'>
				<td> $a->app $a->apm $a->nom</td> <input type='hidden' name='nombre' value='$a->app $a->apm $a->nom'>
				<td align='center'>$a->sexo</td>
				<td align='center'>$a->status</td>
				<td>$a->idcar</td> <input type='hidden' name='band' value='1'>
				<td align='center'><input class='guardacal' type='image' name='Submit' value='Submit' src='$ip/img/no.png' width='20' height='20' title='Bloquear'></td>
			</tr>
			</form>
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