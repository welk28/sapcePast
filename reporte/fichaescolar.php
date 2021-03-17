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
            <th width="">CURP</th>
            <th width="">NOMBRE</th>
            <th width="">CLAVE PLANTEL</th>
            <th width="">CARRERA</th>
            <th width="">NOMBRE CARRERA</th>
            <th width="">PERIODOS</th>
            <th width="">TIPO PERIODO</th>
            <th width="">PERIODO ACTUAL</th>
            <th width="">PERIODO ANTERIOR</th>
            <th width="">PERIODO GENERAL</th>
            <th width="">MATRICULA</th>
            <th width="">REGULAR</th>
            <th width="">ESTATUS</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status,a.curp, a.fecnac, a.sexo, a.idcar, ca.descar  from alumnos as a, horario as h, cursa as c, carrera as ca where ca.idcar=a.idcar and h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td align='center'>$a->curp</td>
				<td>$a->app $a->apm $a->nom</td>
				<td align='center'>09DIT0005O</td>
				<td>$a->idcar</td>
				<td>$a->descar</td>
				<td>12</td>
				<td>6</td>
				<td>$a->status</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>1</td>
				</tr>";
			
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>