<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: MODIFICA ASIGNACION DE  EQUIPO</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<script language="JavaScript" type="text/javascript">
function validar()
{
if((document.asignamodifica.fecha.value!=="")||(document.asignamodifica.fechafin.value!=="")||(document.asignamodifica.observacion.value!==""))
{
var pregunta= confirm("ESTA SEGURO DE LA MODIFICACION ")

if (pregunta==true)
{
document.asignamodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='asigna.php';
}

}
else{
alert(" LOS CAMPOS NO PUEDEN QUEDAR  VACIOS");
}

}

</script>

</head>
<body>
	<div id="cuerpo">
		<header>
		<?php include"../../usuarios.php"; 
		$clave=$_GET[clave];
		$idequipo=$_GET[idequipo];
		$fecha=$_GET[fecha];
		
		$nueva="select * from asigna where clave='$clave' and idequipo='$idequipo' and fecha='$fecha';";
		$nu=mysql_query($nueva,$conexion);
		$n=mysql_fetch_object($nu);
		
		
		$consulta="select * from docente where idoc='$clave';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		
		
		$subconsulta="select * from equipo where idequipo='$idequipo';";
		$sub=mysql_query($subconsulta,$conexion);
		$s=mysql_fetch_object($sub);
			
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica Asignacion  Equipo  a Docente:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="asignamodifica" id="asignamodifica"action="asignamodifica2.php" method="get">
			<table width="424" border="1" align="center">
  <tr>
    <td width="74">FECHA</td>
    <td width="334"><label>
	 <input name="fechax" type="hidden" id="fechax" value="<?php echo"$fecha";?>"/>
     <input name="fecha" type="date" id="fecha" value="<?php echo"$fecha";?>"/>
    </label></td>
  </tr>
  <tr>
    <td>DOCENTE</td>
    <td><label>
      <input name="nomdoc" type="text"  disabled="disabled" id="nomdoc" value="<?php echo"$c->nomdoc";?>" size="40">
	  <input type="hidden" name="clave" id="clave" value="<?php echo"$clave";?>">
    </label></td>
  </tr>
  <tr>
    <td>EQUIPO</td>
    <td><label>
      <input name="idequipox" type="text"  disabled="disabled" id="idequipox" value="<?php echo"$idequipo";?>" size="40">
	  <input type="hidden" name="idequipo" id="idequipo" value="<?php echo"$idequipo";?>">
	  
    </label></td>
  </tr>
  <tr>
  <tr>
    <td>STATUS</td>
    <td><label>
       <select name="status" id="status">
	  <option value="<?php echo"$n->status"; ?>"> 
	  <?php 
	  $status=$n->status;
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
    <td>OBSERVACION</td>
    <td><label>
	<input name="observacion" id="observacion" type="text" value="<?php echo"$n->observacion";?>">
      
    </label></td>
  </tr>
  <tr>
    <td>FECHA FIN</td>
    <td><label>
	<input name="fechafin" id="fechafin" type="date" value="<?php echo"$n->fechafin";?>">
      
    </label></td>
  </tr>
    <td colspan="2"><div align="center">
      <input type="button" name="alta" value="ACEPTAR" id="alta"  onClick="validar()">
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