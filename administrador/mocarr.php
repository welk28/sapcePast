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
		$idcar=$_GET[idcar];
		$descar=$_GET[descar];
		
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Modificacion de Datos</div>
        <br>
    </header>

<div id="registros" >
    <?php
	if(empty($descar))
	{
	$seleccionar="select * from carrera where idcar='$idcar';";
	$sel=mysql_query($seleccionar,$conexion);
	$s=mysql_fetch_object($sel);
	?>
        <form action='mocarr.php' method='get' name='form1'>
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
        <td colspan="2" align="center"><input name="idcar" type="text" id="idcar" size="25" readonly  maxlength="3"  value="<?php echo"$idcar"; ?>" ></td>
        <td align="center">&nbsp;</td>
        <td colspan="5" align="center"><input name="descar" type="text" id="descar" size="60" onkeyup="this.value=this.value.toUpperCase()"  maxlength="60"  value="<?php echo"$s->descar"; ?>"></td>
        
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Identificador</td>
        <td align="center">&nbsp;</td>
        <td colspan="5" align="center">Descripción del control</td>
        
        <td  align="center">&nbsp;</td>
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
		$actualiza="update carrera set descar='$descar' where idcar='$idcar';";
		$act=mysql_query($actualiza,$conexion);
		if($act)
		{
			print"
			<script languaje='JavaScript'>
				window.alert('¡Actualización Exitosa!');				
				window.location.href='http://$ip/administrador/carrera.php';
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
