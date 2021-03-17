<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "usuarios.php";	
		$idser=$_GET[idser];
		$fecha=$_GET[fecha];
		
	if(($ses==1)||($ses==6))
{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='../index.php';
				</script>
				";
}
		?>
	</header>
	<section id="seccion">
		<?php 
			if(empty($fecha))
			{
		?>
		<header id="header">
        	<div class="subtitulo" align='center'>Seleccione la fecha a auditar</div>
        	<br>
    	</header>
		<div id="registros" >

			<form name="form1" method="get" action="altaserv1.php" align="center">
				<input type="hidden" name="idser" value="<?php echo"$idser"; ?>" >
				<input type="date" name="fecha" >
				<input type="submit" value="Guardar">
			</form>

		</div>

		<?php 
			}
			else
			{
				//echo"$idser";
				//obtiene el valor de opcion de la tabla control
				$control="select opcion from control where id='10';";
				$con=mysql_query($control,$conexion);
				$c=mysql_fetch_object($con);
				//incremente el valor en uno
				$n=$c->opcion+1;
				//echo" <br> $n"; 

				//dar de alta en la tabla auditoria
				$alta="insert into auditoria (noev, idser, periodo, fecha) values ($n,'$idser','$periodo','$fecha');";
				$al=mysql_query($alta,$conexion);
				//actualizar valor de opcion en control
				$actualopcion="update control set opcion='$n' where id='10';";
				$actu=mysql_query($actualopcion,$conexion);

				if(($al)&&($actu))
				{
					print"
					<script>
						window.alert('Alta exitosa');
						window.location.href='altaserv.php';
					</script>
					";
				}
				/*else
				{
					if(!$al)
						echo"error al dar de alta";
					if(!$actu)
						echo"error al actualizar";
				}*/
			}
		?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>