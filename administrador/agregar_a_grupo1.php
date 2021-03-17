<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<script>
    function foco(prom){
 document.getElementById(prom).focus();
}

</script>
</head>

<body onload="document.cursar.prom.focus();">

	
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	$matricula=$_GET[matricula];
	$idh=$_GET[idh];
	$idmat=$_GET[idmat];
    $idcar=$_GET[idcar];
	$alumnosd="select * from alumnos where matricula='$matricula';";
	$alud=mysql_query($alumnosd,$conexion);
	$ad=mysql_fetch_object($alud);
	
	$horarios="select distinct d.nomdoc, m.nommat from horario as h, docente as d, materias as m where h.idoc=d.idoc and h.idmat=m.idmat and h.idh='$idh';";
    $hora=mysql_query($horarios,$conexion);
    $ho=mysql_fetch_object($hora);

		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Alta de materia a horario de alumno <?php echo"$periodo $p->descper"?></div>
            <br>
        </header>

        <div id="registros" >
        <form action="agregar_a_grupo2.php" name="cursar" method="post">
        <table>
            <tr>
                <td colspan="3" align="center"><label for="alumno"></label>
                <input name="alumno" type="text" id="alumno" size="45" readonly value="<?php echo"$ad->app $ad->apm $ad->nom";?>"></td>
                <td width="98" align="center"><label for="idh" ></label>
                <input name="idh" type="text" id="idh" size="10" readonly value="<?php echo"$idh";?>"></td>
                <td colspan="4" align="center"><label for="textfield"></label>
                <input name="textfield" type="text" id="textfield" size="60" readonly value="<?php echo"$ho->nommat";?>"></td>
              <td colspan="3" align="center"><label for="textfield2"></label>
              <input name="textfield2" type="text" id="textfield2" size="40" readonly value="<?php echo"$ho->nomdoc";?>"></td>
            </tr>
            <tr>
                <th colspan="3" align="center">Alumno
                  <label for="matricula"></label>
                <input name="matricula" type="hidden" id="matricula" size="2" readonly value="<?php echo"$matricula";?>"></th>
                <th align="center">Horario</th>
                <th colspan="4" align="center">Materia</th>
                <th colspan="3">Docente</th>
            </tr>
            <tr>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td>&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>
                <td width="98">&nbsp;</td>             
            </tr>
             <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td colspan="4" align="center">
                  <select name="opor" id="opor">
                  <!--<option value='' selected>SELECCIONE</option>
          <option value='1'>S&iacute;</option>
          <option value='2'>No</option>-->
                  <?php
				  $saber="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$idmat' order by c.idh desc LIMIT 0,1;";
				  $sab=mysql_query($saber,$conexion);
				  $s=mysql_fetch_object($sab);
				  if(!empty($s->opor))
				  {
					if($s->prom<70)
					{
						if($s->opor==1)
									echo"<option value='2'>REPETICION</option>";
								else
								{
									if($s->opor==2)
										echo"<option value='3'>ESPECIAL</option>";	
									else
									{
										if($s->opor==4)
											echo"<option value='3'>ESPECIAL</option>";
									}
								}
					}
				  }	
				  $oportunidad="select * from oportunidad;";
				  $opor=mysql_query($oportunidad,$conexion);
				  while($o=mysql_fetch_object($opor))
				  echo"<option value='$o->opor'>$o->descopor</option>";
				  ?>
                </select></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
           <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <th colspan="4" align="center">OPORTUNIDAD</th>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
            <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
            <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <th colspan="4" align="center"><input type="text" id="prom" name="prom" required>
                    <input type="hidden" name="idcar" value="<?php echo"$idcar"; ?>">
                </th>
                <td >&nbsp;</td> 
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
            <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <th colspan="4" align="center">Calificacion</th>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
            <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2" align="center" ><input type="submit" name="button" id="button" value="Cargar"></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
        </table>
        </form>
      </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>