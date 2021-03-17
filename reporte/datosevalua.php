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
    <header id="cabecera">
		<?php 	include "../usuarios.php";	
		$periodo=$_SESSION['periodo'];
		 //$idcar='ITIC-2010-225';
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
  
    <header id="header">
			<div class="subtitulo">evaluaciones</div>
        <br>
    </header>

		<div id="registros" >
		    <?php 
		    	$horarios="select idh from horario where periodo='$periodo';";
				$hora=mysql_query($horarios,$conexion);
				while($h=mysql_fetch_object($hora))
				{
					for($a=1;$a<=48;$a++)
					{
						echo"insert respuesta (idh, nop) values ($h->idh,$a); <br>";
					}
				}
			?>
		 </div>
    </section>
    
    
    <p>&nbsp;</p>
</div>
</body>
</html>