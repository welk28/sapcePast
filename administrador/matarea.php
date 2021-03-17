<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";

		$cven=strtoupper($_GET[cven]);
        $tipom=$_GET[tipom];
        $depto=$_GET[depto];
        $idcar=$_GET[idcar];
        $idmat=$_GET[idmat];
        $sem=$_GET[sem];
        echo"
		$cven <br>
		$tipom <br>
		$depto <br> 
		$idcar <br> 
		$idmat <br> 
		$sem
        ";
        if(!empty($cven))
		{
			$modifposee="update posee set sem='$sem', cven='$cven', tipom='$tipom' where idcar='$idcar' and idmat='$idmat';";
			$mpos=mysql_query($modifposee,$conexion);
			
			$modifmat="update materias set depto='$depto' where idmat='$idmat';";
			$modm=mysql_query($modifmat,$conexion);
			if($mpos)
			{
				print"
				<script languaje='JavaScript'>
				alert('¡modificacion exitosa!');
				</script>
				";
			}	
		}

		?>
	</header>
	
	
	<section id="seccion">
    
        <header id="header">
                <div class="subtitulo"><a href="matareaimp.php">Lista de Materias Asignadas a Carreras</a> <br> PUSE LA CLAVE DE LA MATERIA COMO REFERENCIA PARA MICHEL <br> ARCHIVO DE REFERENCIA: materias.xlsx </div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	
        	<th align="center" width="">Materia</th>
        	<th align="center" width="">Niv Esc</th>
        	<th align="center" width="">Tipo Mat</th>
        	<th align="center" width="">Clave Area</th>
            <th align="center" width="">Nombre Completo</th>
            <th align="center" width="">Nombre Reducido</th>
            <th align="center" width="">Clave</th>
            <th align="center" width="">Sem</th>
            <th align="center" width="100">Carrera</th>
            <th align='right'>Mod</th>
            
        </tr>
        
        	
        
        <?php

		$materias="select distinct m.idmat, m.nommat, m.cred, m.depto, m.unid, p.sem, p.idcar, p.cven, p.tipom, m.idesp from materias as m, posee as p where m.idmat=p.idmat order by p.idcar, p.sem;";
		$mats=mysql_query($materias,$conexion);
		$x=0;
		while($m=mysql_fetch_object($mats))
		{
			$x++;
			echo"
			<form method='get' action='matarea.php'>
			<tr>
				
				<td align=''><input type='text' size='4' value='$m->cven' name='cven'></td>
				<td align='center'>L</td>
				<td align='right'>";

				if(empty($m->idesp))
					echo"<input type='text' size='2' maxlength='1' value='1' name='tipom' placeholder='1 o 3'>";
				else
					echo"<input type='text' size='2' maxlength='1' value='3' name='tipom' placeholder='1 o 3'>";
			echo"
				</td>
				<td><input type='text' size='40' value='$m->depto' name='depto'></td>
				<td>$m->nommat</td>	
				<td>$m->nommat</td>		
				<td align='right'><input type='hidden' name='idmat' value='$m->idmat'>$m->idmat</td>
				<td align='center'><input type='text' name='sem' value='$m->sem' size='2'></td>
				<td><input type='hidden' name='idcar' value='$m->idcar'>$m->idcar</td>
				<td><input class='guardacal' type='image' name='Submit' value='Submit' src='$ip/img/hecho.png' width='20' height='20'></td>
			</tr>
			</form>
			"; 
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>