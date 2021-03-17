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
                 	<td width="150px" rowspan="3"><img src="img/logodgest.png" alt="dgest" width="130" height="60" /></td>
                    <td width="650px" rowspan="2" align="left"><strong>Formato para programa anual de encuestas de servicios</strong></td>
                    <td width="280px" >Código: SNEST-CA-PO-002-01 </td>
                 </tr>
                 <tr>
                    <td>Revisi&oacute;n: O </td>
                 </tr>
                 <tr>
                    <td align="left"><strong>Referencia a la norma ISO 9001:2008 5,2, 8.2.1</strong></td>
                    <td>P&aacute;gina 1 de 1 </td>
                 </tr>
            </table><br><br>
        </div>
        <div class="subtitulo" align='center'>INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</div>
        <div class="subtitulo" align='center'>PROGRAMA ANUAL DE ENCUESTAS DE SERVICIO 2015</div>
        <br>
    </header>

    <div id="registros" >
    	<table>
    		<tr>
    			<th width='100'>FECHA</th>
    			<th width=''>EQUIPO AUDITOR</th>
    			<th width='480'>SERVICIO A AUDITAR</th>
    		</tr>
    	<?php
    	    	
        $numeros="
        select s.descs,a.noev, a.fecha 
        from servicio as s, auditoria as a 
        where s.idser=a.idser and a.periodo='$periodo';";
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
	    		echo"<tr>
	    			<td>$s->fecha</td>
	    			<td>";
                    $equipoa="select d.idoc, d.nomdoc, p.descp from docente as d, puesto as p, audita as a where d.idoc=a.idoc and p.idpuesto=a.idpuesto and a.noev='$s->noev'";
                    $equi=mysql_query($equipoa,$conexion);
                    while($q=mysql_fetch_object($equi))
                        echo"<a href='quitaequipo.php?idoc=$q->idoc&noev=$s->noev' title='Eliminar este auditor'>$q->nomdoc </a> / $q->descp <br>";
                    echo"</td>
	    			<td><a href='altaequipo.php?noev=$s->noev&descs=$s->descs' title='Agregar auditor'> $s->descs </a></td>
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