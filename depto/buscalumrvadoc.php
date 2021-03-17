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

	$matricula=$_GET[matricula];

	$nombre=$_GET[nombre];

		?>

	</header>

	

	

	<section id="seccion">

    

    <header id="header">

    	<table>

    		<tr>

    			<td>

    				<form action="buscalumrvadoc.php" method="get">

    				<input type="text" name="matricula" placeholder="matricula"> <input type="submit" value="Buscar">

    				</form>

    			</td>

    			<td></td>

    			<td></td>

    			<td>

    				<form action="buscalumrvadoc.php" method="get">

				    	<input type="text" name="nombre" placeholder="nombre o apellido"> <input type="submit" value="Buscar">

				    </form>



    			</td>

    		</tr>

    	</table>

   	 

    

   		<?php 

   			if(!empty($matricula))

			{

				$alumnos="select * from alumnos where matricula like '%$matricula%';";

			}

			else

			{

				if(!empty($nombre))

				{

					$alumnos="select * from alumnos where (app like '%$nombre%') or (apm like '%$nombre%') or (nom like '%$nombre%')";

				}

				else

				{

					echo"<div class='subtitulo'>DEBE INGRESAR DATOS </div>";

				}

			}

   		?>

			<div class="subtitulo">Coincidencias encontradas <?php echo"$periodo: $p->descper: $matricula";?> </div>

        <br>

    </header>



    <div id="registros" >

    <table>

    	<tr>

        	<th width="21">No</th>

         

            <th width="90">Control</th>

            <th width="300">Nombre</th>

            <th width="10">S</th>

            <th width="100">Fecnac</th>

            <th width="10">Ed</th>

            <th width="30">Se</th>

            <th width="109">Carrera</th>

          

        </tr>

        <?php

        	

			

		$als=mysql_query($alumnos,$conexion);

		$x=0;

		while($a=mysql_fetch_object($als))
		{

			$x++;

			echo"

			<tr>

				<td>$x</td>";

			

				

				echo"<td><a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom' target='_blank'>$a->matricula</a></td>

				<td> $a->app $a->apm $a->nom</td>

				<td align='center'>$a->sexo</td>

				<td align='center'>$a->fecnac</td>";

				$fechanacimiento=$a->fecnac;

				list($ano,$mes,$dia) = explode("-",$fechanacimiento);

				$edad= date("Y") - $ano;

				

				echo"

				<td align='center'>$edad</td>

				<td align='center'>$a->status</td>

				

				<td>$a->idcar</td>
				

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