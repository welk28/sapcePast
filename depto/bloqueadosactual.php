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
			<div class="subtitulo">Lista de alumnos bloqueados/desbloqueados por el presente departamento <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    	<?php  echo"
    	<img src='$ip/img/hecho.png' width='20' height='20'  alt='Desbloqueado'> Desbloqueado <br>
    	<img src='$ip/img/no.png' width='20' height='20'  alt='Desbloqueado'> Bloqueado";
    	?>
    <table> 
			<tr>
				<th width='30'>No</th>
				<th>Matricula</th>
				<th width='250'>Nombre</th>
				<th width='35'>Sm</th>
				<th width='120' >Carrera</th>
				<th>Fecha</th>
				<th>Motivo de bloqueo</th>
				<th>Status</th>
			</tr>

			<?php 
				$alumnosd="select a.matricula, a.app, a.apm, a.nom, a.status, a.idcar, d.fecha, d.descrip, d.status as sta from alumnos as a, adeuda as d where a.matricula=d.matricula and d.iddepto='$usuario' and d.periodo='$periodo' order by d.status";
				$alumd=mysql_query($alumnosd,$conexion);
				$x=0;
				while($d=mysql_fetch_object($alumd))
				{
					$x++;
					echo" 
					<tr>
						<td>$x</td>
						<td>$d->matricula</td> 
						<td>$d->app $d->apm $d->nom</td> 
						<td align='center'>$d->status</td>
						<td align='center'>$d->idcar</td>
						<td align='center'>$d->fecha</td> 
						<td>$d->descrip</td> 
						<td align='center' >"; 
						if($d->sta==0)
							echo"<img src='$ip/img/hecho.png' width='20' height='20'  title='Desbloqueado'>";
						else
							echo"<img src='$ip/img/no.png' width='20' height='20'  title='Bloqueado'>";
						echo"</td>
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