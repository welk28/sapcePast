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
	$idmat=$_GET[idmat];
	$habil=$_GET[habil];

		?>

	</header>

	

	

	<section id="seccion">

    

        <header id="header">

                <div class="subtitulo">Lista de Materias Asignadas a Carreras </div>

            <br>

        </header>



    <div id="registros" >
<?php 
if(empty($idmat))
{
?>
    <table>
		
    	<tr>

        	<th align="center" width="">No</th>
            <th align="center" width="">Clave</th>
            <th align="center" width="">Descripción</th>
            <th align="center" width="" title="Créditos teórico-práctico">Créd</th>
            <th align="center" width="30" title="Unidades con que cuenta">Uni</th>
            <th align="center" width="30" title="Semestre en que se cursa">Sem</th>
            <th align="center" width="100">Carrera</th>
            <th align="center" width="250">Departamento Acad</th>
            <th align="center" width="40">Modif</th>
            <th align="center" width="50">Hab</th>
        </tr>
        <?php

		$materias="select distinct m.idmat, m.nommat, m.habil, m.cred, m.depto, m.unid, p.sem, p.idcar from materias as m, posee as p where m.idmat=p.idmat order by p.idcar, p.sem, m.habil;";

		$mats=mysql_query($materias,$conexion);

		$x=0;

		while($m=mysql_fetch_object($mats))

		{

			$x++;
			echo"
			<form action='matasigna.php' method='get'>
			<tr>
				<td>$x</td>
				<td align='right'><input type='hidden' name='idmat' value='$m->idmat'>$m->idmat</td>
				<td>$m->nommat</td>			
				<td align='center'>$m->cred</td>
				<td align='center'>$m->unid</td>
				<td align='center'>$m->sem</td>
				<td>$m->idcar</td>
				<td>$m->depto</td>
				
				<td align='center'>";
				if($m->habil==1)
				{
					echo"<input name='habil' type='checkbox' checked value='0'>";
				}
				else
				{
					echo"<input name='habil' type='checkbox' unchecked value='1'>";
				}
				echo"</td>
				<td><input type='submit' name='boton' id='boton' value='Guardar' ></td>
			</tr>
			</form>
			"; 
    	}
    		?>

    </table>

	</div>

        <?php 
    }
    else
    	{
    		$materias="select * from materias where idmat='$idmat';";
    		$mat=mysql_query($materias,$conexion);
    		$m=mysql_fetch_object($mat);

			if($m->habil==1)
    		{ 
    			$actualizar="update materias set habil='0' where idmat='$idmat';";
    		}
    		else
    		{
    			$actualizar="update materias set habil='1' where idmat='$idmat';";
    		}

    		$actu=mysql_query($actualizar,$conexion);
    		if(!$actu)
    		{
    			print"
				<script languaje='JavaScript'>
				alert('¡Error!');
				window.location.href='matasigna.php';
				</script>
				";
				
    		}
    		else
    		{
    			print"
				<script languaje='JavaScript'>
				alert('¡Exito!');
				window.location.href='matasigna.php';
				</script>
				";
				echo"habil: $habil <br> idmat= $idmat";
    		}
    	} ?>

	</section>

	<div style="clear: both; width: 100%;"></div>

	<footer >

		<?php	include "../pie.php";	?>

	</footer>

</div>

</body>

</html>