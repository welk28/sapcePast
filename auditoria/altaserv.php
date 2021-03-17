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
		<?php 	include "usuarios.php";	
		
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
		
        <div class="subtitulo" align='center'>SERVICIOS A AUDITAR</div>
       
        <br>
    </header>

    <div id="registros" >
    	<table>
    		<tr>
    			<th width='480'>SERVICIO A AUDITAR</th>
    			<th width='50'>NO/EVAL</th>
    			<th width=''>GENERAR</th>
    			<th width="">Ver Evaluadores</th>
    	
    		</tr>
    	<?php
    	$servicios="select * from servicio;";
    	$serv=mysql_query($servicios,$conexion);
    	
	    while($s=mysql_fetch_object($serv))
	    {
	    	echo"<tr>
	    		<td>$s->descs</td>";
	    		$evaluacion="select * from auditoria where periodo='$periodo' and idser='$s->idser';";
	    		$evalua=mysql_query($evaluacion,$conexion);
	    		$ev=mysql_fetch_object($evalua);
	    		
	    		
	    		echo"<td>$ev->noev</td>";


	    		$existe="select * from auditoria where idser='$s->idser' and periodo='$periodo';";
	    		$exis=mysql_query($existe,$conexion);
	    		$ne=mysql_num_rows($exis);
	    		if($ne<1)
	    			echo"<td align='center'><a href='altaserv1.php?idser=$s->idser'>Generar Auditoria</a></td>";
	    		else
	    			echo"<td></td>";
						
	    		echo"
				<td align='center'><a href='alumnoaudita.php?noev=$ev->noev'>Ver</a></td>
		
	    		";
	    	echo"</tr>";
	    }
    	?>		
    	</table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	
</div>
</body>
</html>