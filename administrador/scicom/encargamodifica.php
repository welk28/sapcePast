<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM::MODIFICA DOCENTE POR DEPARTAMENTO</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function validar()
{
if(document.encargamodifica.fecha.value!=="")
{
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.encargamodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='encarga.php';
}

}
else{
alert("ALGUNOS  CAMPOS NO PUEDEN QUEDAR  VACIOS ");
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
		$iddepto=$_GET[iddepto];
		$consulta="select * from encarga where iddepto='$iddepto' and idoc='$idoc' and fecha='$fecha';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		
		$subconsulta="select * from docente where idoc='$idoc';";
		$sub=mysql_query($subconsulta,$conexion);
		$s=mysql_fetch_object($sub);
		
		$oficina="select * from depto where iddepto='$iddepto';";
		$of=mysql_query($oficina,$conexion);
		$o=mysql_fetch_object($of);
		
		
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica Datos de Asignacion de Departamento:</div>
			</header>
			<article id="form">
				<div align="center">
				<form  name="encargamodifica" id="encargamodifica"action="encargamodifica2.php" method="get">
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
    <td>DEPARTAMENTO</td>
    <td> 
	<input name="nombre" id="nombre" type="text" value="<?php echo"$o->nombre"; ?>" disabled="disabled" size="50">
	<input name="iddepto" id="iddepto"  type="hidden" value="<?php echo"$iddepto";?>">
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