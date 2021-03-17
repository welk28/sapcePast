<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: DESABILITAR DOCENTE DE  DEPARTAMENTO</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DESABILITAR")

if (pregunta==true)
{
document.encargadesabilita.submit();
		/*alert('DESABILITADO');*/
		/* window.location.href='encargadesabilita.php';*/   
}
else
{

		document.location.href='encarga.php';
}


}
</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
	     $fecha=strtoupper($_GET[fecha]);
	     $idoc=strtoupper($_GET[idoc]);
	     $iddepto=strtoupper($_GET[iddepto]);
		 $fechafin= date("Y-m-d");
		 
		 $consulta="select * from docente where idoc='$idoc';";
		 $con=mysql_query($consulta,$conexion);
		 $c=mysql_fetch_object($con);
		 
		 $subconsulta="select * from depto where iddepto='$iddepto';";
		 $sub=mysql_query($subconsulta,$conexion);
		 $s=mysql_fetch_object($sub);
		 
		 
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Desabilitar al Docente de su Cargo:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="encargadesabilita" id="encargadesabilita" action="encargadesabilita2.php" method="get">
	<table width="376" border="1" align="center">
  <tr>
    <td width="81">FECHA</td>
    <td width="279">
	<input type="hidden" name="fecha" id="fecha" value="<?php  echo "$fecha";?>">
	<input type="text" name="fechax" value="<?php  echo "$fecha";?>" disabled="disabled">	</td>
  </tr>
  <tr>
    <td>DOCENTE</td>
    <td>
	<input type="hidden" name="idoc"  id="idoc" value="<?php  echo"$idoc ";?>">
	<input name="nomdoc" type="text" disabled="disabled" value="<?php  echo"$c->nomdoc ";?>" size="50">	</td>
  </tr>
  <tr>
    <td>DEPARTAMENTO</td>
    <td>
	<input type="hidden" name="idoficina" id="idoficina" value="<?php echo "$iddepto";?>">	
	<input type="text" name="nombre" value="<?php echo "$s->nombre";?>" disabled="disabled" size="50">	</td>
  </tr>
  <tr>
    <td>FECHA FIN </td>
    <td><input type="text" name="fechafinx" value="<?php echo" $fechafin";?>" disabled="disabled">
	<input type="hidden" name="fechafin" id="fechafin" value="<?php echo" $fechafin";?>">
	</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input name="ACEPTAR" type="button" id="ACEPTAR" value="ACEPTAR" onClick="confirmacion()">
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
		<?php include"../../pie.php"; ?>
		</footer>
	</div>

</body>
</html>