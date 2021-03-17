<?php  
$consulta="select * from listapre";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `listapre` ( <br>
  `nop` int(11) NOT NULL, <br>
  `idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  KEY `nop` (`nop`), <br>
  KEY `idmat` (`idmat`), <br>
  FOREIGN KEY (`nop`) REFERENCES `prerequi` (`nop`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `listapre` (`nop`, `idmat`) VALUES <br>";

		echo"('$c->nop', '$c->idmat')";
		
		include "divisor.php";

	}
	?>
		

