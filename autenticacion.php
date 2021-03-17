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
			
			$admin="select * from alumnos where matricula='$us' and passal=sha1('$clave');";
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
					window.location.href='evadoc151/horalumno.php';
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
		
		if($tipo=='academico')
		{
			$admin="select * from academico where idacad='$us' and passacad=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=3;
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
		if($tipo=='coordinador')
		{
			$admin="select * from coordinador where idcor='$us' and passcor=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=4;
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
		if($tipo=='dep')
		{
			$admin="select * from division where idiv='$us' and passd=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=5;
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
		
		if($tipo=='docente')
		{
			$admin="select * from docente where idoc='$us' and passdoc=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$contrase="select contra from docente where idoc='$us';";
				$contra=mysql_query($contrase,$conexion);
				$con=mysql_fetch_object($contra);
				if($con->contra==1)
				{
					print"
					<script languaje='JavaScript'>
						window.alert('ES LA PRIMERA VEZ QUE INGRESA, MODIFICAR CONTRASEÑA');
						window.location.href='administrador/modcontraus.php';
					</script>
					";
					$_SESSION['usuario']=$us;
					$_SESSION['quien']=6;
				}
				else
				{
					$_SESSION['usuario']=$us;
					$_SESSION['quien']=6;
					print"
					<script languaje='JavaScript'>
						window.location.href='panel.php';
					</script>
					";
				}
				
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
		if($tipo=='da')
		{
			$admin="select * from docente where idoc='$us' and passdoc=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=11;
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
		if($tipo=='scicom')
		{
			$admin="select * from administrador where adm='$us' and passadm=sha1('$clave');";
			$adm=mysql_query($admin,$conexion);
			$n=mysql_num_rows($adm);
			$a=mysql_fetch_object($adm);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=10;
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
		if($tipo=='subdireccion')
		{
			$subdir="select * from subdireccion where idsub='$us' and passub=sha1('$clave');";
			$sub=mysql_query($subdir,$conexion);
			$n=mysql_num_rows($sub);
			$a=mysql_fetch_object($sub);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=12;
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
		if($tipo=='depto')
		{
			$subdir="select * from encarga where iddepto='$us' and passd=sha1('$clave');";
			$sub=mysql_query($subdir,$conexion);
			$n=mysql_num_rows($sub);
			$a=mysql_fetch_object($sub);
			if($n>=1)
			{
				$_SESSION['usuario']=$us;
				$_SESSION['quien']=13;
				if($us=='DEP')
				{
					//$_SESSION['periodo'] = "2016-2";
				}
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
