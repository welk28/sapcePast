<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: AGREGAR EXISTENCIA</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.agregarexist.cantidad.value!=="")&&(document.agregarexist.precio.value!==""))
{
 document.agregarexist.agregar.disabled="";
}		
else
{
   document.agregarexist.agregar.disabled="disabled";
}
}
</script>

<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.agregarexist.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='accesorio.php';
}


}
</script>	
</head>
<body>
	<div id="cuerpo">
<header>
<?php include "../../usuarios.php";
 $idacce= strtoupper($_GET[idacce]);
 $precio= strtoupper($_GET[precio]);
  
?>
</header>
<section id="seccion">
	<header id="header">
	<div class="subtitulo">Agregar Existencia:</div>
	</header>
	<article id="form">
		<div align="center">
		<form name="agregarexist" id="agregarexist" method="POST" action="existencia2.php" >
	<table width="481" border="1">
  <tr>
    <td colspan="2"></td>
    </tr>
  <tr>
    <td width="154">IDACCESORIO </td>
    <td width="145"><label>
      <input name="idaccex" type="text" id="idaccex" size="15" value="<?php echo"$idacce";?>" disabled="disabled">
	  <input name="idacce" type="hidden" id="idacce" size="15" value="<?php echo"$idacce";?>">
	  
    </label></td>
  </tr>
  <tr>
    <td>¿CUANTAS PIEZAS DESEA AGREGAR?</td>
    <td><label>
      <input name="cantidad" type="int" id="cantidad" onKeyUp="habilitar()" onKeyPress="javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}" size="5" >
    </label></td>
  </tr>
  <tr>
    <td>¿DESEA ACTUALIZAR PRECIO?</td>
    <td><label>
      <input name="precio" type="text" id="precio"  value="<?php echo"$precio";?>"onKeyPress="javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}" onKeyUp="habilitar()" size="5" >
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input name="agregar" type="button" id="agregar" value="AGREGAR"  onClick="confirmacion()" disabled="disabled">
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
<?php include "../../pie.php";?>
</footer>
	</div>
</body>
</html>