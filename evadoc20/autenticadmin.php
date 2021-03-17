<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<meta charset="UTF-8">
</head>
<body>
<div id="cuerpo">
	<header>
		<?php 	
		include "conexion.php";
		$conexion=conectar();
		
  		$us= strtoupper($_POST[user]); 
 		$clave= strtoupper($_POST[clave]); 
		
$evaluando="select * from periodo where predet='1'";
			$evan=mysql_query($evaluando,$conexion);
			$en=mysql_fetch_object($evan);
$_SESSION['perevadoc'] = $en->des;
$_SESSION['periodo']=$en->periodo;
		?>
	</header>
	
	
	<section id="seccion">
		<?php
		
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
				window.location.href='indexadm.php';
				</script>
				";
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
