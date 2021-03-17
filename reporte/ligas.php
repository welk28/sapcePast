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
		$mat=$_POST[matuno];
  		$mat2=$_POST[matdos];
		include "../usuarios.php";	?>
	</header>
	
	
	<section id="seccion">
	<div id="registros" >
	<?php
	if(empty($mat))
	{ ?>
		<form id="form1" name="form1" method="post" action="ligas.php">
	
  <table border="0" align="center">
    <tr>
      <td colspan="2">Seleccione materias a verificar: </td>
    </tr>
    <tr>
      <td>Materia 1: </td>
      <td><label>
        <?php  
		 echo"<select name='matuno' id='matuno'>";
      
//Llena el combo
     $sqle="select * from materias;";
   $re=mysql_query($sqle,$conexion);
	while ($regta = mysql_fetch_object($re)){
	  echo "<option value='$regta->idmat'>$regta->idmat / $regta->nommat</option>";
	  }
	 
    echo"</select>";
 ?>
        </td>
    </tr>
    <tr>
      <td>Materia 2: </td>
      <td><?php  
		 echo"<select name='matdos' id='matdos'>";
      
//Llena el combo
     $sqle="select * from materias;";
   $re=mysql_query($sqle,$conexion);
	while ($regta = mysql_fetch_object($re)){
	  echo "<option value='$regta->idmat'>$regta->idmat / $regta->nommat</option>";
	  }
	 
    echo"</select>";
 ?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="Submit" value="Enviar" />
        </label>
      </div>        <div align="center"></div></td>
    </tr>
  </table>
</form>
	<?php 
}
else
{
	$sqmat="select * from materias where idmat='$mat';";
	$sm=mysql_query($sqmat,$conexion); 
	$rm=mysql_fetch_object($sm);
	 
	 $sqmat2="select * from materias where idmat='$mat2';";
	$sm2=mysql_query($sqmat2,$conexion); 
	$rm2=mysql_fetch_object($sm2);
	echo"LISTADO DE ALUMNOS CON CARGAS LIGADAS DE LAS SIGUIENTES MATERIAS: <h1> $mat $rm->nommat <br> $mat2 $rm2->nommat</h1>";
	//echo"nombre: $nomal <br>matricula: $alumno";

	  

	  
	  
	$sqlp = "select a.matricula, a.app, a.apm, a.nom, status, idcar from alumnos as a, cursa as c, horario as h where a.matricula=c.matricula and h.periodo='$periodo' and h.idh=c.idh and h.idmat='$mat';";

		 $rep = mysql_query($sqlp, $conexion); 
		 $n=mysql_num_rows($rep);
	  	echo "<table width='100%' ' align='center' cellpadding='0' cellspacing='0' border='1' bordercolor='#000000'>
	  	<tr>
	  		<td><p align='center'>No</p></td>
	    	<td><p align='center'>CONTROL</p></td>
			<td><p align='center'>NOMBRE</p></td>
			<td><p align='center'>SEM</p></td>
			<td><p align='center'>CARRERA</p></td>
			<td><p align='center'>HORARIO</p></td>
		
	  		</tr>";
	  		$x=0;
	 	while ($rp = mysql_fetch_object($rep)) 
	 	{ 
	 		$datos="select a.matricula, a.app, a.apm, a.nom, status, idcar from alumnos as a, cursa as c, horario as h where a.matricula=c.matricula and h.periodo='$periodo' and h.idh=c.idh and h.idmat='$mat2' and a.matricula='$rp->matricula';";
	 		$dat=mysql_query($datos,$conexion);
	 		while($d=mysql_fetch_object($dat))
	 		{
	 			$x=$x+1;
				echo"  <tr>
				<td><p align='center'>$x</p></td>
	    		<td><p align='center'>$d->matricula</P></td>
				<td>$d->app $rp->apm $d->nom</td>
				<td><p align='center'>$d->status</p></td>
				<td><p align='center'>$d->idcar</p></td>
				<td><p align='center'><a href='$ip/administrador/horalumno.php?matricula=$d->matricula&idcar=$d->idcar&usuario=$usuario' target='_blank'>Ver-Modificar</a></p></td></tr>";
	 		}
	 		   
		}
		echo "</table> <br/>";
}

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