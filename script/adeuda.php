<?php  
$consulta="select * from adeuda";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `adeuda` ( <br>
  `matricula` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `iddepto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `fecha` date NOT NULL default '0000-00-00', <br>
  `descrip` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `status` int, <br>
  PRIMARY KEY  (`matricula`,`iddepto`,`fecha`), <br>
  KEY `periodo` (`periodo`), <br>
  FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`periodo`) REFERENCES `periodo` (`periodo`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; <br><br>
"; 


$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"INSERT INTO `adeuda` (`matricula`, `iddepto`, `fecha`, `descrip`, `periodo`, `status`) VALUES <br>";


		echo"('$c->matricula', '$c->iddepto', '$c->fecha','$c->descrip','$c->periodo',$c->status)";

		include "divisor.php";

	}
	?>
		

