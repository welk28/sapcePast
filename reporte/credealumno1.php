<?php
session_start();
$matricula=$_GET[matricula];
 ?>
<!DOCTYPE html >
<html >
<head>
<meta charset="UTF-8" />
<title>Impresion de credenciales</title>

<link href="../css/credencial.css" rel="stylesheet" type="text/css" />

</head>

<body>
<section>
     <header >
		<?php 	
		include "../conexion.php";	
		$conexion=conectar();
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	
		?>
        <div class="subtitulo"> <a href="javascript:window.print()"> </a>  </div>
	</header>
<?php
$periodo=$_SESSION['periodo'];

	$alum="select distinct a.matricula, a.app, a.apm, a.nom, ca.descar,  a.curp, a.calle, a.colonia, a.idedo, a.ciudad, a.email, a.telal from cursa as c, carrera as ca, alumnos as a, horario as h where a.matricula=c.matricula and ca.idcar=a.idcar and h.idh=c.idh and h.periodo='$periodo' and a.matricula='$matricula';";
	$al=mysql_query($alum,$conexion);
	$salto=0;
	while($a=mysql_fetch_object($al))
	{
		$salto++;
	?>
    
    <div class="credencial">
    	<div class="cred">
        	<div class="logotec">
        		<img src="../img/logopng_2.2.2.png" alt="tec" width="97" height="69" />
            </div>
            <div class="nomtec">
            	<p>Instituto Tecnológico de Iztapalapa II</p>
            </div>
            <div class="lineasalto"></div>
            <p class="etiqueta">No control:</p>
            <p class="dato"><?php echo"$a->matricula";?></p>
            <div class="lineasalto"></div>
            <p class="etiqueta">Alumno:</p>
            <p class="dato"><?php echo"$a->app $a->apm $a->nom";?></p>
            <div class="lineasalto"></div>
            <p class="etiqueta">Carrera:</p>
            <p class="dato"><?php echo"$a->descar";?></p>
			<p><img src="../img/firma2.png" alt="tec" width="380" height="100" align="right"/></p>
        </div>
        
			<STYLE>
			H1.SaltoDePagina
			{
			PAGE-BREAK-AFTER: always
			}
			</STYLE>
			
			<H1 class=SaltoDePagina> </H1>
            
        <div class="cred">
        	<div class="credelogosep">
            	<img src="../img/LOGO_SEP.png" width="235" height="70" />
            </div>
            <div class="credelogodgest">
            	<img src="../img/tecnm2.png" width="235" height="70" />
            </div>
            <center>Datos del estudiante</center>
            <div class="otrolado">
            	<p class="datoestu">Dirección:</p>
                <p class="datoestu2"><?php echo"$a->calle $a->colonia $a->idedo $a->ciudad";?></p>
            	<p class="datoestu">CURP:</p>
                <p class="datoestu2"><?php echo"$a->curp";?></p>
            </div>
            <div class="refrendo">
            	<table>
                	<tr>
                    	<th colspan="2">2018</th>
                        <th colspan="2">2019</th>
                        <th colspan="2">2020</th>
                    </tr>
                    <tr>
                    	<td>Ene-Jul</td>
                        <td>Ago-Dic</td>
                        <<td>Ene-Jul</td>
                        <td>Ago-Dic</td>
                        <td>Ene-Jul</td>
                        <td>Ago-Dic</td>
                    </tr>
                </table>
            </div>
            <p class="firma">Firma del estudiante</p>
        </div>
    </div>
	
	
	<br />
	
	<?php
	
}
?>
</section>
</body>
</html>
