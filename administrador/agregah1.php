<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		
		$numero="select opcion from control where id='5';";
		$num=mysql_query($numero,$conexion);
		$n=mysql_fetch_object($num);
		$nh=$n->opcion +1;
		$periodo=$_SESSION['periodo'];
		$idmat=$_GET[idmat];
		$idoc=$_GET[idoc];
		$idcar=$_GET[idcar];
		$idg=$_GET[idg];
		$cupo=$_GET[cupo];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
	<section id="seccion">
    <?php
	$alta="insert into horario (idh,idoc,idmat,periodo,cupo) values ('$nh','$idoc','$idmat','$periodo',$cupo)";
	$al=mysql_query($alta,$conexion);
	
	$altagrupo="insert hgrupo values ('$nh','$idg');";
	$altag=mysql_query($altagrupo,$conexion);
	
	$modif="update control set opcion='$nh' where id='5';";
	$mod=mysql_query($modif,$conexion);
	if(!$al)
	{
		echo"error al dar de alta el horario, póngase en contacto con el programador";	
		exit();
	}
	else
	{
		print"
		<script language='JavaScript'>
			window.location='agregadia.php?idh=$nh&idcar=$idcar&idg=$idg';
		</script>
		
		";
	}
	?>
       
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>