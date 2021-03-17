<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>


</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
		$alumno="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
			?>
			
	</header>
	<section id="seccion">
    
        <header id="header">
            <div id="revision">
               <br>
                <table  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td width="100px" rowspan="3"><img src="../img/logodgest.png" alt="dgest" width="130" height="60" /></td>
                    <td width="800px" rowspan="2" align="center"><strong>Formato de carga acad&eacute;mica.</strong></td>
                    <td width="180px" >C&oacute;digo: N/A </td>
                  </tr>
                  <tr>
                    <td>Revisi&oacute;n: O </td>
                  </tr>
                  <tr>
                    <td align="center"><strong>Referencia a la Norma ISO 9001-2000: 7.2.1, 7.2.2, 7.2.3, 7.5.3</strong></td>
                    <td>P&aacute;gina 1 de 1 </td>
                  </tr>
                </table><br><br><br><br>
            </div>
            <table width="555" align="center">
              <tr>
                <td>FECHA:</td>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <td width="24%">N&Uacute;MERO DE CONTROL:</td>
                <td width="31%"><u><?php echo"$matricula"; ?></u></td>
                <td>PERIODO:</td>
                <td><u><?php echo"$p->descper"; ?></u></td>
              </tr>
              <tr>
                <td>ESTUDIANTE:</td>
                <td><u><?php echo"$a->app $a->apm $a->nom"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>SEMESTRE:</td>
                <td><u><?php echo"$a->status"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CARRERA:</td>
                <td><u><?php echo"$a->descar"; ?></u></td>
                <td>CR&Eacute;DITOS:</td>
                <td><u><?php echo"$sumcred"; ?></u></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"$a->idcar"; ?></u></td>
                <td>ESPECIALIDAD:</td>
                <td><u>
                  <?php 
                    /*if($idcar=="ITIC-2010-225")
                        echo"ESPECIALIDAD PARA TICS"; 
                    else
                    {
                        if($idcar=="ILOG-2009-202")
                            echo"ESPECIALIDAD PARA LOGISTICA";
                        else
                        {
                            if($idcar=="IADM-2010-213")
                                echo"ESPECIALIDAD PARA ADMINISTRACION";	
                        }
                    }
                    */
                    ?>
                </u></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br><br><br><br>
        </header>

        <div id="registros" >
      <form action="gargag2.php" name="form1" method="get">
        <table>
        	<tr>
           	  <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <th colspan="3" align="center">Seleccione al grupo</th>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
          </tr>
            <tr>
           	  <td><input type="hidden" name="matricula" value="<?php echo"$matricula"; ?>"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98"><select name='idg' id='idg' required>
                <?php
	  
		//echo "<option value='$d->idcar'>$ej->descar</option>";
   		
	  
  $carrera="select distinct g.idg from horario as h, hgrupo as g, posee as p, encarre as e where e.idg=g.idg and p.idmat=h.idmat and h.idh=g.idh and h.periodo='$periodo' and p.idcar='$a->idcar' and e.idcar=p.idcar order by g.idg;";
   $carr=mysql_query($carrera,$conexion);
   
	while ($ca= mysql_fetch_object($carr)){
	  echo "<option value='$ca->idg'>$ca->idg</option>";
	  }
	?>
              </select></td>
              <td width="98">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td></td>
                <th colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Cargar'></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
      </table>
     </form>
  </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>