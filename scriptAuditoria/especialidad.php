<?php  
$consulta="select * from especialidad";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `especialidad` ( <br>
  `idesp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nomesp` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `status` int(11) default NULL, <br>
  `idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idesp`), <br>
  KEY `idcar` (`idcar`), <br>
  FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
    $y++;
		if($x==1)
			echo"<br> INSERT INTO `especialidad` (`idesp`, `nomesp`, `status`, `idcar`) VALUES <br>";

		echo"('$c->idesp', '$c->nomesp', '$c->status', '$c->idcar')";

		include "divisor.php";

	}
	?>
		

