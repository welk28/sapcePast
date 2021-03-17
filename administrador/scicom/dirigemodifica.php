<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM::MODIFICA DOCENTE POR OFICINA</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function validar()
{
if(document.dirigemodifica.fecha.value!=="")
{
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.dirigemodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='dirige.php';
}

}
else{
alert(" ALGUNOS  CAMPOS NO PUEDEN QUEDAR  VACIOS");
}

}

</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";
		$fecha=$_GET[fecha];
		$idoc=$_GET[idoc];
		$idoficina=$_GET[idoficina];
		$consulta="select * from dirige where idoficina='$idoficina' and idoc='$idoc' and fecha='$fecha';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		
		$subconsulta="select * from docente where idoc='$idoc';";
		$sub=mysql_query($subconsulta,$conexion);
		$s=mysql_fetch_object($sub);
		
		$oficina="select * from oficina where idoficina='$idoficina';";
		$of=mysql_query($oficina,$conexion);
		$o=mysql_fetch_object($of);
		
		
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica Datos de Asignacion de Oficina:</div>
			</header>
			<article id="form">
				<div align="center">
				<form  name="dirigemodifica" id="dirigemodifica"action="dirigemodifica2.php" method="get">
				<table width="345" border="1" align="center">
  <tr>
    <td width="73">*FECHA</td>
    <td width="224"><label>
	<input type="hidden" name="fechax" id="fechax" value="<?php echo"$fecha"; ?>">
      <input type="date" name="fecha" id="fecha" value="<?php echo"$fecha"; ?>">
    </label></td>
  </tr>
  <tr>
    <td>DOCENTE</td>
    <td>
	<input name="nomdoc" id="nomdoc" type="text" value="<?php echo"$s->nomdoc"; ?>" disabled="disabled" size="50">
	<input name="idoc" id="idoc"  type="hidden" value="<?php echo"$idoc";?>">
	</td>
  </tr>
  <tr>
    <td>OFICINA</td>
    <td> 
	<input name="nombre" id="nombre" type="text" value="<?php echo"$o->nombre"; ?>" disabled="disabled" size="50">
	<input name="idoficina" id="idoficina"  type="hidden" value="<?php echo"$idoficina";?>">
	</td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><label>
      <select name="status" id="status">
	  <option value="<?php echo"$c->status"; ?>"> 
	  <?php 
	  $status=$c->status;
	 if($status==0)
	 {
	 echo"STATUS ACTUAL: HABILITADO
	 ";
	 }else{
	 
	 echo"STATUS ACTUAL: DESABILITADO";
	 }?>
	 </option>
        <option value="0">Habilitado</option>
		 <option value="1">Desabilitado</option>
      </select>
    </label></td>
  </tr>
   <tr>
    <td>FECHA FIN </td>
    <td><label>
      <input type="date" name="fechafin" id="fechafin" value="<?php echo"$c->fechafin";?>">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="button" name="aceptar" value="ACEPTAR" onClick="validar()">
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