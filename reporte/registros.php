<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='../index.php';
				</script>
				";
}
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Lista de alumnos inscritos en el semestre actual <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th>
            <th width="">CURP</th>
            <th width="">NOMBRE (s)</th>
            <th width="">APELLIDO PATERNO</th>
            <th width="">APELLIDO MATERNO</th>
            <th width="">SEXO</th>
            <th width="">LUGAR NACIMIENTO</th>
            
            <th width="">DIA DE NACIMIENTO</th>
            <th width="">MES DE NACIMIENTO</th>
            <th width="">AÑO DE NACIMIENTO</th>
            <th width="">CODIGO POSTAL</th>
            <th width="">CORREO ELECTRONICO</th>
            <th width="">NACIONALIDAD</th>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.app, a.apm, a.nom, es.edo, a.status,a.curp, a.fecnac, a.email, a.sexo, a.cp  from alumnos as a, horario as h, cursa as c, estado as es where es.idedo=a.idedo and h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$fechanacimiento=$a->fecnac;
			list($ano,$mes,$dia) = explode("-",$fechanacimiento);
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td align='center'>$a->curp</td>
				<td> $a->nom</td>
				<td>$a->app</td>
				<td>$a->apm</td>
				<td>$a->sexo</td>
				<td>$a->edo</td>
				<td align='center'>$dia</td>
				<td align='center'>$mes</td>
				<td align='center'>$ano</td>
				<td>$a->cp</td>
				<td>$a->email</td>
				
			</tr>
			"; 
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>