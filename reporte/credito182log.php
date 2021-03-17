<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
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
    
    <header id="header">
			<div class="subtitulo">Lista de alumnos TICS 182 CREDITOS EN ADELANTE <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        
            
			<th >No</th>
            <th width="150">no_control</th>
            <th width="200">curp</th>
            <th >nombres</th>
            <th >app</th>
            <th >apm</th>
            <th >sem</th>
            <th width="50">genero</th>
            <th width="50">creditos</th>
        </tr>
        <?php
		$x=0;
		$alumnos="select distinct a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, a.idcar, a.email  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and a.idcar='ILOG-2009-202' and h.periodo='$periodo' and (a.status>=8 and a.status<=12 )  order by a.idcar, a.status;";
		$alum=mysql_query($alumnos,$conexion);
		
		while($al=mysql_fetch_object($alum)){
			$creditos=0;
			$materias="select c.idh, h.idmat, m.nommat, c.prom, m.credit from cursa as c, horario as h, materias as m where matricula='$al->matricula' and c.idh=h.idh and m.idmat=h.idmat;";
			$mat=mysql_query($materias,$conexion);
			while($m=mysql_fetch_object($mat)){
				if($m->prom>=70){
					$creditos=$creditos+$m->credit;
				}
			}
			if($creditos>=182){
			$x++;
			echo"
				<tr>
					<td align='center'>$x</td>
					<td align='center'>$al->matricula</td>
					<td align='center'>$al->curp</td>
					<td>$al->nom</td>
					<td>$al->app</td>
					<td>$al->apm</td>
					<td>$al->status</td>
					<td align='center'>$al->sexo</td>
					<td>$creditos</td>
				</tr>
			";
			}
		}		
		?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>