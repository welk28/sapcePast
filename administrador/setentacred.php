<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		
		
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);
		?>
        <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  <?php echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>
<a href='horalumno.php?matricula=$matricula' title='HORARIO'>Horario</a>";
if($ses==2)
{
  echo"<a href='reticula_calificacion.php?matricula=$matricula&idcar=$ad->idcar' target='_blank'>Retícula</a>";
}
       echo" ";?>
        </div>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
    <div class="subtitulo2">Lista de alumnos con 70% créditos
			<?php echo"$periodo $p->descper  " ;?>
	</div>
    	<table >
          <tr>
            <td width="368" rowspan="2"><img src="../css/logo_footer.png" width="201" height="71" /></td>
            <td width="602" align="right"><img src="../img/logodgest.png" width="114" height="65" /></td>
          </tr>
          <tr>
            <td align="right"><b>TECNOLÓGICO NACIONAL DE MÉXICO</b><br />
            Instituto Tecnológico de Iztapalapa II</td>
          </tr>
          <tr>
          	<td colspan="2" align="center"><?php echo"$emble";?></td>
          </tr>
      </table>
   </header>
   <div id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th>
            
			
            <th width="90">Control</th>
            <th width="300">Nombre</th>
            <th width="10">S</th>
            <th width="109">Carrera</th>
            <th width="84">Historial</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{

			$creditos="select c.idh,h.idmat, m.credit, c.matricula from cursa as c, horario as h, materias as m where m.idmat=h.idmat and h.idh=c.idh and c.prom>=70 and c.matricula='$a->matricula';";
			$cred=mysql_query($creditos,$conexion);
			$sum=0;
			while($cr=mysql_fetch_object($cred))
			{
				$sum+=$cr->credit;
			}
			if($sum>=182)
			{
			$x++;
			echo"
			<tr>
				<td>$x</td>";
				echo"<td>$a->matricula</td>
				<td>$a->app $a->apm $a->nom</td>
				<td align='center'>$a->status</td>
				<td>$a->idcar</td>
				<td align='center'><a href='historial.php?matricula=$a->matricula' target='_self' title='HISTORIAL de $a->nom'>Historial</a></td>
			</tr>
			"; 
			}
    	}?>
    </table>
	</div>
	
</div>
</body>
</html>