<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MXo</title>
<meta charset="UTF-8">
</head>
<body>
<div id="cuerpo">
	<header>
		<?php 	
		include "conexion.php";
		$conexion=conectar();
		$tipo=$_POST[tipo];
  		$us= strtoupper($_POST[user]); 
 		$clave= strtoupper($_POST[clave]); 
			
		$sqlp="select periodo from periodo where predet='1';";
	  	$rp=mysql_query($sqlp,$conexion);
	  	$rper=mysql_fetch_object($rp);
	 
	  	$periodo=$rper->periodo;
		$_SESSION['periodo'] = $periodo;
		?>
	</header>
	
	
	<section id="seccion">
		<?php
		if($tipo=='alumno')
		{
			
			$admin="select * from alumnos where matricula='$us' and fecnac='$clave';";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=1;
				//$_SESSION['periodo'] = "2016-2";
				print"
				<script languaje='JavaScript'>
					window.location.href='panel.php';
				</script>
				";
			}
			else
			{
				print"
				<script languaje='JavaScript'>
				alert('USUARIO O CONTRASEÑA INCORRECTO, VUELVA A INTENTARLO');
				window.location.href='index.php';
				</script>
				";
			}
		}
		
		if($tipo=='administrador')
		{
			$admin="select * from administrador where adm='$us' and passadm=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=2;
				print"
				<script languaje='JavaScript'>
					window.location.href='panel.php';
				</script>
				";
			}
			else
			{
				print"
				<script languaje='JavaScript'>
				alert('USUARIO O CONTRASEÑA INCORRECTO, VUELVA A INTENTARLO');
				window.location.href='index.php';
				</script>
				";
			}
		}
		?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
