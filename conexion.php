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
	$usuario="tecnologico";
	$contasena="PASSTEC";
	
	$conexion = mysql_connect($servidor, $usuario, $contasena);
 
	//en caso de no recibir la conexion mostrar un mensaje de error
	if (!$conexion)
	{
		echo "ERROR DE CONEXION CON EL SERVIDOR MYSQL generado";
		exit();
	}
	
	// CONEXION CON LA BASE DE DATOS
	$cbd=mysql_select_db("sapce", $conexion);
	if (!$cbd)
	{
		echo "ERROR DE CONEXION CON LA BASE DE DATOS generado";
		exit();
	}
	
	return($conexion);
}

?>
</body>
</html>