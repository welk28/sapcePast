<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link rel="stylesheet" type="text/css" href="css/imprimir.css" media="print" />
</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$idoc=$_GET[idoc];
		$nomdoc=$_GET[nomdoc];
		$fecha=date('d/m/Y');
		
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  </div>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div id="revision">
               
            </div>
            <table width="555" align="center">
              <tr>
                <th>FECHA:</th>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <th width="24%">Docente:</th>
                <td width="31%"><u><?php echo"$nomdoc"; ?></u></td>
                <th>PERIODO:</th>
                <td><u><?php echo"$en->descper"; ?></u></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br><br>
        </header>

        <div id="registros" >
        <table width="980">
            <tr>
                <th width="140">CLAVE</th>
                <th width="320">Materia</th>
                <th width="10">Lista</th>
        	</tr>
            <?php
            $horario="select h.idoc, h.idh, h.idmat, m.nommat from horario as h, materias as m where h.idmat=m.idmat and h.idoc='$idoc' and h.periodo='$en->periodo';";
				$hora=mysql_query($horario,$conexion);
				$q=0;
				while($h=mysql_fetch_object($hora))
				{					
					echo"
					<tr>
	
						<td>$h->idh / $h->idmat</td>
						<td>$h->nommat </td>
						<td><a href='desglose.php?idh=$h->idh&idoc=$h->idoc' target='_blank'>Ver</a></td>
					</tr>
					";
				}
            ?>
        </table>
      </div>
      
        <p>&nbsp;</p>
        <table>
        	<tr>
           	  <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
          </tr>
            <tr>
           	  <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
      </table>
      
  </section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>
</body>
</html>