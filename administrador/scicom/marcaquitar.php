<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: QUITAR COMPONENTE</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<script language="JavaScript" type="text/javascript">
function validar()
{
	var confirma=confirm("¿ESTA SEGURO DE ELIMINAR EL REGISTRO?");
	if(confirma==true)
	{
		document.marcaquitar.submit();
	}
	else
	{
		document.location.href='marca.php';
	}
}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php"; 
		$idmarca=strtoupper($_GET[idmarca]);
		$consulta="select * from marca where idmarca='$idmarca';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Eliminar  Proveedor:</div>
			</header>
			<article id="form"> 
				<div align="center">
			<form  id="marcaquitar" name="marcaquitar"action="marcaquitar2.php" method="post">
			<table width="286" border="1">
  <tr>
    <td width="73">IDMARCA</td>
    <td width="197"><label>
      <input type="text" name="idmarcax" id="idmarcax" value="<?php echo"$idmarca";?>"  disabled="disabled">
	   <input type="hidden" name="idmarca" id="idmarca" value="<?php echo"$idmarca";?>" >
    </label></td>
  </tr>
  <tr>
    <td>NOMBRE</td>
    <td><label>
      <input type="text" name="nombrex" id="nombrex" value="<?php echo"$c->nombre";?>" disabled="disabled" size="40">
	    <input type="hidden" name="nombre" id="nombre" value="<?php echo"$c->nombre";?>">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><label>
    <div align="center">
      <input type="button" name="quitar" value="QUITAR" onClick="validar()">
    </div>
    </label></td>
    </tr>
</table>

			</form>
				</div>
			</article>
		</section>
		<footer>
		<?php  include "../../pie.php";?>
		</footer>
	</div>

</body>
</html>