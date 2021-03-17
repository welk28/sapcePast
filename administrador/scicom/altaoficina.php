<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: AGREGAR  OFICINA</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<meta charset="UTF-8">
	<script language="JavaScript" type="text/javascript">
function habilitar()
{
if((document.altaoficina.iddepto.value!==0)&&(document.altaoficina.idoficina.value!=="")&& (document.altaoficina.nombre.value!==""))
{
 document.altaoficina.alta.disabled="";

}
else {
 document.altaoficina.alta.disabled="disabled";
}
}
</script>
<script language="JavaScript" type="text/javascript">
function confirmacion () 
{
var pregunta= confirm("ESTA SEGURO QUE DESEA DAR DE ALTA")

if (pregunta==true)
{
document.altaoficina.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='oficina.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{

		document.location.href='altaoficina.php';
}

	
}

</script>

</head>
<body>
	<div id="cuerpo">
		<header>
			<?php include"../../usuarios.php"; ?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Agregar Oficina:</div>
			</header>
			<article id="form">
				<div align="center">
				<form name="altaoficina" id="altaoficina" action="altaoficina2.php" method="post">
				<table width="513" border="1">
  <tr>
    <td width="130">IDOFICINA:</td>
    <td width="288"><label>
      <input type="text" name="idoficina" id="idoficina" size="15" onKeyUp="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td>NOMBRE DE OFICINA:</td>
    <td><label>
      <input type="text" name="nombre" id="nombre" size="50" onKeyUp="habilitar()">
    </label></td>
  </tr>
  <tr>
    <td>DEPARTAMENTO : </td>
    <td>
	<?php
                          echo"<select name='iddepto'  id='iddepto' onchange='habilitar()'>";
                          $combo=" select * from depto where iddepto='$iddepto'";
                          $comb=mysql_query($combo,$conexion);
                          $com=mysql_fetch_object($comb);
	                      echo"<option value='0' selected>seleccione </option>";
                          $combo1="select * from depto";
                          $comb1=mysql_query($combo1,$conexion);
                          while ($com1=mysql_fetch_object($comb1)) {
                          echo "<option value='$com1->iddepto'> $com1->nombre </option>";

                          } 
    
                          echo "</select>";
                       ?>									
	</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="alta"  id="alta" value="ACEPTAR" onClick="confirmacion()" disabled="disabled">
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