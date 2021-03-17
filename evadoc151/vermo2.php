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
		<?php 	include "usuarios.php";	
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	
	$matricula=$_POST[matricula];

	$app=strtoupper($_POST[app]);
	$apm=strtoupper($_POST[apm]);
	$nom=strtoupper($_POST[nomal]);
	$sexo=$_POST[sexo];
	$fecnac=$_POST[fecnac];
	$edociv=strtoupper($_POST[edociv]);
	$email=strtoupper($_POST[email]);
	$otro=strtoupper($_POST[otro]);
	$telal=$_POST[tel];
	$curp=strtoupper($_POST[curp]);
	$discap=$_POST[discap];
	$dialecto=$_POST[dialecto];
	$calle=strtoupper($_POST[calle]);
	$colonia=strtoupper($_POST[colonia]);
	$idedo=$_POST[edo];
	$ciudad=strtoupper($_POST[ciudad]);
	$cp=$_POST[cp];
	$idesc=$_POST[idesc];
	$otesc=strtoupper($_POST[otesc]);
	$prepa=strtoupper($_POST[prepa]);
	$propre=$_POST[propre];
	$secu=strtoupper($_POST[secu]);
	$prose=$_POST[prose];
	$idcar=$_POST[idcar];
	$passal=$matricula;
	$status=$_POST[status];
	$nomtut=strtoupper($_POST[nomtut]);
	$dirtut=strtoupper($_POST[dirtut]);
	$teltut=$_POST[teltut];
	$insc=0;
	$bandera=0;
	$proc=$_POST[proc];
	$actualiza="update alumnos set nom='$nom', app='$app', apm='$apm', sexo='$sexo', curp='$curp', dialecto='$dialecto', fecnac= '$fecnac', edociv='$edociv', otro='$otro', calle='$calle', colonia='$colonia', idedo='$idedo', ciudad='$ciudad', cp= '$cp', telal='$telal', email='$email', idesc='$idesc', otesc='$otesc', prepa='$prepa', propre='$propre', secu='$secu', prose='$prose', idcar='$idcar', passal=sha1('tec'), status='$status', nomtut='$nomtut', dirtut='$dirtut', teltut='$teltut', discap='$discap', proc='$proc' where matricula='$matricula';";
	$ag=mysql_query($actualiza,$conexion);
	if(!$ag)
	{
		echo"<div class='avisono'>no se guardaron los registros, contacte al programador</div>";
	}
	else
	{
		print"
				<script languaje='JavaScript'>
				alert('¡Actualización exitosa!');
				window.location.href='vermo.php?matricula=$matricula';
				</script>
				";
	}
	echo" <br>
	matricula=$matricula<br>
	01 nomal: $nom<br>
	02 app: $app <br>
	03 apm: $apm <br>
	04 sexo: $sexo <br>
	05 curp: $curp <br>
	06 dialecto: $dialecto <br>
	07 fecnac: $fecnac <br>
	08 edociv: $edociv <br>
	09 otro: $otro <br>
	10 calle: $calle <br>
	11 colonia: $colonia <br>
	12 idedo: $idedo <br>
	13 ciudad: $ciudad <br>
	14 cp: $cp <br>
	15 telal: $telal <br>
	16 email: $email <br>
	17 idesc: $idesc <br>
	18 otesc: $otesc <br>
	19 prepa: $prepa <br>
	20 propre: $propre <br>
	21 secu: $secu <br>
	22 prose: $prose <br>
	23 idcar: $idcar <br>
	24 passal: $passal <br>
	25 status: $status <br>
	26 nomtut: $nomtut <br>
	27 dirtut: $dirtut <br>
	28 teltut: $teltut <br>
	29 insc: $insc <br>
	30 bandera: $bandera <br>
	31 fecalta: $fecalta <br>
	32 discap: $discap <br>
	33 proc: $proc <br>
	
	";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Alta de aspirante</div>
        <br>
    </header>

<div id="registros" ></div>
    </section>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
