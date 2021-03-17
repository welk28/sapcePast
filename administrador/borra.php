<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="cuerpo">
    <header>
		<?php 	include "../usuarios.php";	
		$periodo=$_SESSION['periodo'];
		$matricula=$_GET[matricula];
		$quita="delete from alumnos where matricula='$matricula'";
	//echo"sesion: $quien <br>usuario: $usuario";
	
	
	$ag=mysql_query($quita,$conexion);
	if(!$ag)
	{
		echo"<div class='avisono'>no se borró, contacte al programador</div>";
	}
	else
	{
		print"
				<script languaje='JavaScript'>
				alert('¡borrado exitoso!');
				window.location.href='listaspirante.php';
				</script>
				";
	}
	

		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Alta de aspirante</div>
        <br>
    </header>

<div id="registros" ></div>
    </section>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
