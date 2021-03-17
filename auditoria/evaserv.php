<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

<meta charset="UTF-8">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
		$usuario=$_SESSION['usuario'];
		$noev=$_GET[noev];
		$op=$_GET[op];
		$cor=$_GET[cor];
		$nop=$_GET[nop];
		$idser=$_GET[idser];
		$comentario=$_GET[comentario];
		include "usuarios.php";	?>
	</header>
	<?php 
		if(!empty($op))
		{
			//dar de alta en respondaudita
			//echo"$noev $op $nop";
			$respuesta="insert respondaudita (matricula, noev, nop, resp) values ('$usuario', $noev, $nop, $op);";
			$respon=mysql_query($respuesta,$conexion);
			if(!$respon) 
			{
				print"
					<script>
						window.alert('Error al actualizar')
						window.location.href='index.php';
					</script>
					";
			}
			else
			{
				print"
				<script>
					window.location.href='evaserv.php?noev=$noev&idser=$idser';
				</script>
				";
			}
		}
		if(!empty($comentario))
		{
			$comen="insert responcomenta (matricula, noev, comentario) values ('$usuario', $noev, '$comentario');";
			$com=mysql_query($comen,$conexion);
			if(!$com) 
			{
				print"
					<script>
						window.alert('Error al guardar')
						window.location.href='index.php';
					</script>
					";
			}
			else
			{
				print"
				<script>
					window.location.href='evaserv.php?noev=$noev&idser=$idser';
				</script>
				";
			}
		}
	?>
	
	<section id="seccion">
		
		<div id="registros">

			<header id="header">
			<div class="subtitulo">Servicio a evaluar:  <?php 
			if(!empty($cor))
			{
				//echo" servicio: $idser <br> carrera: $d->idcar";
				$nuevoser="select noev from auditoria where idser='$d->idcar' and periodo='$periodo';";
				$numero=mysql_query($nuevoser,$conexion);
				$num=mysql_fetch_object($numero);
				$noev=$num->noev;
				$idser=$d->idcar;
				//echo"<br> nuevo noev: $noev nuevo ser: $idser";
			}
			//encargado del servicio
			$nombreser="select d.nomdoc from docente as d, coordinaser as c where c.idoc=d.idoc and c.idser='$idser';";
			$nombres=mysql_query($nombreser,$conexion);
			$nss=mysql_fetch_object($nombres);
			
$cualser="select * from servicio where idser='$idser';";
$cual=mysql_query($cualser,$conexion);
$cs=mysql_fetch_object($cual);
			echo"$cs->descs <BR>
			Encargado del Servicio: $nss->nomdoc
			";
			
			?></div>
        <br>
    </header>
			<p> <b>INSTRUCCIONES:</b> <br>
				El cuestionario que se anexa consta de una serie de afirmaciones sobre el servicio que se ofrece en el Instituto Tecnológico. 
				En cada una califique según la experiencia que tenga, respecto a lo que se afirma. <br> <br>


				1. En cada opcion de clic sobre la calificación que le asigna usted a su experiencia con el servicio de que se trata, 
				con base en la siguiente escala:
</p>
			<table>
				<tr>
					<th>5<br>EXCELENTE</th>
					<th>4<br>BUENA</th>
					<th>3<br>REGULAR </th>
					<th>2<br>MALA</th>
					<th>1<br>MUY MALA</th>
				</tr>
			</table>	
			<br><br>
			<?php 
			
			//$preguntas="select p.nop, p.descp from preguntaudita as p, auditoria as a where p.idser=a.idser and a.idser='$idser' and not exists(select r.nop from respondaudita as r where a.noev=r.noev and r.nop=p.nop and r.matricula='$usuario' and r.noev='$noev');";
			$preguntas="select p.nop, p.descp from preguntaudita as p, auditoria as a where a.idser=p.idser and p.idser='$idser' and a.noev='$noev' and not EXISTS (select r.nop from respondaudita as r where a.noev=r.noev and r.nop=p.nop and r.matricula='$usuario' and r.noev='$noev')";
			$pregu=mysql_query($preguntas,$conexion);
			$cp=mysql_num_rows($pregu);

			$buscomenta="select * from responcomenta where noev='$noev' and matricula='$usuario';";
			$busco=mysql_query($buscomenta,$conexion);
			$bc=mysql_num_rows($busco);

			$x=0;
		if(($cp!=0)||($bc<1))
		{
			while($pr=mysql_fetch_object($pregu))
			{$x++;

				echo"
				<form name='form1' action='evaserv.php'>
					<table>
						<tr>
		        			<td width='196' align='center'><input name='op' type='radio' value='5' onclick='submit()'/> </td>
		        			<td width='196' align='center'><input name='op' type='radio' value='4' onclick='submit()'/></td>
		        			<td width='196' align='center'><input name='op' type='radio' value='3' onclick='submit()'/></td>
		        			<td width='196' align='center'><input name='op' type='radio' value='2' onclick='submit()'/></td>
		        			<td width='196' align='center'><input name='op' type='radio' value='1' onclick='submit()'/> 
		        			 <input type='hidden' name='nop' value='$pr->nop'>
							<input type='hidden' name='noev' value='$noev'> 
							<input type='hidden' name='idser' value='$idser'>
		        			</td>
		        		</tr>
		        		<tr>
		        			<th colspan='5' align='center'>$pr->descp</th>
		        		</tr>
					</table>
				</form>
				  <br><br><br><br>";
			}

			
			if($bc<1)
			{
				echo"<form method='get' action='evaserv.php' name='form2' align='center'>
					<textarea name='comentario' cols='45' rows='5' placeholder='Agrege un comentario'  align='center'></textarea>
					<input type='submit' value='Agregar Comentario'>
					<input type='hidden' name='noev' value='$noev'> 
							<input type='hidden' name='idser' value='$idser'>
					</form>";
			}
		}
		else
		{
			print"
					<script>
						window.alert('CONTINUE CON SU EVALUACION');
						window.location.href='index.php';
					</script>
					";
		}
			?>

		</div>
		
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "pie.php";	?>
	</footer>
</div>

</body>
</html>
