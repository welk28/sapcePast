<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="ip/images/tecstyle.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
function regresar()
{
	document.location.href='calificar2.php';
}
</script>
</head>

<body>
<?php

  $idmat=$_GET[idmat];
  $idh=$_GET[idh];
  $cred=$_GET[cred];
  $unid=$_GET[unid];
  $area=$_GET[area];
  $idoc=$_GET[idoc];
  include "../conexion.php";
  $conexion=conectar();

$pagina='unidad'.$unid.'.php';
$guarda="update materias set depto='$area', unid='$unid', cred='$cred' where idmat='$idmat'";
$g=mysql_query($guarda,$conexion);
if(!$g)
{
	echo"error al actualizar, notifique al administrador";
	exit();
}
else
{
	print"
		<script languaje='JavaScript'>
		alert('¡¡DATOS MODIFICADOS EXITOSAMENTE!!');
		window.location.href='$pagina?idoc=$idoc&idh=$idh';
		</script>";
}
?>

</html>
