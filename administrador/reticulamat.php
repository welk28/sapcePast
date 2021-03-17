<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";


		$idcar=$_GET[idcar];
        $idmat=$_GET[idmat];

		$credit=$_GET[credit];
        $prerre=$_GET[prerre];
        $ht=$_GET[ht];
        $hp=$_GET[hp];
        $orden=$_GET[orden];
        $renglon=$_GET[renglon];
        $status=strtoupper($_GET[status]);

        /*echo"
        idcar: $idcar <br> 
		idmat: $idmat <br>
		credit: $credit <br>
		prerre: $prerre <br>

		ht: $ht <br> 
		hp: $hp <br> 
		orden: $orden <br> 
		renglon: $renglon <br> 
		status: $status
		 
		
        ";*/
        if(!empty($status))
		{

			echo"ENTRA A LA VALIDACION";
			$modifposee="update posee set prerre='$prerre', ht='$ht', hp='$hp', orden='$orden', renglon='$renglon', status='$status' where idcar='$idcar' and idmat='$idmat';";
			$ejemod=mysql_query($modifposee,$conexion);


			$modmateria="update materias set credit='$credit' where idmat='$idmat';";
			$mmat=mysql_query($modmateria,$conexion);
			if($ejemod)
			{
				print"
				<script languaje='JavaScript'>
				alert('¡modificacion exitosa!');
				</script>
				";
			}	
			else
				{echo"ERROR DE CONSULTA";}
		}

		?>
	</header>
	
	
	<section id="seccion">
    
        <header id="header">
                <div class="subtitulo"><a href=".php">RETICULA: Materias Asignadas</a> <br> Archivo de referencia para MICHEL, sólo hay un apartado para PABLO. reticulas.xlsx<br></div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th align="center" width="">Carr</th>
        	<th align="center" width="">Retic</th>
        	<th align="center" width="">Materia</th>
        	<th align="center" width="">Espec</th>
        	<th align="center" width="">Clave Oficial</th>
            <th align="center" width="">Credi<br>tos</th>
            <th align="center" width="">Prerre<br>quisito</th>
            <th align="center" width="">Hrs <br>Teori</th>
            <th align="center" width="">Hrs <br>Prac</th>
            <th align="center" width="">Orden <br> Certif <br>(Pablo)</th>
            <th align="center" width="">Sem</th>
            <th align="center" width="">Renglon</th>
            <th align="center" width="">Status</th>
            <th align="center" width="100">Carrera</th>
            <th align='right'>Mod</th>
        </tr>
         
        <?php

		$materias="select distinct m.idmat, m.nommat, m.credit, m.depto, m.unid, p.sem, p.idcar, p.cven, p.tipom, m.idesp, c.cvec, c.reticula, p.prerre, p.ht, p.hp, p.orden, p.renglon, p.status from carrera as c, materias as m, posee as p where c.idcar=p.idcar and m.idmat=p.idmat order by p.idcar, p.sem;";
		$mats=mysql_query($materias,$conexion);
		$x=0;
		while($m=mysql_fetch_object($mats))
		{
			$x++;
			echo"
			<form method='get' action='reticulamat.php'>
			<tr>
				<td align=''>$m->cvec</td>
				<td align=''>$m->reticula</td>
				<td align=''>$m->cven</td>
				<td align=''>$m->idesp</td>
				<td align='right'><input type='hidden' name='idmat' value='$m->idmat'>$m->idmat</td>
				<td align='right'><input type='text' size='2' name='credit' value='$m->credit'></td>
				<td align='right'><input type='text' size='2' name='prerre' value='5'></td>
				<td><input type='text' size='2' value='$m->ht' name='ht'></td>
				<td><input type='text' size='2' value='$m->hp' name='hp'></td>
				<td><input type='text' size='2' value='$m->orden' name='orden'></td>
				<td>$m->sem</td>
				<td><input type='text' size='2' value='$m->renglon' name='renglon'></td>
				<td><input type='text' size='2' value='$m->status' name='status' placeholder='A/N'></td>
				
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