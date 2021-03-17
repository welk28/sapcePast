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
		$noev=$_GET[noev];
		$idoc=$_GET[idoc];
		$idpuesto=$_GET[idpuesto];
		$descs=$_GET[descs];
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='index.php';
				</script>
				";
}
		?>
	</header>
	<section id="seccion">
		<?php 
			if(empty($idpuesto))
			{
		?>
		<header id="header">
        	<div class="subtitulo" align='center'>Seleccione miembro del equipo</div>
        	<br>
    	</header>
		<div id="registros" >
			<form name="form1" method="get" action="altaequipo.php">
				<table>
					<tr>
						<th >Evaluacion:</th>
						<td><input type="text" name="noev" value="<?php echo"$noev"; ?>" readonly></td>
					</tr>
					<tr>
						<th>Servicio:</th>
						<td><input type="text" name="descs" size="60" value="<?php echo"$descs"; ?>" readonly></td>
					</tr>
					<tr>
						<th>Auditor:</th>
						<td>
							<select name="idoc">
								<?php
								$docentes="select * from docente order by nomdoc;";
								$docen=mysql_query($docentes,$conexion);
								while($d=mysql_fetch_object($docen))
								{
									echo"<option value='$d->idoc' >$d->nomdoc</option>";
								}
								?>
								
							</select>
						</td>
					</tr>
					<tr>
						<th>Puesto:</th>
						<td>
							<select name="idpuesto">
								<?php
								//$puesto="select p.idpuesto, p.descp from puesto as p where not exists(select a.idpuesto from audita as a where a.noev='$noev')";
								  $puesto="select p.idpuesto, p.descp from puesto as p where not exists(select a.idpuesto from audita as a where a.idpuesto=p.idpuesto and a.noev='$noev');";
								$pu=mysql_query($puesto,$conexion);
								while($p=mysql_fetch_object($pu))
								{
									echo"<option value='$p->idpuesto' >$p->descp</option>";
								}
								?>
								
							</select>
						</td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" value="Agregar"></th>
					</tr>
				</table>
			</form>
		</div>
		<?php 
			}
			else
			{
				/*echo"
				idoc: $idoc  <br>
				idpuesto: $idpuesto <br>
				noev: $noev <br>
				";*/

				$guardaudita="insert audita values ($noev,'$idoc',$idpuesto)";
				$guarda=mysql_query($guardaudita);
				if(!$guarda)
				{
					print"
					<script>
						window.alert('Error al dar de alta');
						window.location.href='programa.php';
					</script>
					";
				}
				else
				{
					print"
					<script>
						window.alert('Alta exitosa');
						window.location.href='programa.php';
					</script>
					";
				}
			}
		?>
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>