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
			<div class="subtitulo">Cantidad de Alumnos Inscritos por Ciudad y Carrera <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >	<table >	  <tr>		<th><h3>ALUMNOS INSCRITOS<br />		SEGUN SU LUGAR DE NACIMIENTO: INGENIERIA EN TECNOLOGIAS DE LA INFROMACION Y COMUNICACIONES</h3></th>	  </tr>	</table>	
    <table>
    	<tr>
            <th width="90">Entidad</th>
            <th width="300">Total</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar, a.idedo  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' and a.idcar='ITIC-2010-225';";
		$als=mysql_query($alumnos,$conexion);		
		$edo=0;		$otro=0;		$total=0;
		while($a=mysql_fetch_object($als))
		{			if(($a->idedo==9)||($a->idedo==15)){				$edo++;				}						else{				$otro++;			}			$total=$edo+$otro;
    	}?>		<tr>			<td>CDMX o EDO MEXICO</td>			<td align="center"><?php echo"$edo"?></td>		</tr>		<tr>			<td>OTRA ENTIDAD</td>			<td align="center"><?php echo"$otro"?></td>		</tr>		<tr>			<td>Total</td>			<td align="center"><?php echo"$total"?></td>		</tr>
    </table>		<br><br><br>		<table >	  <tr>		<th><h3>ALUMNOS INSCRITOS<br />		SEGUN SU LUGAR DE NACIMIENTO: INGENIERIA EN LOGISTICA</h3></th>	  </tr>	</table>	    <table>    	<tr>            <th width="90">Entidad</th>            <th width="300">Total</th>        </tr>        <?php		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar, a.idedo  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' and a.idcar='ILOG-2009-202';";		$als=mysql_query($alumnos,$conexion);		$edo=0;		$otro=0;		$total=0;		while($a=mysql_fetch_object($als))		{			if(($a->idedo==9)||($a->idedo==15)){				$edo++;				}						else{				$otro++;			}			$total=$edo+$otro;    	}?>		<tr>			<td>CDMX o EDO MEXICO</td>			<td align="center"><?php echo"$edo"?></td>		</tr>		<tr>			<td>OTRA ENTIDAD</td>			<td align="center"><?php echo"$otro"?></td>		</tr>		<tr>			<td>Total</td>			<td align="center"><?php echo"$total"?></td>		</tr>    </table>		<br><br><br>		<table >	  <tr>		<th><h3>ALUMNOS INSCRITOS<br />		SEGUN SU LUGAR DE NACIMIENTO: INGENIERIA EN ADMINISTRACION</h3></th>	  </tr>	</table>	    <table>    	<tr>            <th width="90">Entidad</th>            <th width="300">Total</th>        </tr>        <?php		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar, a.idedo  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' and a.idcar='IADM-2010-213';";		$als=mysql_query($alumnos,$conexion);		$edo=0;		$otro=0;		$total=0;		while($a=mysql_fetch_object($als))		{			if(($a->idedo==9)||($a->idedo==15)){				$edo++;				}						else{				$otro++;			}			$total=$edo+$otro;    	}?>		<tr>			<td>CDMX o EDO MEXICO</td>			<td align="center"><?php echo"$edo"?></td>		</tr>		<tr>			<td>OTRA ENTIDAD</td>			<td align="center"><?php echo"$otro"?></td>		</tr>		<tr>			<td>Total</td>			<td align="center"><?php echo"$total"?></td>		</tr>    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>