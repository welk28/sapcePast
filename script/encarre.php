<?php  
$consulta="select * from encarre";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>


CREATE TABLE `encarre` ( <br>
  `idg` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idg`,`idcar`), <br>
  KEY `idcar` (`idcar`), <br>
  FOREIGN KEY (`idg`) REFERENCES `grupo` (`idg`) ON DELETE CASCADE ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON DELETE CASCADE ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `encarre` (`idg`, `idcar`) VALUES <br>";

		echo"('$c->idg', '$c->idcar')";
		
		include "divisor.php";

	}
	?>
		

