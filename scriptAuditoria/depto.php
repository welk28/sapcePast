<?php  
$consulta="select * from depto";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `depto` ( <br>
  `iddepto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY (`iddepto`,`nombre`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `depto` (`iddepto`, `nombre`) VALUES <br>";

		echo"('$c->iddepto', '$c->nombre')";
		
		include "divisor.php";

	}
	?>
		

