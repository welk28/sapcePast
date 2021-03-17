<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: MODIFICA OFICINA</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function confirmacion(){
if(document.oficinamodifica.nombre.value!=="")
{	
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.oficinamodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='oficina.php';
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
		$idoficina=$_GET[idoficina];
		$consulta="select * from oficina where idoficina='$idoficina';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		
		$subconsulta="select * from depto where iddepto='$c->iddepto';";
		$sub=mysql_query($subconsulta,$conexion);
		$s=mysql_fetch_object($sub);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica Oficina:</div>
			</header>
			<article id="form">
				<div align="center">
				<form name="oficinamodifica"  id="oficinamodifica"action="oficinamodifica2.php" method="get">
				<table width="323" border="1">
  <tr>
    <td width="126">IDOFICINA</td>
    <td width="181"><label>
      <input type="text" name="idoficinax" id="idoficinax" value="<?php echo"$idoficina";?>" size="20" disabled="disabled">
	  <input type="hidden" name="idoficina" id="idoficina" value="<?php echo"$idoficina";?>">
    </label></td>
  </tr>
  <tr>
    <td>*NOMBRE</td>
    <td><label>
      <input type="text" name="nombre" id="nombre" value="<?php echo"$c->nombre";?>" size="50">
    </label></td>
  </tr>
  <tr>
    <td>DEPARTAMENTO</td>
    <td>
	<?php
                          echo"<select name='iddepto'  id='iddepto' onchange='habilitar()'>";
                          $combo=" select * from depto where iddepto='$iddepto'";
                          $comb=mysql_query($combo,$conexion);
                          $com=mysql_fetch_object($comb);
	                      echo"<option value='$c->iddepto' selected>Derpartamento actual: $s->nombre </option>";
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
      <input type="button" name="Submit" value="Enviar" onClick="confirmacion()">
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