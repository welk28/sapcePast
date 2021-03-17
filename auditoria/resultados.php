<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
    include "usuarios.php";	
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
		<div id="revision">
            <br>
            <table  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
                 	<td width="150px" rowspan="3" align="center"><img src="sgc/sgc_tecnm.png" alt="dgest" width="80"  /></td>
                    <td width="650px" rowspan="2" align="left"><strong>FORMATO ELECTRÓNICO PARA INFORME DE AUDITORÍAS DE SERVICIO</strong></td>
                    <td width="280px" >Código: TecNM-CA-PG-007-04</td>
                 </tr>
                 <tr>
                    <td>Revisi&oacute;n: O </td>
                 </tr>
                 <tr>
                    <td align="left"><strong>Referencia a la Norma ISO 9001:2015  7.1</strong></td>
                    <td>P&aacute;gina 1 de 1 </td>
                 </tr>
            </table><br><br>
        </div>
        <div class="subtitulo" align='center'>RESULTADOS DE AUDITORIA DE SERVICIOS</div>
				<div class="subtitulo" align='center'>INSTITUTO TECNOLOGICO DE IZTAPALAPA II</div>
        
        <br>
    </header>

    <div id="registros" > <?php 
		$numeros="select s.idser, s.descs,a.noev, a.fecha from servicio as s, auditoria as a where s.idser=a.idser and a.periodo='$periodo';";
    	$num=mysql_query($numeros,$conexion);
    	$n=mysql_num_rows($num);
    	if($n<1)
    	{
    		echo"<tr>
	    			<td colspan='3' align='center'>NO EXISTE AUDITORIA EN ESTE PERIODO</td>
	    		</tr>";
    	}
    	else
    	{
				while($s=mysql_fetch_object($num))
				{ 
					$noencuestados="select distinct matricula from respondaudita where noev=$s->noev;";
					$noenc=mysql_query($noencuestados,$conexion);
					$ne=mysql_num_rows($noenc);
					echo"Numero de encuestados: $ne <br>";
					echo"<div class='subtitulo' align='center'>$s->descs</div> <br>";
					?>
						<table>
							<tr>
								<th rowspan="3">No</th>
								<th colspan="6">CALIFICACION</th>
							</tr>
							<tr>
								<th colspan="5">No. de encuestas por escala de calificacion</th>
								<th rowspan="2">Promedio</th>
							</tr>
							<tr>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
								<th>5</th>
							</tr>
							<?php
							$preguntas="select * from preguntaudita where idser='$s->idser'; ";
							$pregs=mysql_query($preguntas,$conexion);
							$x=0;
							$z=0;
							$k=0;
							while($p=mysql_fetch_object($pregs)){ 
								$x++;
								$cuan1="select * from respondaudita where noev=$s->noev and nop=$p->nop and resp=1;";
								$cua1=mysql_query($cuan1,$conexion);
								$nc1=mysql_num_rows($cua1);

								$cuan2="select * from respondaudita where noev=$s->noev and nop=$p->nop and resp=2;";
								$cua2=mysql_query($cuan2,$conexion);
								$nc2=mysql_num_rows($cua2);

								$cuan3="select * from respondaudita where noev=$s->noev and nop=$p->nop and resp=3;";
								$cua3=mysql_query($cuan3,$conexion);
								$nc3=mysql_num_rows($cua3);

								$cuan4="select * from respondaudita where noev=$s->noev and nop=$p->nop and resp=4;";
								$cua4=mysql_query($cuan4,$conexion);
								$nc4=mysql_num_rows($cua4);

								$cuan5="select * from respondaudita where noev=$s->noev and nop=$p->nop and resp=5;";
								$cua5=mysql_query($cuan5,$conexion);
								$nc5=mysql_num_rows($cua5);
							?>
								
							<tr>
								<td align="center"><?php echo $x  ;?></td>
								<td align="center"><?php if($nc1>0)echo $nc1;?></td>
								<td align="center"><?php if($nc2>0)echo $nc2;?></td>
								<td align="center"><?php if($nc3>0)echo $nc3;?></td>
								<td align="center"><?php if($nc4>0)echo $nc4;?></td>
								<td align="center"><?php if($nc5>0)echo $nc5;?></td>
								<td align="right"><?php $res= $nc1*1 /$ne + $nc2*2 /$ne +	$nc3*3 /$ne +	$nc4*4 /$ne + $nc5*5 /$ne;
								$z+=$res;
								echo $res;
								?></td>
							</tr>
							
							<?php
							}
							
							?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td align="right"><?php $k=$z/$x;  printf("%0.2f",$k); ?></td>
							</tr>
						</table><br><br><br>
					<?php
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