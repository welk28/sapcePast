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
	$anterior=$_GET[anterior];
$alumnosd="select * from alumnos where matricula='$anterior';";
	$alud=mysql_query($alumnosd,$conexion);
	$ad=mysql_fetch_object($alud);
	$control=$_GET[control];
	$matricula=$_GET[matricula];
	$idcar=$_GET[idcar];
	
	//verificar primero si existen registros de alumnos UNICAMENTE DE NUEVO INGRESO EN QUE SU STATUS ES IGUAL A 0, NO INSCRITOS
$sqla="select opcion from control where id='2';";
$ra=mysql_query($sqla,$conexion);
$ral=mysql_fetch_object($ra);

$pl=109;
$anio=date(Y);
$ral=$ral->opcion+1;
if($ral>0 && $ral<10)
{
	$ceros="000";
	$no=$anio[2].$anio[3].$pl.$ceros.$ral;
}
else
{
	if($ral>=10 && $ral<100)
	{
		$ceros="00";
		$no=$anio[2].$anio[3].$pl.$ceros.$ral;
	}
	else
	{
		if($ral>=100 && $ral<1000)
		{
			$ceros="0";
			$no=$anio[2].$anio[3].$pl.$ceros.$ral;
		}
		else
		{
			$no=$ral;
			$no=$anio[2].$anio[3].$pl.$ral;
		}
		
	}
}
	
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Inscripción de alumno al periodo <?php echo"$periodo $p->descper"?></div>
            <br>
        </header>

        <div id="registros" >
        <?php 
		if(!$matricula)
		{
		?>
        <form action="inscribir.php" name="cursar" method="get">
        <table>
            <tr>
                <td colspan="3" align="center"><label for="alumno"></label>
                <input name="alumno" type="text" id="alumno" size="45" readonly value="<?php echo"$ad->app $ad->apm $ad->nom";?>"></td>
                <td width="98" align="center"><label for="idh" ></label></td>
                <td align="center"><label for="control"></label>
              <input name="control" type="text" id="control" value="<?php echo"$anterior";?>" size="12" maxlength="12" readonly></td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center"><input name="matricula" type="text" id="matricula" value="<?php echo"$no";?>" size="12" maxlength="12" readonly></td>
              <td align="center"><label for="matricula"></label></td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="3" align="center">Alumno
                  </th>
                <th align="center">&nbsp;</th>
                <th align="center">Anterior</th>
                <th align="center">&nbsp;</th>
                <th align="center">&nbsp;</th>
                <th align="center">No Control</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
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
                <td colspan="4" align="center"><select name='idcar' id='idcar'>
                  ";
                  <?php
				   $sqle="select * from carrera";
				   $re=mysql_query($sqle,$conexion);
					while ($regta = mysql_fetch_object($re)){
	  				echo "
                  		<option value='$regta->idcar'>$regta->idcar - $regta->descar</option>
                  		";
	  				}
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
                <th colspan="4" align="center">Selecciona Carrera</th>
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
		{
			//echo"$control <br> $matricula <br> $idcar";	
			$sqco="update control set opcion='$ral' where id='2'";
			$sco=mysql_query($sqco,$conexion);
			
			$sqi="update alumnos set matricula='$matricula', status='1', idcar='$idcar' where matricula='$control';";
			$rei=mysql_query($sqi,$conexion);
			if($rei)
			{
				print"
						<script languaje='JavaScript'>
						var respuesta=confirm('Alta exitosa, ¿Desea Cargar materias a su horario?');
						if(respuesta==true)
						{
							window.location.href='cargahorario.php?&idcar=$idcar&matricula=$matricula';
						}
						else
						{
							window.location.href='horario.php';
						}
						</script>";
			}
		} ?>
      </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>