<?php  session_start();  ?>
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
	<?php 	include "usuarios.php";	
	if(($ses==1)||($ses==6)){
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
            <th width="10">S</th>
            <th width="100">Fecnac</th>
            <th width="10">Ed</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar  from alumnos as a, horario as h, cursa as c where not exists (select distinct matricula from responde as r where r.matricula=a.matricula) and h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td>$a->matricula </td>
				<td> $a->app $a->apm $a->nom
				</td><td align='center'>$a->sexo</td>
				<td align='center'>$a->fecnac</td>";
				$fechanacimiento=$a->fecnac;
				list($ano,$mes,$dia) = explode("-",$fechanacimiento);
				$edad= date("Y") - $ano;		
				echo"
				<td align='center'>$edad</td>
				<td align='center'>$a->status</td>		
				<td>$a->idcar</td>
			</tr>"; 

    	}?>

    </table>

	</div>

        

	</section>

	<div style="clear: both; width: 100%;"></div>

	

</div>

</body>

</html>