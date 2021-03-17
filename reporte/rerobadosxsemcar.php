<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
	
	
	<section id="seccion">
    <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a></div>
    <header id="header">
			<div class="subtitulo2">Lista de alumnos en REPETICIÓN en el semestre actual <?php echo"$periodo: $p->descper"?></div>
            
           
        <br>
    </header>

    <div id="registros" >
    <?php
	$carrera="select * from carrera";
	$carre=mysql_query($carrera,$conexion);
	while($ca=mysql_fetch_object($carre))
	{
    echo"
	<div class='subtitulo2'> CARRERA: $ca->descar  </div>
	<table>
    	<tr>
        	<th width='21'>No</th>			
            <th width='90'>Control</th>
            <th width='250'>Nombre</th>
            <th width='38'>Sem</th>
            <th width='54'>Horario</th>
        </tr>";
        
		
		$alumnos="select distinct c.matricula, a.app, a.apm, a.nom, a.status from horario as h, alumnos as a, cursa as c where h.idh=c.idh and c.matricula=a.matricula and h.periodo='$periodo' and c.opor='2' and a.idcar='$ca->idcar' order by a.matricula desc;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td>$a->matricula</td>
				<td>$a->app $a->apm $a->nom</td>
				<td align='center'>$a->status</td>
				<td align='center'><a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom'>Ver</a></td>
			</tr>
			"; 
    	}
    echo"</table>
	
			<STYLE>
			H1.SaltoDePagina
			{
			PAGE-BREAK-AFTER: always;
			}
			</STYLE>
			
			<H1 class=SaltoDePagina> </H1>";
	
	}?>
	</div>
        
	</section>
	
</div>
</body>
</html>