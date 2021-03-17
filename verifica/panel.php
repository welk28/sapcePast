<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

<meta charset="UTF-8">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	

		$usuario=$_SESSION['usuario'];
		include "usuarios.php";	?>
	</header>
	
	
	<section id="seccion">
	<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  </div>

		<?php 

		$promedio="select avg(c.prom) as promedio from cursa as c, horario as h where h.idh=c.idh and h.periodo='2018-1' and c.matricula='$usuario';";
		$prome=mysql_query($promedio,$conexion);
		$p=mysql_fetch_object($prome);
		$prom=$p->promedio;
		//ADMINISTRACION
		if($d->idcar=='IADM-2010-213'){
			//89-100
			if(($prom>=89)&&($prom<=100)) $hora="09:00 - 10:00";
			//85-89
			if(($prom>=85)&&($prom<89)) $hora="10:00 - 11:00";
			//75-85
			if(($prom>=75)&&($prom<85)) $hora="11:00 - 12:00";
			//67-75
			if(($prom>=67)&&($prom<75)) $hora="12:00 - 13:00";
			//40-67
			if(($prom>=40)&&($prom<67)) $hora="13:00 - 14:00";
			//0-40
			if(($prom>=0)&&($prom<40)) $hora="14:00 - 15:00";
		}
		//TICS
		if($d->idcar=='ITIC-2010-225')
		{
			//87-100
			if(($prom>=87)&&($prom<=100)) $hora="09:00 - 10:00";
			//77-87
			if(($prom>=77)&&($prom<87)) $hora="10:00 - 11:00";
			//53-77
			if(($prom>=53)&&($prom<77)) $hora="11:00 - 12:00";
			//13-53
			if(($prom>=13)&&($prom<53)) $hora="12:00 - 13:00";
			//0-13
			if(($prom>=0)&&($prom<13)) $hora="13:00 - 14:00";
			//50-0
			//if(($prom>=0)&&($prom<44)) $hora="14:30 - 15:00";
		}
		//LOGISTICA
		if($d->idcar=='ILOG-2009-202')
		{
			//84-100
			if(($prom>=84)&&($prom<=100)) $hora="09:00 - 10:00";
			//65-84
			if(($prom>=65)&&($prom<84)) $hora="10:00 - 11:00";
			//11-65
			if(($prom>=11)&&($prom<65)) $hora="11:00 - 12:00";
			//0-11
			if(($prom>=0)&&($prom<11)) $hora="12:30 - 13:30";
		}







		$adeuda="select * from adeuda where matricula='$usuario' and status='1';";
		$ade=mysql_query($adeuda,$conexion);
		$na=mysql_num_rows($ade);
		if($na>0)
		{
			echo"<div class='avisono'>NO PUEDE REINSCRIBIRSE, TIENE ADEUDO CON: "; 
			while($n=mysql_fetch_object($ade))
			{
				if($n->iddepto=='CI')
				{
					echo"CENTRO DE INFORMACION, POR: $n->descrip";
				}
				else
				{
					if($iddepto=='CI')echo"RECURSOS FINANCIEROS, POR: $n->descrip";
				}
			}

			echo"</div>";
		}
		
		echo"
			<h1>$d->app $d->apm $d->nom </h1>
			SEMESTRE: <h1>$d->status</h1><br>
			CARRERA:  <h1>$d->descar</h1><br>
			PROMEDIO: <h1>";
			printf("%0.2f",$p->promedio);
			echo"</h1> <br>
			DIA INSCRIPCION:";
			if($d->idcar=='IADM-2010-213') echo"<h1>MIERCOLES 22 de agosto 2018</h1>";
			else
			{
				if($d->idcar=='ITIC-2010-225') echo"<h1>MARTES 21 de agosto 2018</h1>";
				else
				{
					echo"<h1>LUNES 20 de agosto 2018</h1>";
				}
			}
			echo" <br>
			HORA: <h1>$hora</h1><br>
		 ";

		 include "horalumnover.php";
		 ?>
	
	
		
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
