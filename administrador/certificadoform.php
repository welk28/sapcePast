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
    $guard=$_GET[guard];
		$matricula=$_GET[matricula];
		$numero=$_GET[numero];
		$libro=$_GET[libro];
    $foja=$_GET[foja];
    $fecha=$_GET[fecha];
    $fechaexp=$_GET[fechaexp];
    $periodo=$_GET[periodo];
    $inicial=$_GET[inicial];

    $existe="select * from certificado where matricula='$matricula'";
    $exi=mysql_query($existe,$conexion);
    $ex=mysql_numrows($exi);
    $ef=mysql_fetch_object($exi);
    if($ex<1)
    {
      $agregarlo="insert into certificado (matricula) values ('$matricula');";
      $agrega=mysql_query($agregarlo,$conexion);
    }
    //else
      //{echo"<h1>existe</h1>";}
		?>
	</header>
    <section id="seccion">
    <header id="header">
			<div class="subtitulo">verifique los datos del certificado</div>
        <br>
    </header>
<div id="registros" >
    <?php
	if(empty($guard))
	{
	?>
        <form action='certificadoform.php' method='get'>
    <table>
      <tr>
        <th colspan="10">Complete los siguientes campos<br></th>
      </tr>
      <tr>
      	<td width="96">&nbsp;</td>
        <td width="98">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="108">&nbsp;</td>
        <td width="93">
        <label for="">Periodo inicial</label>  
        <input type="text" name="inicial" placeholder="periodo Inicial" maxlength="6" value="<?php echo"$ef->inicial"; ?>" required> <br><br></td>
        <td width="84">&nbsp;</td>
        <td width="78">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="85">&nbsp;</td>
        <td width="90" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center">
          <input type="hidden" name="guard" value="1">
          <input name="matricula"  type="text" id="id" size="10" value="<?php echo"$matricula"; ?>" readonly>
        </td>
        <td colspan="3" align="center">
          <input name="periodo" onKeyUp="this.value=this.value.toUpperCase()" type="text"  size="50" value="<?php echo"$ef->periodo"; ?>" required>
        </td>
        <td align="right">&nbsp;</td>
        <td colspan="2" align="center">
          <input name="numero" type="text" size="6" maxlength="10" placeholder="numero" value="<?php echo"$ef->numero"; ?>" required>
        </td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center">Matricula:</td>
        <td colspan="3" align="center">Periodo cursado (ej.AGOSTO DE 2014 A JUNIO DE 2019)</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center">Número</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="10" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          Libro: <input type="text" name="libro"  size="5" maxlength="5" value="<?php echo"$ef->libro"; ?>"  required></td>
        <td colspan="3" align="center">
          A foja: <input type="text" name="foja"  size="5" maxlength="5" value="<?php echo"$ef->foja"; ?>"  required>
        </td>
        <td></td>
        <td colspan="3" align="center">
          Fecha: <input type="date" name="fecha"  size="12" maxlength="11" value="<?php echo"$ef->fecha"; ?>"  required>
        </td>
      </tr>
      <tr>
        <td colspan="10" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="10" align="center">
          <input name="fechaexp" type="text" size="80" maxlength="80" placeholder="Fecha de expedición" value="<?php echo"$ef->fechaexp"; ?>" required> <br> Fecha de expedición
        </td>
      </tr>
      <tr>
        <td colspan="10" align="center">&nbsp;</td>
      </tr>

      <tr>
        <td colspan="10" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Gaurdar cambios' ></td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </form>
      </div>
      <?php
	}
	else
	{
    //echo"<h1>aqui en guardar</h1>";
		$actualiza="update certificado set inicial='$inicial', numero='$numero', libro='$libro', foja='$foja', fecha='$fecha', fechaexp='$fechaexp', periodo='$periodo' where matricula='$matricula';";
		$act=mysql_query($actualiza,$conexion);
		if($act)
		{
      //echo"<h1>guardado</h1>";
			print"
        <script>
            window.alert('Modificado' );
            window.location.href='$ip/administrador/certificadivs.php?matricula=$matricula';
        </script>
      ";
		}
		else
		{
		echo"error";
		}
	}

	  ?>

    </section>

    

    <p>&nbsp;</p>

    <p>&nbsp;</p>

</div>

</body>

</html>

