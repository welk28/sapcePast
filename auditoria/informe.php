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
		<?php 	include "usuarios.php";	
		$noev=$_GET[noev];
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='index.php';
				</script>
				";
}
		?>
	</header>
	
	
	<section id="seccion">
    
    <header id="header">
	  <div id="revision">
               <br>
                <table  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td width="100px" rowspan="3"><img src="sgc/sgc_tecnm.png" alt="dgest" width="130" height="60" /></td>
                    <td width="800px" rowspan="2" align="left"><strong>Formato para el informe de resultados de la encuesta de servicios</strong></td>
                    <td width="180px" >Código: TecNM-CA-PO-001-03 </td> 
                  </tr>
                  <tr>
                    <td>Revisi&oacute;n: O </td>
                  </tr>
                  <tr>
                    <td align="left"><strong>Referencia a la Norma ISO 9001:2015 5.1.2, 10.3</strong></td>
                    <td>P&aacute;gina 1 de 1 </td>
                  </tr>
                </table><br><br>
       </div>
	   <div class="subtitulo" align="center">INSTITUTO TECNOLOGICO DE IZTAPALAPA II </div>
	   
	   <P>
	   		ÁREA AUDITADA: <u></u> <br>
			RESPONSABLE: <u></u> <br>
			FECHA: <u></u>
			NO. DE ENCUESTADOS:  <u></u> <br>
	   </P>
        <br>
    </header>

    <div id="registros" >
    	<table>
			<tr>
				<th width="50" align="center">NO</th>
				<th width="100" align="center">MATRICULA</th>
				<th width="100" align="center">ID CARRERA</th>
				<th width="300" align="center">NOMBRE DEL ALUMNO</th>
				<th width="100" align="center">VER</th>
		   </tr>
				<?php
				$alumnos="select distinct a.matricula, a.idcar, a.app, a.apm, a.nom from alumnos as a , respondaudita as r where a.matricula=r.matricula and r.noev='$noev' order by a.idcar;";
				$alum=mysql_query($alumnos,$conexion);
				$a=mysql_num_rows($alum);
				if($a<1)
				{
			   print"
					<script languaje='JavaScript'>
					alert('no se ha auditado dicho servicio');
					window.location.href='programa.php';
					</script>
					";
		   	}
		   else 
		   {
			   while($s=mysql_fetch_object($alum))
				{
				   $n++;
			   echo"<tr>
					<td>$n</td>
					<td>$s->matricula</td>
					<td>$s->idcar</td>
					<td>$s->nom  $s->app $s->apm</td>
					<td > <a href='auditado.php?matricula=$s->matricula'>Ver</a></td>	
					</tr>";		
				}
			}	
				?>
				
		</table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>