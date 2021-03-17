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
            
            <th width="90">Control</th>
            <th width="300">Nombre</th>
            <th width="100">curp</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
          
            <th width="54">Horario</th>
            <th width="58">Boleta</th>
            <th width="84">Historial</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status,a.curp, a.fecnac, a.sexo, a.idcar  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
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
				
				
				<td align='center'>$a->curp</td>
				<td align='center'>$a->status</td>
				
				<td>$a->idcar</td>";
				
				
				echo"<td align='center'><a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom'>Ver</a></td>
				<td align='center'><a href='boleta.php?matricula=$a->matricula' target='_self' title='BOLETA de $a->nom'>Bol</a></td>
				<td align='center'><a href='historial.php?matricula=$a->matricula' target='_self' title='HISTORIAL de $a->nom'>Historial</a></td>
			</tr>
			"; 
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>