<?php
session_start();
?>
<!DOCTYPE html >
<html >
<head>
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
include "../conexion.php";
$conexion=conectar();
$prom=$_GET[prom];
$pso=$_GET[pso];
$deser=$_GET[deser];

$idmat=$_GET[idmat];
$idh=$_GET[idh];
$matricula=$_GET[matricula];
//echo"$idmat";
if($deser!=NULL)
{
	$deser=1;
}
  /*
echo"
prom: $prom <br> 
PSO: $pso <br> 
deser: $deser <br>
idh=$idh <br>
matricula: $matricula <br>";*/

echo"...Guardando, espere.";
if ($prom <0 || $prom>100)
{
		print"
		<script languaje='JavaScript'>
		alert('LA CALIFICACION NO ESTA EN EL RANGO DE 0 A 100, ¡¡VERIFIQUE!!');
		window.location.href='$acta?idh=$idh';
		</script>";
		exit();

}
else
{
	
		if($prom<70)
			$prom=0;

		$mod="update cursa set  pso='$pso', deser='$deser', prom='$prom' where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);
		if(!$mo){echo"error"; exit();}
		print"
		<script languaje='JavaScript'>
		window.location.href='acta.php?idh=$idh';
		</script>";

}
?>
</body>
</html>