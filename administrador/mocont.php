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
		$id=$_GET[id];
		$des=$_GET[des];
		$opcion=$_GET[opcion];
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
	if(empty($des))
	{
	$seleccionar="select * from control where id='$id';";
	$sel=mysql_query($seleccionar,$conexion);
	$s=mysql_fetch_object($sel);
	?>
        <form action='mocont.php' method='get' name='form1'>
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
        <td colspan="2" align="center"><input name="id" type="text" id="id" size="3" maxlength="3" readonly value="<?php echo"$id"; ?>" ></td>
        <td align="center">&nbsp;</td>
        <td colspan="3" align="center"><input name="des" type="text" id="des" size="35" maxlength="60" required value="<?php echo"$s->des"; ?>"></td>
        <td align="right">&nbsp;</td>
        <td colspan="2" align="center"><input name="opcion"  type="text" id="opcion" size="35" maxlength="60" value="<?php echo"$s->opcion"; ?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Identificador</td>
        <td align="center">&nbsp;</td>
        <td colspan="3" align="center">Descripción del control</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center">valor del control</td>
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
		$actualiza="update control set des='$des', opcion='$opcion' where id='$id';";
		$act=mysql_query($actualiza,$conexion);
		if($act)
		{
			print"
			<script languaje='JavaScript'>
				window.alert('¡Actualización Exitosa!');				
				window.location.href='http://$ip/administrador/control.php';
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
