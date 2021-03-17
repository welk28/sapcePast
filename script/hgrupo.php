<?php  
$consulta="select * from hgrupo";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>
CREATE TABLE `hgrupo` ( <br>
  `idh` int(11) NOT NULL default '0', <br>
  `idg` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idh`,`idg`), <br>
  KEY `idg` (`idg`), <br>
  FOREIGN KEY (`idg`) REFERENCES `grupo` (`idg`) ON DELETE CASCADE ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idh`) REFERENCES `horario` (`idh`) ON DELETE CASCADE ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `hgrupo` (`idh`, `idg`) VALUES <br>";

		echo"('$c->idh', '$c->idg')";
		
		include "divisor.php";

	}
	?>
		

