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
	$control=$_POST[control];
	$matricula=$_POST[matricula];
	$idcar=$_POST[idcar];
	
	
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Carga de materias a alumnos de nuevo ingreso al periodo <?php echo"$periodo $p->descper"?></div>
            <br>
        </header>

        <div id="registros" >
        
        <form action="inscribir.php" name="cursar" method="post">
        <table>
            
            
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
       
      </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>