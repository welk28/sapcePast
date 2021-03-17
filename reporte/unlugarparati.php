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
        
            <td >No</td>
			
            <td width="">no_control</td>
            <td >app</td>
            <td >apm</td>
            <td >nombres</td>
            <td >idcar</td>
            <td>Domicilio</td>
            <td >curp</td>
            <td width="">sexo</td>
            <td >sem</td>
            <td width="">edad</td>
            <td width="">fecnac</td>
        </tr>
        <?php
		$alumnos="select distinct a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, a.idcar, a.calle, a.colonia, a.cp, a.ciudad, e.edo from alumnos as a, estado as e, horario as h, cursa as c where a.idedo=e.idedo and h.idh=c.idh and a.matricula=c.matricula and a.idcar='ITIC-2010-225' and h.periodo='$periodo' and (a.status>=1 and a.status<=2 ) order by a.idcar, a.status;";
		$als=mysql_query($alumnos,$conexion); 
		$f=0;
		while($a=mysql_fetch_object($als))
		{
			$fechanacimiento=$a->fecnac;
			list($ano,$mes,$dia) = explode("-",$fechanacimiento);
			$edad= date("Y") - $ano;

			$f++;
			echo"
			<tr>			
				<td>$f</td>	
				<td>$a->matricula</td>
				<td>$a->app </td>
				<td>$a->apm</td>
				<td> $a->nom</td>
				<td> $a->idcar</td>
				<td>$a->calle $a->colonia, CP $a->cp, $a->ciudad, $a->edo   </td>
				<td>$a->curp</td>
				<td>";

				if($a->sexo=="H")
				{
					echo"M";
				}
				else
				{
					echo"F";
				} 
				echo"</td>";
				
				echo"
				<td align='center'>$a->status</td>
				
				<td>$edad</td>
				<td>$a->fecnac</td>
				</tr>	"; 

		}
		?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>