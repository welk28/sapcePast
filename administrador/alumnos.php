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
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Lista de alumnos inscritos en el semestre actual <?php echo"$periodo: $p->descper"?></div>
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
            <th width="100">Fecnac</th>
            <th width="10">Ed</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
           	<th width='39'>Datos</th>
            <th width='58'>Boleta</th>
            <th width='42'>Histo</th>
            <th width='42'>Kardex</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>";
				if($ses==2)
				{echo"<td><a href='../reporte/avance.php?matricula=$a->matricula' target='_blank' title='BOLETA de $a->nom'>Hacer</a></td>";
				
				echo"<td><a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom' target='_blank'>$a->matricula</a></td>";
				}
				else
				{
					echo"<td>$a->matricula </td>";
				}

				if(($ses==2)||($ses==5))
				{
					echo"<td> <a href='../reporte/kardex.php?matricula=$a->matricula' target='_blank' title='KARDEX de $a->nom'>$a->app $a->apm $a->nom</a>";
				}
				else
				{
					echo"<td> $a->app $a->apm $a->nom";
				}

				echo"</td><td align='center'><a href='../reporte/credealumno1.php?matricula=$a->matricula' target='_self'>$a->sexo</a></td>
				<td align='center'>$a->fecnac</td>";
				$fechanacimiento=$a->fecnac;
				list($ano,$mes,$dia) = explode("-",$fechanacimiento);
				$edad= date("Y") - $ano;
				
				echo"
				<td align='center'>$edad</td>
				<td align='center'>$a->status</td>
				
				<td>$a->idcar</td>";
				if(($ses==2)||($ses==5))

				{
					echo"<td align='center'><a href='vermo.php?matricula=$a->matricula' title='DATOS de $a->nom'>V/M</a></td>
					<td align='center'><a href='boleta.php?matricula=$a->matricula' target='_blank' title='BOLETA de $a->nom'>Bol</a></td>

					<td align='center'><a href='historial.php?matricula=$a->matricula' target='_blank' title='HISTORIAL de $a->nom'>Ver</a></td>

					<td align='center'><a href='../reporte/kardex.php?matricula=$a->matricula' target='_blank' title='KARDEX de $a->nom'>Ver</a></td>";
				}
				else
				{
					echo"
					<td align='center'><a href='#' title='Solicite a Servicios Escolares'>V/M</a></td>
					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Bol</a></td>

					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Ver</a></td>

					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Ver</a></td>";
				}
			echo"</tr>
			"; 
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>