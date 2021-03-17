<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: EQUIPO MODIFICA</title>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
<script language="JavaScript" type="text/javascript">
function validar()
{
if((document.equipomodifica.descrip.value!=="")&&(document.equipomodifica.fechalt.value!=="")||(document.equipomodifica.recumat.value!=="")||(document.equipomodifica.fechbaja.value!=="")||(document.equipomodifica.obser.value!==""))
{
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.equipomodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='equipo.php';
}

}
else{
alert(" LOS CAMPOS NO PUEDEN QUEDAR  VACIOS ");
       
}

}
</script>
</head>	
<body>
	<div id="cuerpo">
		<header>
		<?php include "../../usuarios.php";
		$idequipo=$_GET[idequipo];
		$fecha=$_GET[fecha];
		$consulta="select * from equipo where idequipo='$idequipo' and fechalt='$fecha';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica Datos del Equipo:</div>
			</header>
			<article id="form">
			<div align="center">
			<form name="equipomodifica" id="equipomodifica"action="equipomodifica2.php" method="post" enctype="multipart/form-data">
			<table width="480" border="1">
  <tr>
    <td width="130">IDEQUIPO</td>
    <td width="334"><label>
      <input type="text" name="idequipox" id="idequipox" value="<?php echo"$c->idequipo";?>" disabled="disabled">
	    <input type="hidden" name="idequipo" id="idequipo" value="<?php echo"$c->idequipo";?>">
    </label></td>
  </tr>
  <tr>
    <td>RECU.MAT</td>
    <td><label>
      	     <input type="text" name="recumat" id="recumat" value="<?php echo"$c->recumat"; ?>">
    </label></td>
  </tr>
  <tr>
    <td>FECHA ALTA </td>
    <td><label>
	  <input type="date" name="fechalt" id="fechalt" value="<?php echo"$c->fechalt";?>">
    </label></td>
  </tr>
  <tr>
    <td>DESCRIPCION</td>
    <td><label> 
        <textarea name="descrip" id="descrip" cols="40" rows="6" ><?php echo"$c->descrip";?></textarea>
    </label></td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><label>
	<form  method="post"action="equipomodifica.php">
      <select name="status" id="status" >
	   <option value="<?php echo"$c->status";?>"><?php if($c->status==0){
	
	echo "Descripcion Actual:HABILITADO";
	
	}
	else {
	if($c->status==1){
	
	echo"Descripcion Actual:DESABILITADO";
	
	}
	}?>
	</option>
        <option value="0">HABILITADO</option>
        <option value="1">DESABILITADO</option>
      </select>
	  </form>
    </label></td>
  </tr>
  <tr>
    <td><p>FECHA BAJA </p>      </td>
    <td><label>
	   <input type="date" name="fechbaja" id="fechabaja" value="<?php echo"$c->fechbaja";?>">
    </label></td>
  </tr>
  <tr>
    <td>IMAGEN</td>
    <td><label>
	 <input name="imagenx" type="text"  disabled="disabled" id="imagenx" value="<?php echo "Descripcion actual: $c->imagen";?>" size="50" disabled="disabled">
	  <input type="hidden" name="imagen" id="imagen" value="<?php echo"$c->imagen";?>">
	   <input type="file" name="nuevaimagen" id="nuevaimagen" >
    </label></td>
  </tr>
  <tr>
    <td>OBSERVACIONES</td>
    <td><label>
	  <input name="obser" type="text" id="obser" value="<?php echo"$c->obser"; ?>" size="30">
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button" name="Submit" value="Enviar" onClick="validar()">
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
		<?php  include "../../pie.php";?>
		</footer>
	</div>

</body>
</html>