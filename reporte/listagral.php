<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="<?php echo"$ip/css/imprimelistasgral.css"; ?>" rel="stylesheet" type="text/css" >
<link rel="stylesheet" type="text/css" href="<?php echo"$ip/css/imprimelistasgral.css"; ?>" media="print" />



</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	
			include "../conexion.php";
			$conexion=conectar();
			$usuario=$_SESSION['usuario'];
			$periodo=$_SESSION['periodo'];	
		?>
	</header>
	<section id="seccion">
	<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>    </div>
		<?php 
			$docentes="select d.nomdoc, d.idoc, h.idh from docente as d, horario as h where h.idoc=d.idoc and h.periodo='2014-2';";
			$docen=mysql_query($docentes,$conexion);
			while($d=mysql_fetch_object($docen))
			{
				echo"
			    <div class='SaltoDePagina'><p>datos en la siguiente página</p></div>
			    ";
			}
	    ?>
    </section>
    
</section>

<footer >
		
	</footer>
</div>

</body>
</html>