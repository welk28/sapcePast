<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: MODIFICA OFICINA</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
	function confirmacion(){
if(document.marcamodifica.nombre.value!=="")
{	
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.marcamodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='marca.php';
}
}
else{
alert("ALGUNOS  CAMPOS NO PUEDEN QUEDAR  VACIOS");
}
}

</script>

</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php";
		$idmarca=strtoupper($_GET[idmarca]);
		$consulta="select * from marca where idmarca='$idmarca'; ";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica nombre de la marca:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="marcamodifica" id="marcamodifica" action="marcamodifica2.php" method="get">
			<table width="272" border="1">
  <tr>
    <td width="73">IDMARCA</td>
    <td width="183"><label>
      <input type="text" name="idmarcax" id="idmarcax" value="<?php echo"$idmarca"; ?>" disabled="disabled" size="20">
	   <input type="hidden" name="idmarca" id="idmarca" value="<?php echo"$idmarca"; ?>">
    </label></td>
  </tr>
  <tr>
    <td>*NOMBRE</td>
    <td><label>
      <input type="text" name="nombre" id="nombre" value="<?php echo"$c->nombre";?>" size="40">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="button" name="aceptar" value="ACEPTAR" onClick="confirmacion()">
        </div>
    </label></td>
    </tr>
</table>

			</form>
			</div>
			</article>
		</section>
		<footer>
		<?php include"../../pie.php";?>
		</footer>
	</div>
</body>
</html>