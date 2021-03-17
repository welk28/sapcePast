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
            <th width="250">Nombre</th>
            <th>Curp</th>
            <th width="10">S</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
            <th>Dirección</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.curp, a.status, a.fecnac, a.sexo, a.calle, a.colonia, a.cp, a.ciudad, e.edo, a.idcar from alumnos as a, estado as e, horario as h, cursa as c where e.idedo=a.idedo and h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' and a.status='1' order by a.idcar, a.status;";
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
				<td>$a->curp</td>
				<td align='center'>$a->sexo</td>
				
				<td align='center'>$a->status</td>
				<td>$a->idcar</td>
				<td>$a->calle , $a->colonia, cp. $a->cp $a->ciudad, $a->edo</td>
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