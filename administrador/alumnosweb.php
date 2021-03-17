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
    
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.idedo, a.idesc, a.sexo, a.idcar  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		echo"insert into alumnos (matricula, nom, app, apm, sexo, status, idedo, idesc,idcar, passal) values  <br>";
		while($a=mysql_fetch_object($als))
		{
			
			echo"
			('$a->matricula', '$a->nom', '$a->app', '$a->apm', '$a->sexo', '$a->status', $a->idedo, $a->idesc, '$a->idcar', sha1('TEC')), <br>

			";
    	}?>;
    	

	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>