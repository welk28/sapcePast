<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../images/tecstyle.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0">

<table width="100%" border="5" align="center" cellpadding="0" cellspacing="5" bordercolor="#FFFFFF">
  <tr>
    <td><div align="left">
      <br>
	  <?php 
include("../conexion.php");
$conexion=conectar();
echo"<br/>";
 $mat=$_POST[matuno];
  $mat2=$_POST[matdos];
  $usuario=$_SESSION['usuario'];
  
  $sqlp="select periodo from periodo where predet='1';";
  $rep=mysql_query($sqlp,$conexion);
  $rp=mysql_fetch_object($rep);
  $periodo=$rp->periodo;

$sqmat="select * from materias where idmat='$mat';";
$sm=mysql_query($sqmat,$conexion); 
$rm=mysql_fetch_object($sm);
 
 $sqmat2="select * from materias where idmat='$mat2';";
$sm2=mysql_query($sqmat2,$conexion); 
$rm2=mysql_fetch_object($sm2);
echo"LISTADO DE ALUMNOS CON CARGAS LIGADAS DE LAS SIGUIENTES MATERIAS: <h1> $mat $rm->nommat <br> $mat2 $rm2->nommat</h1>";
//echo"nombre: $nomal <br>matricula: $alumno";

  

  
  
$sqlp = "select c.matricula, a.nomal,a.status, a.idcar from alumnos as a, cursa as c, cursa as c1 where a.matricula=c.matricula and a.matricula=c1.matricula and c.matricula=c1.matricula and c.idmat='$mat' and c1.idmat='$mat2' and c.periodo=c1.periodo and c.periodo='$periodo';";
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
 		$x=$x+1;
			echo"  <tr>
			<td><p align='center'>$x</p></td>
    		<td><p align='center'>$rp->matricula</P></td>
			<td>$rp->nomal</td>
			<td><p align='center'>$rp->status</p></td>
			<td><p align='center'>$rp->idcar</p></td>
			<td><p align='center'><a href='verhorario.php?matricula=$rp->matricula&idcar=$rp->idcar&usuario=$usuario' target='_blank'>Ver-Modificar</a></p></td></tr>";
	}
	echo "</table> <br/>";
  echo"numeros: $n";
?>
    </div></td>
  </tr>
</table>
<p align="center"><a href="ligadas.php" target="_self">regresar</a></p>
</body>
</html>