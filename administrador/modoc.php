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
		$idoc=$_GET[idoc];

    $idoc3=$_POST[idoc3];
    $idoc2=$_POST[idoc2];
		$passdoc=strtoupper($_POST[passdoc]);
		$nomdoc=$_POST[nomdoc];
    $habil=$_POST[habil];
    if(empty($habil))
      $status=0;
    else
		  $status=1;
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Modificacion de Datos: Docente</div>
        <br>
    </header>

<div id="registros" >
    <?php
	if(empty($idoc2))
	{
	$seleccionar="select * from docente where idoc='$idoc';";
	$sel=mysql_query($seleccionar,$conexion);
	$s=mysql_fetch_object($sel);
	?>
        <form action='modoc.php' method='post' name='form1'>
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
        <td colspan="2" align="center">
          <input name="idoc3" type="hidden" id="id" size="15" maxlength="15" value="<?php echo"$idoc"; ?>" >
          <input name="idoc2" type="text" id="id" size="15" maxlength="15" value="<?php echo"$idoc"; ?>" ></td>
        <td colspan="3" align="center"><input name="nomdoc" onKeyUp="this.value=this.value.toUpperCase()" type="text" id="des" size="35" maxlength="60" required value="<?php echo"$s->nomdoc"; ?>"></td>
        <td align="center">
        <?php  
          if($s->status==1)
            echo"<input type='checkbox' name='habil' checked/>";
          else
            echo"<input type='checkbox' name='habil' />";

        ?>

          </td>
        <td colspan="2" align="center"><input name="passdoc" value="" type="password" id="passdoc" size="10" maxlength="10" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center">Identificador</td>
        <td colspan="3" align="center">Nombre del docente</td>
        <td>Act/inact</td>
        <td colspan="2" align="center">Password</td>
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
		if(empty($passdoc))
    {
      $actualiza="update docente set nomdoc='$nomdoc', status='$status', idoc='$idoc2' where idoc='$idoc3';";
    }
    else
    {
      $actualiza="update docente set nomdoc='$nomdoc', status='$status', contra=1, idoc='$idoc2', passdoc=sha1('$passdoc') where idoc='$idoc3';";
    }
		echo"
    idoc: $idoc2 <br>
    pass: $passdoc <br>
    nom: $nomdoc <br>
    habil: $status <br>
";
			
		
		$act=mysql_query($actualiza,$conexion);
		
    if($act)
		{
			print"
			<script languaje='JavaScript'>
				window.alert('¡Actualización Exitosa!');				
				window.location.href='$ip/administrador/docentes.php';
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
