<?php  
$consulta="select * from prerequi";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `prerequi` ( <br>
  `nop` int(11) NOT NULL, <br>
  `idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`nop`), <br>
  KEY `idcar` (`idcar`), <br>
  KEY `idmat` (`idmat`), <br>
  FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
    $y++;
		if($x==1)
			echo"<br> INSERT INTO `prerequi` (`nop`, `idcar`, `idmat`) VALUES <br>";

		echo"('$c->nop', '$c->idcar','$c->idmat')";

		include "divisor.php";

	}
	?>
		

