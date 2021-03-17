<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>

<body>

	
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	
	
	$matricula=$_GET[matricula];
	$idcar=$_GET[idcar];
	$alumnosd="select * from alumnos where matricula='$matricula';";
	$alud=mysql_query($alumnosd,$conexion);
	$ad=mysql_fetch_object($alud);
	$idg=$_GET[idg];
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Carga de materias a alumnos de nuevo ingreso al periodo <?php echo"$periodo $p->descper"?></div>
            <br>
        </header>

        <div id="registros" >
        <?php if(!$idg)
		{?>
        <form action="cargahorario.php" name="cursar" method="get">
        <table>
            <tr>
                <td colspan="3" align="center">
                <input name="alumno" type="text" id="alumno" readonly size="45" value="<?php echo"$ad->app $ad->apm $ad->nom ";?>"></td>
                <td>&nbsp;</td>
                <td width="98">Matrícula:</td>
                <td width="98"><input name="matricula" type="text" id="matricula" value="<?php echo"$matricula";?>"readonly size="9"></td>
                <td width="98">&nbsp;</td>
                <td colspan="3"><input name="idcar" type="text" id="idcar" readonly size="45" value="<?php echo"$idcar";?>"></td>
            </tr>
             <tr>
                <td colspan="3" align="center" >Alumno</td>
                <td colspan="4" align="center"><select name='idg' id='idg'>
                  ";
                  <?php
				   $sqle="select distinct g.idg  from hgrupo as g, horario as h, encarre as e where e.idg=g.idg and e.idcar='$idcar' and g.idh=h.idh and h.periodo='$periodo' and g.idg like '%1%';";
				   $re=mysql_query($sqle,$conexion);
					while ($regta = mysql_fetch_object($re)){
	  				echo "
                  		<option value='$regta->idg'>$regta->idg</option>
                  		";
	  				}
					?> 
    
                </select></td>
                <td width="98" >&nbsp;</td>
                <td width="98" >&nbsp;</td>
                <td width="98" >&nbsp;</td>             
            </tr>
           <tr>
                <td width="98" >&nbsp;</td>
                <td width="98" >&nbsp;</td>
                <td width="98" >&nbsp;</td>
                <th colspan="4" align="center">Selecciona grupo</th>
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
                <td>&nbsp;</td>
                <td colspan="2" align="center" ><input type="submit" name="button" id="button" value="Inscribir"></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>             
            </tr>
        </table>
        </form>
       <?php 
		}
		else
		{$opor=1;
		$fecha=date('Y-m-d');
			//echo"periodo: $periodo <br> idcar: $idcar <br> idg: $idg";
			$materias="select g.idg, h.idh, p.idmat, p.sem, m.nommat, d.idoc, d.nomdoc from posee as p, horario as h, hgrupo as g, materias as m, docente as d where d.idoc=h.idoc and m.idmat=p.idmat and m.idmat=h.idmat and g.idh=h.idh and p.idmat=h.idmat and h.periodo='$periodo' and p.idcar='$idcar' and g.idg='$idg';";
			$mates=mysql_query($materias,$conexion);
			while($ma=mysql_fetch_object($mates))
			{
				//echo"<br>$ma->idh $ma->nommat $matricula $opor $fecha $usuario	<br>";
				$alta="insert into cursa (idh, matricula, opor, fecing, asigna) values ('$ma->idh', '$matricula', '$opor', '$fecha', '$usuario')";
				$al=mysql_query($alta,$conexion);
			}
			if($al)
			{
				print"
						<script languaje='JavaScript'>
						var respuesta=confirm('Alta exitosa, ¿Desea ver el horario?');
						if(respuesta==true)
						{
							window.location.href='horalumno.php?&matricula=$matricula';
						}
						else
						{
							window.location.href='listaspirante.php';
						}
						</script>";	
			}
		}
	   ?>
      </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>