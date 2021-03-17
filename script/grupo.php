<?php  
$consulta="select * from grupo";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>
CREATE TABLE `grupo` ( <br>
  `idg` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `descgpo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idg`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `grupo` (`idg`, `descgpo`) VALUES <br>";

		echo"('$c->idg', '$c->descgpo')";
		
		include "divisor.php";

	}
	?>
		

