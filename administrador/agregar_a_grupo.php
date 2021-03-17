<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>

	
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	$matricula=$_GET[matricula];
	$idh=$_GET[idh];
	$idmat=$_GET[idmat];
    $idcar=$_GET[idcar];
	$alumnosd="select * from alumnos where matricula='$matricula';";
	$alud=mysql_query($alumnosd,$conexion);
	$ad=mysql_fetch_object($alud);
	
	$horarios="select distinct d.nomdoc, m.nommat from horario as h, docente as d, materias as m where h.idoc=d.idoc and h.idmat=m.idmat and h.idh='$idh';";
    $hora=mysql_query($horarios,$conexion);
    $ho=mysql_fetch_object($hora);
		print"
				<script languaje='JavaScript'>
				    respuesta= confirm('¡¿Desea agregar al alumno en: $ho->nommat ?!');
				    if(respuesta==true)
                        window.location.href='agregar_a_grupo1.php?matricula=$matricula&idh=$idh&idcar=$idcar';
                    else
                        window.close();
				</script>
				";

	
		
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Alta de materia a horario de alumno <?php echo"$periodo $p->descper"?></div>
            <br>
        </header>  
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>