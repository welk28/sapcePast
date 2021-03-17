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

		<?php 	include "../usuarios.php"; ?>

	</header>

	

	

	<section id="seccion">

    

        <header id="header">

                <div class="subtitulo">Lista de Carreras registradas</div>

            <br>

        </header>



    <div id="registros" >

    <table>

    	<tr>

        	<th align="center" width="">No</th>

            <th align="center" width="">ID</th>

            <th align="center" width="">Descripción</th>

            

            <th align="center" width="">Modif</th>

        </tr>

        <?php

		$carre="select * from carrera;";

		$ca=mysql_query($carre,$conexion);

		$x=0;

		while($c=mysql_fetch_object($ca))

		{

			$x++;

			echo"

			<tr>

				<td>$x</td>

				<td align='center'><a href='reticulacarreras.php?idcar=$c->idcar' target='_blank'>$c->idcar</a></td>

				<td>$c->descar</td>			

				<td align='center'><a href='mocarr.php?idcar=$c->idcar'>mod</a></td>

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