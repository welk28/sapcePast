<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: AGREGAR  DEPARTAMENTO</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
	<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.altadepto.iddepto.value!=="")&& (document.altadepto.nombre.value!==""))
{
 document.altadepto.alta.disabled="";

}
else {
 document.altadepto.alta.disabled="disabled";
}
}
</script>
<script language="JavaScript" type="text/javascript">
function confirmacion () 
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altadepto.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='oficina.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='altadepto.php';
}

	
}

</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include"../../usuarios.php";?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Agregar Departamento:</div>
			</header>
			<article id="form">
				<div align="center">
				<form name="altadepto"  id="altadepto" action="altadepto2.php" method="post">
				<table width="255" border="1">
  <tr>
    <td width="67">IDDEPTO</td>
    <td width="172"><label>
      <input type="text" name="iddepto" id="iddepto" size="15" onKeyUp="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td>NOMBRE</td>
    <td><label>
      <input type="text" name="nombre" id="nombre" size="50" onKeyUp="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="button" name="alta" id="alta" value="ACEPTAR" disabled="disabled" onClick="confirmacion()">
        </div>
    </label></td>
    </tr>
</table>
				</form>
				</div>
			</article>
		</section>
		<div style="clear: both; width: 100%;"></div>
		<footer>
		<?php include"../../pie.php";?>
		</footer>
	</div>
</body>
</html>