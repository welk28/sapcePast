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
    <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a></div>
   <header id="header">
			<div class="subtitulo2">Lista de alumnos Por CARRERA-PROMEDIO <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >

        <br>
    <?php
    	$carreras="select * from carrera;";
    	$carre=mysql_query($carreras,$conexion);
    	while($c=mysql_fetch_object($carre))
    	{
    ?>
	    <table>
	    	<tr>
	        	<th width="30">No</th>
	            <th width="100">Control</th>
	            <th width="650">Nombre</th>
	            <th width="30">Sem</th>
	            <th width="140">Carrera</th>
	            <th width="50">Promedio</th>
	        </tr>
	        <?php
			//$alumnos="select distinct c.matricula, a.app, a.apm, a.nom, a.status, a.idcar, avg(c.prom) as promedio from cursa as c, horario as h, alumnos as a where c.idh=h.idh and c.matricula=a.matricula and h.periodo='$periodo' group by c.matricula order by avg(c.prom) desc;";
			$alumnos="select c.matricula, h.idmat, a.app, a.apm, a.nom, a.status, a.idcar, avg(c.prom) as promedio from cursa as c, horario as h, alumnos as a where c.idh=h.idh and c.matricula=a.matricula and a.idcar='$c->idcar' and h.periodo='$periodo' group by c.matricula order by avg(c.prom) desc;";
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
					<td align='center'>$a->status</td>
					<td>$a->idcar</td>
					<td align='right'>";printf("%0.2f",$a->promedio); echo"</td>
				</tr>
				"; 
	    	}?>
	    </table>

    <?php
		}
    ?>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>