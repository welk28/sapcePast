<?php  
$consulta="select * from encarga";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>


CREATE TABLE `encarga` ( <br>
  `iddepto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `fecha` date NOT NULL, <br>
  `status` int(11) default NULL, <br>
  `fechafin` date default NULL, <br>
  `passd` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`iddepto`,`idoc`,`fecha`), <br>
  KEY `idoc` (`idoc`), <br>
  FOREIGN KEY (`iddepto`) REFERENCES `depto` (`iddepto`) ON UPDATE CASCADE,<br>
  FOREIGN KEY (`idoc`) REFERENCES `docente` (`idoc`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `encarga` (`iddepto`, `idoc`, `fecha`, `status`, `fechafin`, `passd`) VALUES <br>";

		echo"('$c->iddepto', '$c->idoc', '$c->fecha', '$c->status', '$c->fechafin', '$c->passd')";
		
		include "divisor.php";

	}
	?>
		

