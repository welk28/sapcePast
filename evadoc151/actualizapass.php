<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<title>Actualización de password</title>
</head>
<body>
	<?php
		include "conexion.php";
		$conexion=conectar();
		$alumnos="select distinct c.matricula, a.nom, a.fecnac, a.curp from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and  h.idh=c.idh and h.periodo='2018-1' order by c.matricula;";
		$alum=mysql_query($alumnos,$conexion);
		while($a=mysql_fetch_object($alum))
		{
			echo"$a->matricula, $a->fecnac, $a->nom $a->curp <br>";
			$actualiza="update alumnos set passal=sha1('$a->fecnac') where matricula='$a->matricula';";
			$actu=mysql_query($actualiza,$conexion);
			if(!$actu)
			{
				echo"error";
			}
			echo"<br>";
		}
	?>
</body>
</html>