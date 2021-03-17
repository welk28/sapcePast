<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>


</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];
		$fecha=date('Y/m/d');
		$idg=$_GET[idg];?>
        
	<section id="seccion">	
  		<?php
		/*print"
			<script languaje='JavaScript'>
				var respuesta=confirm('¿Realmente desea vaciar el horario?');
				if(respuesta==false)
				{
					window.location.href='horalumno.php?matricula=$matricula';
				}
			</script>";*/
			
			//echo"matricula: $matricula <br> idg: $idg <br>  usuario: $usuario <br> ";
			
			$grupos="select g.idh, h.idmat from hgrupo  as g, horario as h where g.idh=h.idh and g.idg='$idg' and periodo='$periodo';";
			$gru=mysql_query($grupos,$conexion);
			while($g=mysql_fetch_object($gru))
			{
				$numero="select matricula from cursa where idh='$g->idh';";
				$num=mysql_query($numero,$conexion);
				$n=mysql_num_rows($num);
				if($n<90)
				{
					$hay="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$g->idmat' and h.periodo='$periodo'";
					$ha=mysql_query($hay,$conexion);
					$nh=mysql_num_rows($ha);
					
					if($nh>0)
					{
						print"
						<script languaje='JavaScript'>
						alert('¡IMPOSIBLE cargar $g->idh, ya se encuentra en su horario!');
						</script>
						";
					}
					else
					{
					$cursa="insert into cursa (idh, matricula, opor, fecing, asigna) values ('$g->idh', '$matricula', '1', '$fecha', '$usuario');";
					}
				}
				else
				{
					print"
					<script languaje='JavaScript'>
					window.alert('No se cargó $g->idh, NO HAY CUPO, continuar');
					</script>";	
				}
				$cur=mysql_query($cursa,$conexion);	
			}
			print"
			<script languaje='JavaScript'>
			window.location.href='horalumno.php?matricula=$matricula';
			</script>";			
			
		?>
    </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>