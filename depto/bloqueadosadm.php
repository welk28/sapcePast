<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='../index.php';
				</script>
				";
}
$band=$_GET[band];
	
	if(!empty($band))
	{
		$matricula=$_GET[matricula];
		$nom=$_GET[nom];
		$fecha=$_GET[fecha];
		print"
				<script languaje='JavaScript'>
				var respuesta=confirm('¡Realmente desea desbloquear al alumno $nom');
				if(respuesta==true)
				{
					window.location.href='desbloquear.php?matricula=$matricula&fecha=$fecha';
				}
				</script>
				";	
	}

		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Lista de alumnos bloqueados por el presente departamento <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <table> 
			<tr>
				<th width='30'>No</th>
				<th>Matricula</th>
				<th width='250'>Nombre</th>
				<th width='35'>Sm</th>
				<th width='120' >Carrera</th>
				<th>Fecha</th>
				<th>Depto</th>
				<th>Motivo de bloqueo</th>
				<th>Desb</th>
			</tr>

			<?php 
				$alumnosd="select a.matricula, a.app, a.apm, a.nom, a.status, a.idcar, d.fecha, d.iddepto, d.descrip from alumnos as a, adeuda as d where a.matricula=d.matricula and d.status='1' and d.periodo='$periodo';";
				$alumd=mysql_query($alumnosd,$conexion);
				$x=0;
				while($d=mysql_fetch_object($alumd))
				{
					$x++;
					echo" 
					
					<tr>
						<td>$x</td>
						<td>$d->matricula</td> <input name='matricula' type='hidden' value='$d->matricula'>
						<td>$d->app $d->apm $d->nom</td> <input name='nom' type='hidden' value='$d->nom'>
						<td align='center'>$d->status</td>
						<td align='center'>$d->idcar</td> <input type='hidden' name='band' value='1'>
						<td align='center'>$d->fecha</td> <input type='hidden' name='fecha' value='$d->fecha'>
						<td align='center'>$d->iddepto</td>
						<td><a href='modbloquea.php?matricula=$d->matricula&fecha=$d->fecha&descrip=$d->descrip&app=$d->app&apm=$d->apm&nom=$d->nom' >$d->descrip</td> <input type='hidden' name='band' value='1'>
						<td align='center' ><img src='$ip/img/hecho.png' width='20' height='20' title='Desloquear'></td>
					</tr>";
				}
			?>
			
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>