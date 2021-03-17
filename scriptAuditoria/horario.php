<?php   session_start(); 
$periodo=$_SESSION['periodo'];
$consulta="select * from horario where periodo='$periodo'";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"

-- $fin registros <br>

CREATE TABLE `horario` ( <br>
  `idh` int(11) NOT NULL, <br>
  `idoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `num` int(11) default NULL, <br>
  `cupo` int(11) default NULL, <br>
  `folio` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idh`), <br>
  KEY `idoc` (`idoc`), <br>
  KEY `idmat` (`idmat`), <br>
  KEY `periodo` (`periodo`), <br>
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
			echo"<br> INSERT INTO `horario` (`idh`, `idoc`, `idmat`, `periodo`, `num`, `cupo`, `folio`) VALUES <br>";

		echo"('$c->idh', '$c->idoc', '$c->idmat', '$c->periodo', '$c->num', '$c->cupo', '$c->folio')";

	include "divisor.php";

	}
	?>
		

