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
	$usuario="itiztapa_evadoc";
	$contasena="123evadoc14";
	
	$conexion = mysql_connect($servidor, $usuario, $contasena);
 
	//en caso de no recibir la conexion mostrar un mensaje de error
	if (!$conexion)
	{
		echo "ERROR DE CONEXION CON EL SERVIDOR MYSQL";
		exit();
	}
	// CONEXION CON LA BASE DE DATOS
	$cbd=mysql_select_db("itiztapa_sapce", $conexion);
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
