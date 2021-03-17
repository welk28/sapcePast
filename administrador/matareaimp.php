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
                <div class="subtitulo"><a href="matareaimp.php">Lista de Materias Asignadas a Carreras</a> </div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	
        	<th align="center" width="">Materia</th>
        	<th align="center" width="">Nivel Escolar</th>
        	<th align="center" width="">Tipo Materia</th>
        	<th align="center" width="">Clave Area</th>
            <th align="center" width="">Nombre Completo</th>
            <th align="center" width="">Nombre Reducido</th>
          
            
            
        </tr>
        
        	
        
        <?php

		$materias="select distinct m.idmat, m.nommat, m.cred, m.depto, m.unid, p.sem, p.idcar, p.cven, p.tipom, m.idesp from materias as m, posee as p where m.idmat=p.idmat order by p.idcar, p.sem;";
		$mats=mysql_query($materias,$conexion);
		$x=0;
		while($m=mysql_fetch_object($mats))
		{
			$x++;
			echo"
			
			<tr>
				
				<td align=''>$m->cven</td>
				<td align='center'>L</td>
				<td align='right'>";

				if(empty($m->idesp))
					echo"1";
				else
					echo"3";
			echo"
				</td>
				<td>$m->depto</td>
				<td>$m->nommat</td>	
				<td>$m->nommat</td>		
				
				
				
			</tr>
			
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