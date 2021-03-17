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
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Alta de evento</div>
        <br>
    </header>

<div id="registros" >
    
        <form action='altaevento.php' method='post' name='form1'>
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
        <td colspan="2" align="center"><input name="perio"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="perio" size="25" maxlength="60" placeholder="0000-0" required></td>
        <td align="center">&nbsp;</td>
        <td colspan="3" align="center"><input name="descper"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="descper" size="35" maxlength="60" placeholder="ej: Agosto 2014 - Enero 2015 " required></td>
        <td align="right">&nbsp;</td>
        <td colspan="2" align="center"><input name="reporte"  onKeyUp="this.value=this.value.toUpperCase()"  type="text" id="reporte" size="35" maxlength="60" placeholder="ej: 04/02/2014 - 06/06/2014" ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Periodo</td>
        <td align="center">&nbsp;</td>
        <td colspan="3" align="center">Descripción del periodo</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center">Periodo para reporte académico</td>
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
        <td colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Siguiente'></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </form>
      </div>
    </section>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
