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
	<header id="cabecera">
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
		?>
	</header>
	
	
	<section id="seccion">
    
    
			
   

    <div id="registros" >
    	<div class="subtitulo">Lista de procedencia de alumnos INSCRITOS </div>
        <br>
    	<?php
    	$procedencia="select * from procedencia;";
    	$pro=mysql_query($procedencia,$conexion);
    	while($p=mysql_fetch_object($pro))
    	{
    		echo" <h1> $p->escuela </h1>
		    <table>
		    	<tr>
		        	<th width='20'>No</th>
		            <th width='80'>Control</th>
		            <th width='250'>Nombre</th>
		            <th width='400'>Procedencia</th>
		            <th width='20'>sexo</th>
		            <th width='100'>carrera</th>
		            <th width='20'>sem</th>
		        </tr>";
		        
				$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.prepa, a.otesc, a.sexo, a.status, a.idcar  from alumnos as a, horario as h, cursa as c
				 where h.idh=c.idh and h.periodo='$periodo' and c.matricula=a.matricula and a.idesc='$p->idesc' order by a.idcar, a.matricula;";
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
						<td>$a->prepa / <b>$a->otesc</b></td>
						<td align='center'>$a->sexo</td>
						<td align='center'>$a->idcar</td>
						<td align='center'>$a->status</td>
					</tr>
					"; 
		    	}
		    echo"</table> <br><br><br>";
    	}
    	
    ?>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>