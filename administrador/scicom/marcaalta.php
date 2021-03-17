<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE ::: SCICOM:: MARCA ALTA</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<meta charset="UTF-8">
<script language="JavaScript" type="text/javascript">
	function validar()
	{
	var  idmarca=document.altamarca.idmarca.value;
	var  marca=document.altamarca.marca.value;	
if (idmarca!="" &&  marca!="") 
	{
 document.altamarca.alta.disabled="";
	}
else
   {
document.altamarca.alta.disabled="disabled";

   }

}
	</script>
<script language="JavaScript" type="text/javascript">
function confirmacion () 
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altamarca.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='marca.php'; */  /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='marcaalta.php';
}

	
}
</script>	

</head>
<body>
	<div id="cuerpo">
		<header>
 <?php 
    include "../../usuarios.php";
	
 ?>	
		
		</header>
		<section id="seccion">
			<header id="header">
			<div class="subtitulo">Agregar Marca</div>
			</header>
			<article id="form">
			<div align="center">
			<form  id="altamarca" name="altamarca" method="post" action="marcaalta2.php">
<table width="314" border="1" align="center">
  <tr>
    <td colspan="2"></td>
    </tr>
	<tr>
    <td width="98">MARCA:</td>
    <td width="200"><label>
      <input name="idmarca" type="text" id="idmarca" onKeyUp="validar()" size="15">
    </label></td>
  </tr>
  <tr>
  <tr>
    <td width="98">DESCRIPCION:</td>
    <td width="200"><label>
      <input name="marca" type="text" id="marca" onKeyUp="validar()" size="30">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="button" id="alta"name="alta" value="ACEPTAR" disabled="disabled" onClick="confirmacion()">
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
		<?php  include "../../pie.php";?>
		</footer>
	</div>


</body>
</html>