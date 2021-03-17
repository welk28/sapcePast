<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link rel="stylesheet" type="text/css" href="/css/imprimir.css" media="print" />
</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$idoc=$_GET[idoc];
		$modifica=$_GET[modifica];
		$nomdoc=$_GET[nomdoc];
		$fecha=date('d/m/Y');
		$idh=$_GET[idh];
		$nump=$_GET[nump];
		$nual=$_GET[nual];
		$uno=$_GET[uno];
		$dos=$_GET[dos];
		$tres=$_GET[tres];
		$cuatro=$_GET[cuatro];
		$cinco=$_GET[cinco];
		
		if(!empty($nual))
		{
			$actunum="update horario set num='$nual' where idh='$idh';";
			$actu=mysql_query($actunum,$conexion);
		}
		if($modifica==1)
		{
			$modifcant="update respuesta set uno='$uno', dos='$dos', tre='$tres', cua='$cuatro', cin='$cinco' where idh='$idh' and nop='$nump';";
			$modic=mysql_query($modifcant,$conexion);
		}
		
		
		$docentes="select d.nomdoc, m.nommat, h.num from docente as d, materias as m, horario as h where h.idmat=m.idmat and h.idoc=d.idoc and h.idh='$idh';";
		$doce=mysql_query($docentes,$conexion);
		$do=mysql_fetch_object($doce);
		
		
		
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  </div>
	</header>
	<section id="seccion">
    
        <header id="header">
        <div class="subtitulo" align="center">ENCUESTA AL DESEMPEÑO DOCENTE POR PARTE DEL ALUMNO <br><br></div>
            <div id="revision">
               
            </div>
            <table width="555" align="center">
              <tr>
                <th width="24%">Docente:</th>
                <td width="31%"><u><?php echo"$do->nomdoc"; ?></u></td>
                <th>PERIODO:</th>
                <td><u><?php echo"$p->descper"; ?></u></td>
              </tr>
              <tr>
                <th>Materia:</th>
                <td><u><?php echo"$do->nommat"; ?></u></td>
                <th>IDH</th>
                <td><u><?php echo"$idh"; ?></u></td>
              </tr>
            </table><br><br>
        </header>

        <div id="evadoc" >
       		<div class="subtitulo">Número de alumnos encuestados:<u>
			<?php echo" 
			<form name='numeroalu' action='desglosemo.php' method='get'>   
				<input type='hidden' name='idh' size='2' value='$idh'>
				<input type='text' name='nual' size='2' value='$do->num'> 
				<input type='submit' value='g'>
			</form>";?></u> <br><br></div>
            <table>
            	<tr>
                	<th width="196">1. TOTALMENTE DE ACUERDO</th>
                    <th width="196">2. DE ACUERDO</th>
                    <th width="196">3. INDECISO</th>
                    <th width="196">4. EN DESACUERDO</th>
                    <th width="196">5. TOTALMENTE EN DESACUERDO</th>
                </tr>
            </table>
            <br><br>
            <?php 
				$modulos="select * from modulo order by nomod;";
				$modu=mysql_query($modulos,$conexion);
				echo"
					<table>
					<tr>
						<th width='30px' align='center' rowspan='2'>NO</th>
						<th width='700px' rowspan='2'>PREGUNTA</th>
						<th colspan='5' >OPCIONES</th>
					</tr>
					<tr>
						
						<th width='30px'>1</th>
						<th width='30px'>2</th>
						<th width='30px'>3</th>
						<th width='30px'>4</th>
						<th width='30px'>5</th>
					</tr>";
						
				while($mo=mysql_fetch_object($modu))
				{
						$preguntas="select p.nop, p.pregunta, r.uno, r.dos, r.tre, r.cua, r.cin from pregunta as p, respuesta as r where p.nop=r.nop and p.nomod='$mo->nomod' and r.idh='$idh' ;";
						$preg=mysql_query($preguntas,$conexion);
						echo"
						<tr>
							<th colspan='2' align='left' class='titulotabla'>Módulo: $mo->descmod</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p1); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p2); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p3); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p4); echo"</th>
							<th align='left' class='titulotabla'>"; printf("%0.2f",$mo->p5); echo"</th>
							<th>ca</th>
							<th>gu</th>";
						echo"</tr>
						";
						while($pr=mysql_fetch_object($preg))
						{
							echo"
							<form name='pregunta' action='desglosemo.php' method='get'>
							<tr>
								<td>
								<input type='hidden' name='modifica' size='2' value='1'>
								<input type='hidden' name='idh' size='2' value='$idh'>
								<input type='text' name='nump' size='2' value='$pr->nop'></td>
								<td>$pr->pregunta</td>
								<td class='resul'><input type='text' name='uno' size='2' value='$pr->uno'></td>
								<td class='resul'><input type='text' name='dos' size='2' value='$pr->dos'></td>
								<td class='resul'><input type='text' name='tres' size='2' value='$pr->tre'></td>
								<td class='resul'><input type='text' name='cuatro' size='2' value='$pr->cua'></td>
								<td class='resul'><input type='text' name='cinco' size='2' value='$pr->cin'></td>
								<td>";$suma=0; $suma=$pr->uno+$pr->dos+$pr->tre+$pr->cua+$pr->cin; echo"$suma</td>
								<td><input type='submit' value='g'></td>
							</tr>
							</form>
							";
						}
					
				}
				echo"</table>";
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