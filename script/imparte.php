<?php  
$consulta="select * from imparte";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>
CREATE TABLE `imparte` ( <br>
  `idh` int(11) NOT NULL,  <br>
  `idia` int(11) NOT NULL, <br>
  `idr` int(11) NOT NULL, <br>
  `ida` int(11) NOT NULL, <br>
  PRIMARY KEY  (`idh`,`idia`,`idr`,`ida`), <br>
  KEY `idh` (`idh`), <br>
  KEY `idia` (`idia`), <br>
  KEY `idr` (`idr`), <br>
  KEY `ida` (`ida`), <br>
  FOREIGN KEY (`idh`) REFERENCES `horario` (`idh`) ON DELETE CASCADE ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idia`) REFERENCES `semana` (`idia`) ON DELETE CASCADE ON UPDATE CASCADE, <br>
  FOREIGN KEY (`idr`) REFERENCES `reloj` (`idr`) ON DELETE CASCADE ON UPDATE CASCADE, <br>
  FOREIGN KEY (`ida`) REFERENCES `aula` (`ida`) ON DELETE CASCADE ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `imparte` (`idh`, `idia`, `idr`, `ida`) VALUES <br>";

		echo"('$c->idh', '$c->idia', '$c->idr', '$c->ida')";
		
		include "divisor.php";

	}
	?>
		

