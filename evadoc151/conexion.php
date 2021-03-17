<!DOCTYPE>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta charset="UTF-8">

</head>

<body>
<?php 
function conectar()
{
	$servidor="localhost";
	$usuario="itiztapa_eva171";
	$contasena="123evadoc171";
	
	$conexion = mysql_connect($servidor, $usuario, $contasena);
 
	//en caso de no recibir la conexion mostrar un mensaje de error
	if (!$conexion)
	{
		echo "ERROR DE CONEXION CON EL SERVIDOR MYSQL";
		exit();
	}
	// CONEXION CON LA BASE DE DATOS
	$cbd=mysql_select_db("itiztapa_evadoc181", $conexion);
	if (!$cbd)
	{
		echo "ERROR DE CONEXION CON LA BASE DE DATOS";
		exit();
	}
	return($conexion);
}
?>
</body>
</html>
