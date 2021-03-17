<?php
session_start();
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
	<div id="cuerpo">
	 <section id="seccion">
<?php

  include "../usuarios.php";
 
  $idoc=$_GET[idoc];
  $nomdoc=$_GET[nomdoc];
  $idmat=$_GET[idmat];
  $nommat=$_GET[nommat];
  $idh=$_GET[idh];
 

  $unidad="select unid from materias where idmat='$idmat'";
$uni=mysql_query($unidad,$conexion);
$u=mysql_fetch_object($uni);
$unidad=$u->unid;
$pagina='unidad'.$unidad.'.php';
//echo"idmat: $idmat <br>unidad: $u->unid <br> idoc: $idoc <br> nomdoc: $nomdoc <br> ida: $ida";
if($unidad < 1)
{
	echo"
		<form id='form2' name='form2' method='get' action='guardauniarea.php'>
	  <table width='60%' border='0' align='center' cellpadding='0' cellspacing='0'>
		<tr>
		  <td colspan='2'><h3>Complete los siguientes campos. </h3></td>
		</tr>
		<tr>
		  <td colspan='2'>Id materia: 
		    <label>
		    <input name='idmat' type='text' id='idmat' value='$idmat' readonly='true'/>
	      </label></td>
		</tr>
		<tr>
		  <td colspan='2'>Nombre materia: 
		    <label>
		    <input name='nommat' type='text' id='nommat' value='$nommat' size='45' readonly='true'/>
	      </label></td>
		</tr>
		<tr>
		  <td align='right'>Créditos: </td>
		  <td>  
			<label>
		    <input name='cred' type='text' id='cred' size='6' onkeyup='valida()'/>
	      </label> ej: 3-2-5</td>
		</tr>
		<tr>
		  <td width='30%'><div align='right'>&iquest;Cuantas unidades tiene la materia?: </div></td>
		  <td width='70%'><label>
			<select name='unid' id='unid'>
			  <option value='3'>3</option>
			  <option value='4'>4</option>
			  <option value='5'>5</option>
			  <option value='6'>6</option>
			  <option value='7'>7</option>
			  <option value='8'>8</option>
			  <option value='9'>9</option>
			</select>
		  </label></td>
		</tr>
		<tr>
		  <td><div align='right'>Area en que pertenece: </div></td>
		  <td><label>
			<select name='area' id='area'>
			  <option value='INGENIERIAS'>Ingenierias</option>
			  <option value='CIENCIAS ECONOMICO-ADMINISTRATIVAS'>CIENCIAS ECONOMICO-ADMINISTRATIVAS</option>
			  <option value='CIENCIAS BASICAS'>CIENCIAS BASICAS</option>
			</select>
		  </label></td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td><label>
		    <input name='idoc' type='hidden' id='idoc' value='$idoc' />
		    <input name='nomdoc' type='hidden' id='nomdoc' value='$nomdoc'/>
			<input name='ida' type='hidden' id='ida' value='$idh'/>
		  </label></td>
		</tr>
		<tr>
		  <td colspan='2'><label>
			<div align='center'>
			  <input name='guardar' type='submit' id='guardar' value='Guardar' />
			  </div>
		  </label></td>
		</tr>
	  </table>
	</form>

	";	
}
else
{
	print"
		<script languaje='JavaScript'>
		window.location.href='$pagina?idoc=$idoc&idh=$idh';
		</script>";
	
	}
	?>

	</section>
</div>
</body>
</html>
