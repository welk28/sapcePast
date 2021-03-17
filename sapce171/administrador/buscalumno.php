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

    				<form action="buscalumno.php" method="get">

    				<input type="text" name="matricula" placeholder="matricula"> <input type="submit" value="Buscar">

    				</form>

    			</td>

    			<td></td>

    			<td></td>

    			<td>

    				<form action="buscalumno.php" method="get">

				    	<input type="text" name="nombre" placeholder="nombre o apellido"> <input type="submit" value="Buscar">

				    </form>



    			</td>

    		</tr>

    	</table>

   	 

    

   		<?php 
   		if($ses==4)
   		{
   			if(!empty($matricula))
			{
				$alumnos="select * from alumnos where matricula like '%$matricula%' and idcar='$cc->idcar';";
			}
			else
			{
				if(!empty($nombre))
				{
					$alumnos="select * from alumnos where (app like '%$nombre%') or (apm like '%$nombre%') or (nom like '%$nombre%') and idcar='$cc->idcar';";
				}
				else
				{
					echo"<div class='subtitulo'>DEBE INGRESAR DATOS </div>";
				}
			}
   		}
   		else
   		{
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
   		}
   			

   		?>

			<div class="subtitulo">Coincidencias encontradas <?php echo"$periodo: $p->descper: $matricula";
		if($ses==4)
   		{
   			 echo"<br> PARA LA CARRERA:  $cc->idcar";
   		}
			?> </div>

        <br>

    </header>



    <div id="registros" >

    <table>

    	<tr>

        	<th width="21">No</th>

            <?php 

			if($ses==2)echo"<th width='43'>Avance</th>"; ?>

            <th width="90">Control</th>
            <th width="300">Nombre</th>
            <th width="10">S</th>
            <th width="100">Fecnac</th>
            <th width="10">Ed</th>
            <th width="30">Se</th>
            <th width="109">Carrera</th>
           	<th width='39'>Datos</th>
            <th width='58'>Boleta</th>
            <th width='42'>Histo</th>
            <th width='42'>Kardex</th>

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

				if($ses==2)
				{echo"<td><a href='../reporte/avance.php?matricula=$a->matricula' target='_blank' title='BOLETA de $a->nom'>Hacer</a></td>";}
				
				echo"<td><a href='horalumno.php?matricula=$a->matricula' title='HORARIO de $a->nom' target='_blank'>$a->matricula</a></td>";

				if(($ses==2)||($ses==5))
				{
					echo"<td> <a href='../reporte/kardex.php?matricula=$a->matricula' target='_blank' title='KARDEX de $a->nom'>$a->app $a->apm $a->nom</a>";
				}
				else
				{
					echo"<td> <a href='#' target='_self' title='Solicite a Servicios Escolares'>$a->app $a->apm $a->nom</a>";
				}
				
				echo"  </td><td align='center'><a href='../reporte/credealumno1.php?matricula=$a->matricula' target='_self'>$a->sexo</a></td>

				<td align='center'>$a->fecnac</td>";

				$fechanacimiento=$a->fecnac;

				list($ano,$mes,$dia) = explode("-",$fechanacimiento);

				$edad= date("Y") - $ano;

				

				echo"

				<td align='center'>$edad</td>

				<td align='center'>$a->status</td>

				

				<td>$a->idcar</td>";

				if(($ses==2)||($ses==5))

				{
					echo"<td align='center'><a href='vermo.php?matricula=$a->matricula' title='DATOS de $a->nom'>V/M</a></td>
					<td align='center'><a href='boleta.php?matricula=$a->matricula' target='_blank' title='BOLETA de $a->nom'>Bol</a></td>

					<td align='center'><a href='historial.php?matricula=$a->matricula' target='_blank' title='HISTORIAL de $a->nom'>Ver</a></td>

					<td align='center'><a href='../reporte/kardex.php?matricula=$a->matricula' target='_blank' title='KARDEX de $a->nom'>Ver</a></td>";
				}
				else
				{
					echo"
					<td align='center'><a href='#' title='Solicite a Servicios Escolares'>V/M</a></td>
					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Bol</a></td>

					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Ver</a></td>

					<td align='center'><a href='#' target='_self' title='Solicite a Servicios Escolares'>Ver</a></td>";
				}
			echo"
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