<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM:: ACCESORIO MODIFICA</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">	
	<meta charset="UTF-8">
	<script language="JavaScript" type="text/javascript">
function validar()
{
if((document.modificaaccesorio.descrip.value!=="")&&(document.modificaaccesorio.modelo.value!=="")&&(document.modificaaccesorio.exist.value!=="")&&(document.modificaaccesorio.precio.value!==""))
{
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.modificaaccesorio.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='accesorio.php';
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
		<?php  include"../../usuarios.php"; 
		
		$idacce=strtoupper($_GET[idacce]);
		
		echo"$idacce";
	
		$consulta="select * from accesorio where idacce='$idacce';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		 
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica Accesorio:</div>
			</header>
			<article id="form">
		<div align="center">
			<form  name="modificaaccesorio" id="modificaaccesorio"action="accesoriomodifica2.php" method="post">
	<table width="607" border="1" align="center">
  <tr>
    <td colspan="2"></td>
    </tr>
  <tr>
    <td width="104">ID ACCESORIO </td>
    <td width="487"><label>
      <input type="text" name="idaccex" id="idaccex" value="<?php echo"$c->idacce";?>" disabled="disabled" >
	  <input type="hidden" name="idacce" id="idacce" value="<?php echo"$c->idacce";?>">
    </label></td>
  </tr>
  <tr>
    <td>*DESCRIPCION</td>
    <td> 
        <textarea name="descrip" cols="40" rows="6" ><?php echo"$c->descrip";?></textarea>
         </td>
  </tr>
  <tr>
    <td>*MODELO </td>
    <td><label> 
      <input type="text" name="modelo" id="modelo" value="<?php echo"$c->modelo"; ?>">
    </label></td>
  </tr>
  <tr>
    <td>*EXISTENCIA</td>
    <td><label>
	  <input type="int" name="exist" id="exist" value="<?php echo"$c->exist";?>" >
    </label></td>
  </tr>
  <td>*PRECIO</td>
    <td><label>
 	  <input type="int" name="precio" id="precio" value="<?php echo"$c->precio";?>" >
    </label></td>
  </tr>
  <tr>
    <td>MARCA</td>
    <td>
<?php
     echo"<select name='idmarca'  id='idmarca' onchange='habilitar()'>";
     $combo=" select * from marca where idmarca='$idmarca'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"
	
	<option value='$c->idmarca' selected>MARCA ACTUAL: $c->idmarca </option>
	
	";
     $combo1="select * from marca";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->idmarca'> $com1->nombre </option>";

      } 
    
     echo "</select>";
    ?>	</td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="button" name="aceptar" id="aceptar" value="ACEPTAR" onClick="validar()" >
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