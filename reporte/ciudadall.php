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

    <header id="cabecera">

		<?php 	include "../usuarios.php";	

		$periodo=$_SESSION['periodo'];

		 //$idcar='ITIC-2010-225';

	//echo"sesion: $quien <br>usuario: $usuario";

		?>

	</header>

    <section id="seccion">

    <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  

        </div>

    <header id="header">

			<div class="subtitulo">Total de alumnos por carrera/semestre</div>

        <br>

    </header>



<div id="registros" >





    <?php 

	$carrera="select * from carrera where idcar<>'POR ASIGNAR' order by idcar desc; ";

  $carr=mysql_query($carrera,$conexion);

  $total=0;

  while($car=mysql_fetch_object($carr))

  {

  		echo"

		<STYLE>

		H1.SaltoDePagina

		{

			PAGE-BREAK-AFTER: always

		}

		</STYLE>

		<H1 class=SaltoDePagina> </H1>";









echo"

	<table >

	  <tr>

		<th><h3>REPORTE GENERAL DE ALUMNOS <br />

		SEGUN SU LUGAR DE NACIMIENTO: $car->descar </h3></th>

	  </tr>

	</table>



	<table width='50%' border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#000000'>

	<tr>

		<th width='10%' class='title'><div align='center'>No</div></th>

		<th width='59%' class='title'><div align='center'>Estado / Ciudad </div></th>

		<th width='31%' class='title'><div align='center'>Cantidad</div></th>

  	</tr>";

	  $x=0;

	  $totca=0;

	  $estado="select * from estado;";

	  $edo=mysql_query($estado,$conexion);

	  $ca=1;

	  while($e=mysql_fetch_object($edo))

	  {

  		$x++;

		$cant="select distinct c.matricula from cursa as c, alumnos as a, horario as h where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' and a.idcar='$car->idcar' and  a.idedo='$e->idedo';";

		$ca=mysql_query($cant,$conexion);

		$c=mysql_num_rows($ca);

		$totca+=$c;

		  echo"

		  <tr>

			<td  align='center'>$x</td>

			<td >$e->edo</td>

			<td  align='center'>$c</td>

		  </tr>";

  		}

		echo"

		<tr>

				<th  colspan='2'>Total</th>

				

				<th >$totca</th>

			  </tr>

		</table><br><br>";	

}	

	?>

      </div>

    </section>

    

    

    <p>&nbsp;</p>

</div>

</body>

</html>

