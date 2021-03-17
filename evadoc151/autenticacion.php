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
  		$us= strtoupper($_POST[usuario]);
  		$clave= strtoupper($_POST[clave]); 
 		//$clave='123'; 
			
		
		$sqlp="select periodo from periodo where predet='1';";
	  	$rp=mysql_query($sqlp,$conexion);
	  	$rper=mysql_fetch_object($rp);
	  	$periodo=$rper->periodo;
		//$_SESSION['periodo'] = $periodo;
		$_SESSION['periodo'] = "2018-1";
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
			
					print"
					<script languaje='JavaScript'>
						window.location.href='../auditoria/index.php';
					</script>
					";
				
			}
			else
			{
				print"
				<script languaje='JavaScript'>
				alert('USUARIO O CONTRASEÑA INCORRECTO, VUELVA A INTENTARLO xxx');
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
