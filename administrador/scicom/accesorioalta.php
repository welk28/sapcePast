<?php  session_start();  ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>SAPCE:: SCICOM:: ACCESORIO ALTA</title>
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.altaaccesorio.idmarca.value!==0)&&(document.altaaccesorio.idacce.value!=="")&&(document.altaaccesorio.descrip.value!=="")&&(document.altaaccesorio.modelo.value!=="")&&(document.altaaccesorio.exist.value!=="")&&(document.altaaccesorio.precio.value!==""))
{
 document.altaaccesorio.alta.disabled="";

}
else {
 document.altaaccesorio.alta.disabled="disabled";
}
}
</script>
<script language="JavaScript" type="text/javascript">
function confirmacion()
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altaaccesorio.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='accesorioalta.php';
}


}
</script>
</head>
<body>
	<div id="cuerpo">
<header>

<?php  include "../../usuarios.php"; ?>

</header>
<section id="seccion">
	<header  id="header">
<div class="subtitulo">	Alta de Accesorios: </div>
	</header>
<article id="form">
<div align="center">
<form name="altaaccesorio" id="altaaccesorio" method="POST" action="accesorioalta2.php"> 
<table  border="0" align="center">
    <tr> 
	<td><label>ID ACCESORIO</label></td>
     <td><input name="idacce" type="text" id="idacce" onKeyUp="habilitar()" size="15"></td>
    </tr>
    <tr> 
	<td><label>DESCRIPCION</label></td>
     <td><textarea name="descrip" rows="6" id="descrip" onKeyUp="habilitar()"></textarea></td>
    </tr>
     <tr>
	 <td><label>MODELO</label></td>
     <td><input type=" text" id="modelo" name="modelo" onKeyUp="habilitar()" ></td>
	 </tr>
	 <tr>
     <td><label>EXISTENCIA</label></td>
     <td><input type="int" id="exist" name="exist" onKeyUp="habilitar()"  size="11"onKeyPress="javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}" > </td>
   </tr>  
   <tr>
     <td><label>PRECIO</label></td>
     <td><input type="float" id="precio" name="precio"   onKeyUp="habilitar()"onKeyPress="javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}" > </td>
   </tr>  
<tr>
	<td> <label>IDMARCA</label></td>
    <td>
	<?php
     echo"<select name='idmarca'  id='idmarca' onchange='habilitar()'>";
     $combo=" select * from marca where idmarca='$idmarca'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='0' selected>seleccione </option>";
     $combo1="select * from marca";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->idmarca'> $com1->nombre </option>";

      } 
    
     echo "</select>";
    ?>
</td>
</tr>
<tr>
    <td colspan="2"> <div align="center">
      <input type="button" name="alta" id="alta"value="ACEPTAR" disabled="disabled" onClick="confirmacion()">
    </div></td>
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