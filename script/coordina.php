<?php  
$consulta="select * from coordina";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `coordina` ( <br>
  `idcor` varchar(10)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idcar` varchar(20)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idcor`,`idcar`), <br>
  KEY `idcar` (`idcar`), <br>
  FOREIGN KEY (`idcor`) REFERENCES `coordinador` (`idcor`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `coordina` (`idcor`, `idcar`) VALUES <br>";

		echo"('$c->idcor', '$c->idcar')";

		include "divisor.php";

	}
	?>
		

