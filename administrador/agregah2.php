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
		$periodo=$_SESSION['periodo'];
		
		$idmat=$_GET[idmat];
		$idh=$_GET[idh];
		$idcar=$_GET[idcar];
		$idg=$_GET[idg];
	echo"idcar: $idcar <br>idg: $idg <br> idh=$idh";
		?>
	</header>
	<section id="seccion">
           <div id="registros" >
        <?php
        $quitar="select p.idh, p.idg, h.idmat from hgrupo as p, horario as h where p.idh=h.idh and h.idmat='$idmat' and h.periodo='$periodo'  and p.idg='$idg';";
			$qui=mysql_query($quitar,$conexion);
			$quin=mysql_num_rows($qui);
			if($quin>0)
				{
					echo"<div class='avisono'>Error, no puede dar de alta esta materia, ya lo tiene cargado el grupo $idg </div>";
					echo" <br> <p align='center' class='liga'><a href='hexis.php?&idcar=$idcar&idg=$idg' target='_self'>Agregar otra materia existente en horario</a> -------
					 <a href='agregah.php?&idcar=$idcar&idg=$idg' target='_self'>Regresar a seleccionar materia/docente </a></p>";
				}
				else
				{
					
					$altagrupo="insert hgrupo values ('$idh','$idg');";
					$altag=mysql_query($altagrupo,$conexion);
					if(!$altag)
					{
						print"
						<script language='JavaScript'>
							window.alert('Error al guardar, notifique al programador');
							window.location='horario.php';
						</script>";
						
					}
					else
					{
						print"
						<script languaje='JavaScript'>
						var respuesta=confirm('Alta exitosa, ¿Desea agregar otra materia a $idg ?');
						if(respuesta==true)
						{
							window.location.href='agregah.php?&idcar=$idcar&idg=$idg';
						}
						else
						{
							window.location.href='horario.php';
						}
						</script>";
							}
				}
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