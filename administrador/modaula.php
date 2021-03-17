<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
    <header>
		<?php 	include "../usuarios.php";	
		$ida=$_GET[ida];
		
		$aula=$_GET[aula];
		
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Modificacion de Datos: aula</div>
        <br>
    </header>

<div id="registros" >
    <?php
	if(empty($aula))
	{
	$seleccionar="select * from aula where ida='$ida';";
	$sel=mysql_query($seleccionar,$conexion);
	$s=mysql_fetch_object($sel);
	?>
        <form action='modaula.php' method='get' name='form1'>
    <table>
      <tr>
        <th colspan="10">Complete los siguientes campos<br></th>
      </tr>
      
      <tr>
      	<td width="96">&nbsp;</td>
        <td width="98">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="108">&nbsp;</td>
        <td width="93">&nbsp;</td>
        <td width="84">&nbsp;</td>
        <td width="78">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="85">&nbsp;</td>
        <td width="90" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center"><input name="ida" type="text" id="id" size="10" maxlength="10" readonly value="<?php echo"$ida"; ?>" ></td>
        <td colspan="3" align="center"><input name="aula" onKeyUp="this.value=this.value.toUpperCase()" type="text" id="des" size="35" maxlength="60" required value="<?php echo"$s->aula"; ?>"></td>
        <td align="right">&nbsp;</td>
        <td colspan="2" align="center"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center">Identificador</td>
        <td colspan="3" align="center">Nombre del docente</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">&nbsp;</td>
        <td colspan="3" align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Actualizar'></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </form>
      </div>
      <?php
	}
	else
	{
		
		
			$actualiza="update aula set aula='$aula' where ida='$ida';";
		
		$act=mysql_query($actualiza,$conexion);
		if($act)
		{
			print"
			<script languaje='JavaScript'>
				window.alert('¡Actualización Exitosa!');				
				window.location.href='$ip/administrador/aula.php';
			</script>";
		}
	
	}
	  ?>
    </section>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
