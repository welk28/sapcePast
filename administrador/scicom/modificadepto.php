<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: MODIFICA DEPARTAMENTO</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion(){
if(document.modificadepto.nombre.value!=="")
{	
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.modificadepto.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='departamento.php';
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
		$iddepto=strtoupper($_GET[iddepto]);
		$consulta="select * from depto where iddepto='$iddepto';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica departamento:</div>
			</header>
			<article id="form">
				<div align="center">
				<form name="modificadepto" id="modificadepto" action="modificadepto2.php" method="get">
				<table width="355" border="1">
  <tr>
    <td width="111">IDDEPTO</td>
    <td width="228"><label>
      <input type="text" name="iddeptox" id="iddeptox" value="<?php echo"$iddepto";?>" disabled="disabled">
	   <input type="hidden" name="iddepto" id="iddepto" value="<?php echo"$iddepto";?>">
    </label></td>
  </tr>
  <tr>
    <td>*NOMBRE</td>
    <td><label>
      <input type="text" name="nombre" id="nombre" value="<?php echo"$c->nombre";?>" size="50">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="aceptar" id="aceptar" value="ACEPTAR" onClick="confirmacion()">
    </div>
      <label></label></td>
    </tr>
</table>

				</form>
				</div>
			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
		<?php  include"../../pie.php";?>
		</footer>
	</div>

</body>
</html>