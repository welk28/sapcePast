<!DOCTYPE>
<html>
<head>
<title>CAMPUS IZTAPALAPA II</title>
<meta charset="UTF-8">

</head>

<body>
<?php 
function conectar()
{
	$servidor="162.241.45.231";
	$usuario="wwwiztap_sapce";
	$contasena="Ha0,HlBqN{]o";
	
	$conexion = mysql_connect($servidor, $usuario, $contasena);
 
	//en caso de no recibir la conexion mostrar un mensaje de error
	if (!$conexion)
	{
		echo "SISTEMA DESACTIVADO CAMPUS IZTAPALAPA II";
		exit();
	}
	
	// CONEXION CON LA BASE DE DATOS
	$cbd=mysql_select_db("auditoria202", $conexion);
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
