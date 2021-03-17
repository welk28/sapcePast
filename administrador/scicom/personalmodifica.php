<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM::MODIFICA PERSONAL</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
	function validar()
{
if(document.personalmodifica.fechainicio.value!=="")
{
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.personalmodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='personal.php';
}

}
else{
alert("ALGUNOS CAMPOS NO PUEDEN QUEDAR  VACIOS");
}

}


</script>
</head>
<body>
<div id="cuerpo">
	<header>
	<?php include"../../usuarios.php";
	$idpersonal=$_GET[idpersonal];
	$consulta="select * from personal where idpersonal='$idpersonal'";
	$con=mysql_query($consulta,$conexion);
	$c=mysql_fetch_object($con);
	?>
	</header>
	<section id="seccion">
		<header id="header">
			<div class="subtitulo">Modificar Datos del Personal:</div>
		</header>
		<article id="form">
			<div align="center">	
			<form name="personalmodifica" id="personalmodifica" action="personalmodifica2.php" method="get">
			<table width="362" border="1">
  <tr>
    <td width="62">idpersonal</td>
    <td width="284"><label>
      <input type="text" value="<?php echo"$idpersonal";?>" disabled="disabled">
	   <input type="hidden" name="idpersonal" id="idpersonal" value="<?php echo"$idpersonal";?>">
    </label></td>
  </tr>
  <tr>
    <td>nombre</td>
    <td><label>
      <input type="text" value="<?php echo"$c->nompersonal";?>" size="50" disabled="disabled">
	      <input type="hidden" id="nompersonal" name="nompersonal" value="<?php echo"$c->nompersonal";?>">
    </label></td>
  </tr>
  <tr>
    <td>*fecha</td>
    <td><label>
      <input type="date" name="fechainicio" id="fechainicio" value="<?php echo"$c->fechainicio";?>">
    </label></td>
  </tr>
  <tr>
    <td>status</td>
    <td>
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
	</td>
  </tr>
  <tr>
    <td>fechafin</td>
    <td><label>
      <input type="date" name="fechafin" id="fechafin" value="<?php echo"$c->fechafin";?>">
    </label></td>
  </tr>
   <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="button" name="Submit" value="ACEPTAR" onClick="validar()">
        </div>
    </label></td>
    </tr>
</table>

			</form>
			</div>
		</article>
	</section>
	<footer>
	<?php include"../../pie.php";?>
	</footer>
</div>
</body>
</html>