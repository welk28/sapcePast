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
			<div class="subtitulo">Carga de matrícula  <?php echo"$periodo: $p->descper"?></div>
        <br>
    </header>

    <div id="registros" >
    <table >
    	<tr>
			
            <td >no_control</td>
            <td >curp</td>
            <td >nombres</td>
            <td >app</td>
            <td >apm</td>
            <td >genero</td>
            <td >sem</td>
            
            <td >idmat</td>
            <td >materia</td>
            <td >tipo</td>
            <td >cursada</td>
            <td >cal</td>
        </tr>
        <?php
		$alumnos="select a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, h.idmat, m.nommat, c.opor, c.prom  from materias as m, alumnos as a, horario as h, cursa as c where m.idmat=h.idmat and h.idh=c.idh and a.matricula=c.matricula and a.idcar='ITIC-2010-225' and h.periodo='$periodo' order by a.idcar, a.matricula, a.status;";
		$als=mysql_query($alumnos,$conexion); 
		$f=0;
		while($a=mysql_fetch_object($als))
		{
			$f++;
			echo"
			<tr>			
				
				<td>$a->matricula</td>
				<td>$a->curp</td>
				<td> $a->nom</td>
				<td>$a->app </td>
				<td>$a->apm</td>
				<td align='center'>";
				if($a->sexo=="H")
				{
					echo"M";
				}
				else
				{
					echo"F";
				} 
				echo"</td>";
				echo"<td align='center'>$a->status</td>
				<td>$a->idmat</td>
				<td>$a->nommat</td>
				<td align='center'>"; 
				if($a->opor==1 || $a->opor==4 || $a->opor==6)
					echo "O";
				else if($a->opor==2 || $a->opor==5)
					echo "R";
				else if ($a->opor==3)
					echo"E";
				echo"</td>
				<td align='center'>"; 
				if ($a->prom>=70){
					echo"APR";
				}else{
					echo"REP";
				}
				echo"</td>
				<td align='right'>$a->prom</td>			
				</tr>
						"; 

		}
		?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>