<?php  session_start();  ?>

<!DOCTYPE html >

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">



<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="cuerpo">

    <header>

		<?php 	include "../usuarios.php";	

		$periodo=$_SESSION['periodo'];

	//echo"sesion: $quien <br>usuario: $usuario";

		$idh=$_GET[idh];

		$idcar=$_GET[idcar];

		$idoc=$_GET[idoc];

		$idg=$_GET[idg];

		$idga=$_GET[idga];

		$idmat=$_GET[idmat];

		$cupo=$_GET[cupo];

		//echo"idh: $idh <br> idcar: $idcar <br> idoc: $idoc <br> idg: $idg <br> idmat: $idmat <br> idga: $idga";

		

		$actuagrupo="update hgrupo set idg='$idg' where idg='$idga' and idh='$idh';";

		$actgru=mysql_query($actuagrupo,$conexion);

	$actualiza="update horario set idoc='$idoc', idmat='$idmat', cupo='$cupo' where idh='$idh';";

	$ag=mysql_query($actualiza,$conexion);

	if(!$ag)

	{

		echo"<div class='avisono'>no se guardaron los registros, contacte al programador</div>";

	}

	else

	{

		print"

		<script languaje='JavaScript'>

			var respuesta=confirm('Modificación exitosa, ¿Desea configurar Hora/Día?');

			if(respuesta==true)

			{

				window.location.href='agregadia.php?&idh=$idh';

			}

			else

			{

				window.location.href='horario.php';

			}

		</script>";

	}

		?>

	</header>

    <section id="seccion">

    

    <header id="header">

			<div class="subtitulo">Modificación de horario</div>

        <br>

    </header>



<div id="registros" ></div>

    </section>

    

    <p>&nbsp;</p>

    <p>&nbsp;</p>

</div>

</body>

</html>

