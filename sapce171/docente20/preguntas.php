<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link rel="stylesheet" type="text/css" href="/css/imprimir.css" media="print" />
</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$nop=$_GET[nop];
		$pregunta=$_GET[pregunta];
	
		
		$guardap="update pregunta set pregunta='$pregunta' where nop='$nop';";
		$gua=mysql_query($guardap,$conexion);
		
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  </div>
	</header>
	<section id="seccion">
    
        <header id="header">
        <div class="subtitulo" align="center">PREGUNTAS PARA EVALUACION DOCENTE <br><br></div>
           
        </header>

        <div id="evadoc" >
       		
            <br><br>
            <?php 
				$pregunta="select * from pregunta order by nop;";
				$preg=mysql_query($pregunta,$conexion);
				
				echo"
					<table>
					<tr>
						<th width='30px' >NO</th>
						<th width='700px' >PREGUNTA</th>
						<th >mod</th>
						<th ></th>
					</tr>
					";
				while($pr=mysql_fetch_object($preg))
				{	
					echo"
					<form method='get' action='preguntas.php' name='pregunta'>
					<tr>
						<td width='30px' > <input size='2' type='text' name='nop' value='$pr->nop' ></td>
						<td width='800px'> <input size='110'type='text' name='pregunta' value='$pr->pregunta'></td>
						<td width=''> <input size='3'type='text' name='modulo' value='$pr->nomod'></td>
						<td ><input type='submit' value='en'></td>
					</tr>
					</form>
					";
					
				}
				echo"</table>";
			?>
       	</div>
      
  </section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>