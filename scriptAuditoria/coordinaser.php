<?php  
$consulta="select * from coordinaser";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `coordinaser` ( <br>
  `idser` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idoc` varchar(15)CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idser`,`idoc`), <br>
  KEY `idoc` (`idoc`), <br>
  KEY `periodo` (`periodo`), <br>
  FOREIGN KEY (`idser`) REFERENCES `servicio` (`idser`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idoc`) REFERENCES `docente` (`idoc`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`periodo`) REFERENCES `periodo` (`periodo`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `coordinaser` (`idser`, `idoc`, `periodo`) VALUES <br>";

		echo"('$c->idser', '$c->idoc', '$c->periodo') ";

		include "divisor.php";

	}
	?>
		

