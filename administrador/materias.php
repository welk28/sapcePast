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

		?>

	</header>

	

	

	<section id="seccion">

    

        <header id="header">

                <div class="subtitulo">Lista de Materias registradas <?php echo"$periodo: $p->descper"?></div>

            <br>

        </header>



    <div id="registros" >

    <table>

    	<tr>

        	<th align="center" width="">No</th>

            <th align="center" width="">Clave</th>

            <th align="center" width="">Descripción</th>

            <th align="center" width="" title="Créditos teórico-práctico">Créd</th>

            <th align="center" width="" title="Creditos totales de la materia">Creditos</th>

            <th align="center" width="">Modif</th>

            <th align="center" width="" title="Habilitar/Deshabilitar">Hab</th>

        </tr>

        <?php

		$materias="select * from materias order by nommat;";

		$mats=mysql_query($materias,$conexion);

		$x=0;

		while($m=mysql_fetch_object($mats))

		{

			$x++;

			echo"

			<tr>

				<td>$x</td>

				<td align='right'>$m->idmat</td>

				<td>$m->nommat</td>			

				<td align='center'>$m->cred</td>

				<td align='center'>$m->credit</td>

				<td><a href='$ip/administrador/momat.php?idmat=$m->idmat'>Modifi</a></td>

				<td align='center'><input name='hab' type='checkbox' value=''></td>

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